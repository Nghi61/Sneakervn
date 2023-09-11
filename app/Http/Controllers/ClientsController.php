<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillModel;
use App\Models\CartModel;
use App\Models\ContractModel;
use App\Models\CategoriesModel;
use App\Models\CommentsProductModel;
use App\Models\CommentBlogModel;
use App\Models\ProductModel;
use App\Models\ProductCategoriesModel;
use App\Models\ProductGalleryModel;
use App\Models\SizeModel;
use App\Mail\MailBill;
use App\Models\BlogModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class ClientsController extends Controller
{
    function index()
    {
        $NewProduct = ProductModel::orderBy('id', 'desc')->limit(10)->get();

        $HotProduct = ProductModel::orderBy('view', 'desc')->limit(4)->get();

        $blogs = BlogModel::orderBy('id', 'desc')->limit(4)->get();

        $user = UserModel::all();

        foreach ($user as $row) {
            foreach ($blogs as $blog) {
                if ($blog->idUser == $row->id) {
                    $blog->idUser = $row->name;
                }
            }
        }

        return view('clients.home', ['NewProduct' => $NewProduct, 'HotProduct' => $HotProduct, 'blogs' => $blogs]);
    }
    function ProductDetail($slug)
    {
        $Pro = ProductModel::where('slug',$slug)->first();
        $view = $Pro->view;
        $view++;
        $Pro->view = $view;
        $Pro->save();
        $related = [];
        if (is_null($Pro)) {
            return view('clients.404');
        }
        $Pro->img = ProductGalleryModel::where('idProduct', $Pro->id)->get();
        $size = SizeModel::where('idProduct', $Pro->id)->get();
        $Comment = CommentsProductModel::where('idProduct', '=', $Pro->id)->paginate(10);
        foreach ($Comment as $row) {
            $row->name = UserModel::select('name')->where('id', $row->idUser)->get();
        }
        $idCate = ProductCategoriesModel::where('idProduct', $Pro->id)->get();
        foreach ($idCate as $row) {
            $idPro = ProductCategoriesModel::where('idCategories', $row->idCategories)->get();
        }
        foreach ($idPro as $row) {
            if ($row->idProduct != $Pro->id) {
                $related = ProductModel::where('id', $row->idProduct)->get();
            }
        }
        $check = count($Comment);
        return view('clients.productDetail', ['Pro' => $Pro, 'size' => $size, 'comment' => $Comment, 'check' => $check, 'related' => $related]);
    }
    function CommentProduct(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Nhận dữ liệu bình luận từ yêu cầu Ajax
            $idUser = $request->input("idUser");
            $comment = $request->input("comment");
            $idPro = $request->input("idPro");
            // Lưu thông tin bình luận vào cơ sở dữ liệu
            CommentsProductModel::create([
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
        $pro = ProductModel::find($id);

        if (is_null($pro)) {
            return view('clients.404');
        }

        $idsize = $request->size;
        $size = SizeModel::where('id', $idsize)->first();
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

        return view('clients.cart');
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
        return view('clients.checkout');
    }
    function search(Request $request)
    {
        $kw = $request->keyword;
        $product = ProductModel::where('name', 'LIKE', '%' . $kw . '%')->paginate(6);
        $cate = CategoriesModel::whereNotIn('name', ['không xác định'])->get();
        $sizes = SizeModel::select('size')->groupBy('size')->get();
        foreach ($cate as $row) {
            $quantity = ProductCategoriesModel::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        return view('clients.search', ['product' => $product, 'Categories' => $cate, 'sizes' => $sizes, 'kw' => $kw]);
    }
    function categories(string $idc, $id)
    {
        // Retrieve 'id' values from the 'Categories' table where 'name' matches $id or $idc
        $idCategories = CategoriesModel::select('id')
            ->whereIn('name', [$id, $idc])
            ->get();

        // Initialize an empty array to store the 'id' values from $idCategories
        $categoryIds = [];

        // Extract 'id' values from the $idCategories collection
        foreach ($idCategories as $category) {
            $categoryIds[] = $category->id;
        }

        // Use the extracted 'id' values to query the 'ProductCategories' table
        $idProduct = ProductCategoriesModel::select('id')
            ->whereIn('idCategories', $categoryIds)
            ->get();

        // Initialize an empty array to store the 'id' values from $idProduct
        $productIds = [];

        // Extract 'id' values from the $idProduct collection
        foreach ($idProduct as $productCategory) {
            $productIds[] = $productCategory->id;
        }

        // Use the extracted 'id' values to query the 'Products' table
        $product = ProductModel::whereIn('id', $productIds)->paginate(4);

        $cate = CategoriesModel::whereNotIn('name', ['không xác định'])->get();
        $sizes = SizeModel::select('size')->groupBy('size')->get();
        foreach ($cate as $row) {
            $quantity = ProductCategoriesModel::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        return view('clients.search', ['product' => $product, 'Categories' => $cate, 'sizes' => $sizes, 'kw' => $id]);
    }
    function sale()
    {
        $kw = "Giảm giá";
        $product = ProductModel::where('sale', '>', 0)->paginate(4);
        $cate = CategoriesModel::whereNotIn('name', ['không xác định'])->get();
        $sizes = SizeModel::select('size')->groupBy('size')->get();
        foreach ($cate as $row) {
            $quantity = ProductCategoriesModel::where('idCategories', $row->id)->count();
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
        $MHD = uniqid('MHD_', true);
        $totalAmount = $request->totalAmout;
        $cart = session('cart');
        $bill = BillModel::create([
            'name' => $name,
            'MHD' => $MHD,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'payment' => $payment,
            'delivery' => $shipping,
            'total' => $totalAmount,
            'status' => (string)0
        ]);
        $idBill = $bill->id;
        foreach ($cart as $index => $row) {
            CartModel::create([
                'ProductName' => $row['name'],
                'Price' => $row['price'],
                'size' => $row['size'],
                'quantity' => $row['quantity'],
                'urlHinh' => $row['urlHinh'],
                'idBill' => $idBill,
            ]);
        }
        session::forget('cart');

        Mail::mailer('smtp')->to($email)
            ->send(new MailBill($name, $MHD));
        return view('clients.confirm');
    }
    function trackOrder(Request $request)
    {
        $id = $request->MHD;
        $bills = BillModel::where('MHD', $id)->get();
        $Message = "";
        if (count($bills) === 0) {
            $Message = $id;
        }
        foreach ($bills as $bill) {
            if ($bill->payment == 0) {
                $bill->payment = 'Thanh toán khi nhận hàng';
            } elseif ($bill->payment == 1) {
                $bill->payment = 'Thanh toán bằng thẻ';
            } elseif ($bill->payment == 2) {
                $bill->payment = 'Thanh toán PayPal';
            } else {
                $bill->payment = 'Chuyển khoản';
            }

            if ($bill->delivery == 0) {
                $bill->delivery = 'Giao hàng thường';
            } else {
                $bill->delivery = 'Giao hàng nhanh';
            }

            if ($bill->status == 0) {
                $bill->status = 'Đợi xác nhận';
            } elseif ($bill->status == 1) {
                $bill->status = 'Đang chuyển tới kho';
            } elseif ($bill->status == 2) {
                $bill->status = 'Đang vận chuyển';
            } else {
                $bill->status = 'Giao hàng thành công';
            }
        }
        return view('clients.trackOrderResault', ['bills' => $bills, 'Message' => $Message]);
    }
    function contract(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $contract = new ContractModel;
        $contract->name = $name;
        $contract->email = $email;
        $contract->message = $message;
        $contract->save();
        return back();
    }
    function blog(string $slug)
    {
        $blog = BlogModel::where('slug', $slug)->first();
        $view = $blog->view;
        $view++;
        $blog->view = $view;
        $blog->save();
        if (is_null($blog)) {
            return view('clients.404');
        }
        $releted = BlogModel::whereNotIn('id', [$blog->id])
        ->limit(5)
        ->get();
        $user = UserModel::all();

        foreach ($user as $row) {
            if ($blog->idUser == $row->id) {
                $blog->idUser = $row->name;
            }
            foreach($releted as $re){
                if($re->idUser==$row->id){
                    $re->idUser=$row->name;
                }
            }

        }
        $quantity = CommentBlogModel::where('idBlog', $blog->id)->count();
        $comment = CommentBlogModel::where('idBlog', $blog->id)->paginate(10);

        foreach ($comment as $row) {
            $row->name = UserModel::select('name')->where('id', $row->idUser)->get();
        }
        return view('clients.blogPost', ['blog' => $blog, 'quantity' => $quantity, 'comment' => $comment,'releted'=>$releted]);
    }
    function CommentBlog(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Nhận dữ liệu bình luận từ yêu cầu Ajax
            $idUser = $request->input("idUser");
            $comment = $request->input("comment");
            $idBlog = $request->input("idBlog");
            // Lưu thông tin bình luận vào cơ sở dữ liệu
            CommentBlogModel::create([
                'idUser' => $idUser,
                'idBlog' => $idBlog,
                'content' => $comment,
            ]);

            // Trả về kết quả thành công cho Ajax
            echo "success";
        } else {
            // Trả về lỗi nếu yêu cầu không phải là POST
            echo "error";
        }
    }
    function blogAll(){
        // Lấy danh sách các bài viết theo thứ tự giảm dần của ID và phân trang
        $blogs = BlogModel::orderBy('id', 'desc')->paginate(4);

        // Lấy danh sách các người dùng và chuyển thành một mảng liên kết theo ID
        $users = UserModel::all()->keyBy('id');

        // Tính toán số lượng bình luận cho mỗi bài viết
        $commentCounts = CommentBlogModel::select('idBlog', DB::raw('COUNT(*) as count'))
            ->groupBy('idBlog')
            ->pluck('count', 'idBlog');

        // Duyệt qua danh sách bài viết và thực hiện cập nhật thông tin người dùng và số lượng bình luận
        foreach($blogs as $blog){
            if(isset($users[$blog->idUser])){
                $blog->userName = $users[$blog->idUser]->name;
            }
            $blog->commentCount = $commentCounts->get($blog->id, 0);
        }

        $releted = BlogModel::orderBy('id')->limit(4)->get();
        return view('clients.blog', ['blogs' => $blogs,'releted'=>$releted]);
    }

}
