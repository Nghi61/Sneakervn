<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\ProductCategories;
use App\Models\Products;
use App\Models\ProductGallery;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    function index()
    {
        $NewProduct = Products::orderBy('id', 'desc')->limit(4)->get();

        $HotProduct = Products::orderBy('view', 'desc')->limit(4)->get();

        return view('Clients.home', ['NewProduct' => $NewProduct, 'HotProduct' => $HotProduct,]);
    }
    function ProductDetail($id)
    {
        $Pro = Products::find($id);
        $related=[];
        if (is_null($Pro)) {
            return view('Clients.404');
        }
        $Pro->img = ProductGallery::where('idProduct', $id)->get();
        $size = Sizes::where('idProduct', $id)->get();
        $Comment = Comments::where('idProduct', '=', $id)->get();
        $idCate=ProductCategories::where('idProduct',$id)->get();
        foreach($idCate as $row){
            $idPro=ProductCategories::where('idCategories',$row->idCategories)->get();
        }
        foreach($idPro as $row){
            if($row->idProduct!=$id){
                $related=Products::where('id',$row->idProduct)->get();
            }
        }
        $check = count($Comment);

        return view('Clients.productDetail', ['Pro' => $Pro, 'size' => $size, 'comment' => $Comment, 'check' => $check,'related'=>$related]);
    }
    function comment(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Nhận dữ liệu bình luận từ yêu cầu Ajax
            $idUser = $request->input("idUser");
            $comment = $request->input("comment");
            $idPro = $request->input("idPro");
            // Lưu thông tin bình luận vào cơ sở dữ liệu
            Comments::insert([
                'idUser' => $idUser,
                'idProduct' => $idPro,
                'content' => $comment,
            ]);

            // Trả về kết quả thành công cho Ajax
            echo "success";
        } else {
            // Trả về lỗi nếu yêu cầu không phải là POST
            echo "error";
        }
    }
    function cart(Request $request){
        $id = $request->id;
        $pro = Products::find($id);

        if (is_null($pro)) {
            return view('Clients.404');
        }

        $idsize = $request->size;
        $size=Sizes::where('id',$idsize)->first();
        $quantity = $request->quantity;

        if($pro->sale<=0||is_null($pro->sale)){
            $price=$pro->price;
        }
        else{
            $price=$pro->price;
        }

        $cartItem = [
            'idProduct'=>$id,
            'name' => $pro->name,
            'price' => $price,
            'urlHinh' => $pro->urlHinh,
            'size' => $size->size,
            'quantity' => $quantity
        ];

        $cart = session('cart', []);

        $found = false;
        foreach ($cart as &$row) {
            if ($row['idProduct'] == $id && $row['size'] == $size->size) {
                $row['quantity'] += $quantity;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = $cartItem;
        }

        session(['cart' => $cart]);

        return view('Clients.cart');
    }
    function cartDelete($id) {
        $cart = session('cart', []);
        foreach ($cart as $index => $row) {
            if ($row['idProduct'] == $id) {
                // Remove the item from the cart array
                array_splice($cart, $index, 1);
                break;
            }
        }
        // Save the updated cart back to the session
        session(['cart' => $cart]);
        return back();
    }
    function checkout(Request $request){
        try {
            $newCart = $request->new_cart; // Lấy dữ liệu từ request
            // Lưu dữ liệu vào session mới (ví dụ: updated_cart)
            session(['checkout' => $newCart]);
            return response()->json(['message' => 'Dữ liệu đã được lưu vào session mới.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    function checkoutview(){
        return view('Clients.checkout');
    }
}

