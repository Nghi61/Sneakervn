<?php

namespace App\Http\Controllers;

use App\Models\BillModel;
use App\Models\CartModel;
use App\Models\Comments;
use App\Models\ProductCategories;
use App\Models\Products;
use App\Models\ProductGallery;
use App\Models\Sizes;
use App\Models\Categories;
use App\Mail\MailBill;
use Illuminate\Support\Facades\Mail;
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
        $related = [];
        if (is_null($Pro)) {
            return view('Clients.404');
        }
        $Pro->img = ProductGallery::where('idProduct', $id)->get();
        $size = Sizes::where('idProduct', $id)->get();
        $Comment = Comments::where('idProduct', '=', $id)->get();
        $idCate = ProductCategories::where('idProduct', $id)->get();
        foreach ($idCate as $row) {
            $idPro = ProductCategories::where('idCategories', $row->idCategories)->get();
        }
        foreach ($idPro as $row) {
            if ($row->idProduct != $id) {
                $related = Products::where('id', $row->idProduct)->get();
            }
        }
        $check = count($Comment);

        return view('Clients.productDetail', ['Pro' => $Pro, 'size' => $size, 'comment' => $Comment, 'check' => $check, 'related' => $related]);
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
    function cart(Request $request)
    {
        $id = $request->id;
        $pro = Products::find($id);

        if (is_null($pro)) {
            return view('Clients.404');
        }

        $idsize = $request->size;
        $size = Sizes::where('id', $idsize)->first();
        $quantity = $request->quantity;

        if ($pro->sale <= 0 || is_null($pro->sale)) {
            $price = $pro->price;
        } else {
            $price = $pro->price;
        }

        $cartItem = [
            'idProduct' => $id,
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
    function cartDelete($id)
    {
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
    function checkout(Request $request)
    {
        try {
            $newCart = $request->new_cart;
            $cart = session('cart');
            foreach ($newCart as $cartItem) {
                $index = $cartItem['index'];
                $cart[$index] = [
                    'idProduct' => $cart[$index]['idProduct'],
                    'name' => $cart[$index]['name'],
                    'price' => $cart[$index]['price'],
                    'urlHinh' => $cart[$index]['urlHinh'],
                    'size' => $cart[$index]['size'],
                    'quantity' => $cartItem['quantity'],
                ];
            }
            session(['cart' => $cart]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    function checkoutview()
    {
        return view('Clients.checkout');
    }
    function search(Request $request)
    {
        $kw = $request->keyword;
        $product = Products::where('name', 'LIKE', '%' . $kw . '%')->get();
        $cate = Categories::whereNotIn('name', ['không xác định'])->get();
        $sizes = Sizes::select('size')->groupBy('size')->get();
        $idCate = $request->idCategories;
        foreach ($cate as $row) {
            $quantity = ProductCategories::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        return view('Clients.search', ['product' => $product, 'Categories' => $cate, 'sizes' => $sizes, 'kw' => $kw]);
    }
    function confirm(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $payment = (string) 0;
        $shipping = (string)0;
        $MHD=uniqid('MHD_', true);
        $totalAmount = 0;
        $cart = session('cart');
        foreach ($cart as $index => $row) {
            CartModel::create([
                'ProductName' => $row['name'],
                'Price' => $row['price'],
                'size' => $row['size'],
                'quantity' => $row['quantity'],
                'urlHinh' => $row['urlHinh']
            ]);
            $itemTotal = $row['price'] * $row['quantity'];
            $totalAmount += $itemTotal;
        }

        BillModel::create([
            'name' => $name,
            'MHD' => $MHD,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'payment' => $payment,
            'delivery' => $shipping,
            'total' => $totalAmount,
            'status'=>(string)0
        ]);
        session::forget('cart');

  Mail::mailer('smtp')->to($email)
  ->send( new MailBill($name, $MHD) );
        return view('Clients.confirm');
    }
    function trackOrder(Request $request){
        $id=$request->MHD;
        $bills=BillModel::where('MHD',$id)->get();
        return view('Clients.trackOrderResault',['bills'=>$bills]);
    }
}
