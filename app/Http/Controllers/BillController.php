<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillModel;
use App\Models\CartModel;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills=BillModel::orderBy('created_at','desc')->paginate(10);
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
        return view('admin.Bill.index',['bills'=>$bills]);
    }
    public function cart(string $id){
        $cart=CartModel::where('idBill',$id)->get();
        if(is_null($cart)){
            return view('admin.404');
        }
        return view('admin.Cart.index',['cart'=>$cart]);
    }
    public function destroy(string $id)
    {
        $bill=BillModel::find($id);
        if(is_null($bill)){
            return view('admin.404');
        }
        $bill->delete();
        return back();
    }
    public function search(Request $request)
    {
        $keyword = $request->kw;
            if(!is_null($keyword)){
                $bills = BillModel::where('MHD', 'LIKE', '%' . $keyword . '%')->orderBy('id','desc')->paginate(10);
            }
            else{
                $bills=BillModel::orderBy('id','desc')->paginate(10);
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
        return view('admin.Bill.index', ['bills' => $bills]);
    }
}
