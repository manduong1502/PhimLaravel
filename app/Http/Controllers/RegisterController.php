<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegisterRequest;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    protected function register(AuthRegisterRequest $request)
    {
        $user= User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        if ($user) {
            $user->assignRole('userfree');
            // Chuyển hướng sau đăng ký thành công và hiển thị thông báo
            return redirect()->route('auth.index')->with('success', 'Đăng ký thành công!');
        } else {
            // Xử lý khi đăng ký không thành công
            return redirect()->route('auth.index')->with('error', 'Đăng ký không thành công.');
        }
    }
}
