<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        if (Auth::check()) {
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Điều hướng đến trang quản trị
            } else {
                return redirect()->route('pages.trangchu'); // Điều hướng đến trang chính
            }
        }
        return view('auth.login');
    }

    public function login(AuthRequest $authRequest) {
        $credentials =[
            'email' =>  $authRequest ->input('email'),
            'password' =>  $authRequest ->input('password'),
        ];
        
        if(Auth::attempt($credentials)) {
            return redirect() ->route('pages.trangchu')->with('success','Bạn đã đăng nhập thành công');
        }
        return redirect() ->route('auth.index')->with('error','Email hoặc mật khẩu của bạn sai');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.index');
    }
}   
