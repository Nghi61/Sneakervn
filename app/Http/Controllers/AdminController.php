<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
       return view('admin.home');
    }
    public function login(){
        return view('admin.login');
    }

    public function handle(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Kiểm tra xem người dùng có role==0 không
            if (Auth::user()->role == 0) {
                // Đăng nhập thành công và có role==0, điều hướng hoặc thực hiện hành động sau khi đăng nhập ở đây.
                return redirect()->intended('/admin');
            } else {
                // Người dùng không có role==0, đăng xuất và thông báo lỗi.
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Tài khoản không đủ cấp bậc để truy cập');
            }
        }
        // Đăng nhập thất bại, xử lý lỗi hoặc điều hướng đến trang đăng nhập lại.
        return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }

}
