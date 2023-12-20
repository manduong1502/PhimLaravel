<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            $user = Auth::user();
            
            if ($user->hasRole('admin')) {
                // Kiểm tra quyền admin
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
        
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            $user = Auth::user();
    
            if ($user->hasRole('admin')) {
                // Nếu người dùng có quyền admin, điều hướng đến trang quản trị
                return redirect()->route('admin.dashboard')->with('success', 'Bạn đã đăng nhập thành công');
            } else {
                // Nếu người dùng không phải là admin, điều hướng đến trang chính
                return redirect()->route('pages.trangchu')->with('success', 'Bạn đã đăng nhập thành công');
            }
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
