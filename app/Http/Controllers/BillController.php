<?php

namespace App\Http\Controllers;

use App\Models\BillModel;
use App\Models\CartModel;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills=BillModel::all();
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
        return view('Admin.Bill.index',['bills'=>$bills]);
    }
    public function cart(string $id){
        $cart=CartModel::where('idBill',$id)->get();
        if(is_null($cart)){
            return view('Admin.404');
        }
        return view('Admin.Cart.index',['cart'=>$cart]);
    }
    public function destroy(string $id)
    {
        //
    }
}
