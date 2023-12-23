<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;



class LoginController extends Controller
{
    public function index (Request $request) {
        if (Auth::check()) {
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            $user = Auth::user();
            
            if ($user->hasRole('admin') && $user->status == 1) {
                // Kiểm tra quyền admin
                return redirect()->route('admin.dashboard'); // Điều hướng đến trang quản trị
            } else {
                if($user->status == null) {

                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect()->route('auth.index')->with('error', 'Hiện tại tài khoản của bạn chưa được kích hoạt, Vui lòng check email của bạn để kích hoạt tài khoản.');
                }else {
                    return redirect()->route('pages.trangchu');
                }
            }
        }
        return view('auth.login');
    }

    public function login(AuthRequest $authRequest) {
        $credentials =[
            'email' =>  $authRequest ->input('email'),
            'password' =>  $authRequest ->input('password'),
        ];

        $user = User::where('email', $credentials['email'])->first();
        
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công

            if ($user->hasRole('admin') && $user->status == 1) {
                // Nếu người dùng có quyền admin, điều hướng đến trang quản trị

                $token= Str::random(10);
                $user->remember_token = $token;
                $user->save();
                return redirect()->route('admin.dashboard')->with('success', 'Bạn đã đăng nhập thành công');
            }else {
                // Nếu người dùng không phải là admin, điều hướng đến trang chính
                if($user->status == null) {
                    Auth::logout();
                    $authRequest->session()->invalidate();
                    $authRequest->session()->regenerateToken();
                    return redirect()->route('auth.index')->with('error', 'Hiện tại tài khoản của bạn chưa được kích hoạt, Vui lòng check email của bạn để kích hoạt tài khoản.');
                }else {
                    return redirect()->route('pages.trangchu')->with('success', 'Bạn đã đăng nhập thành công');
                }
            }
        }
        return redirect() ->route('auth.index')->with('error','Email hoặc mật khẩu của bạn sai');
    }

    public function logout(Request $request,User $customer)
    {
        $token = Str::random(10); // Tạo mã token ngẫu nhiên mới
        $customer->update(['remember_token' => $token]); // Cập nhật mã token mới cho người dùng
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.index');
    }

    public function forget_password() {
        
        return view('auth.forget_password');
    }

    public function post_password (Request $request) {
        $request->validate([
            'email' =>'required|exists:users',
        ],[
            'email.required' => 'Vui lòng nhập địa chỉ email hợp lệ',
            'email.exists' => 'Email không tồn tại',
        ]);

        $token= Str::random(10);
        $customer = User::where('email', $request->email)->first();
        $customer->update(['token' => $token]);
        Mail::send('email.check_email_forget',compact('customer'),function($email) use($customer) {
            $email->subject('Xác Thực Email - Kích hoạt lại tài khoản');
            $email->to($customer->email,$customer->username);
        });
    return redirect()->back()->with('success','Vui lòng check email để xác nhận tài khoản');    
}

public function getPass (User $customer,$token) {
if($customer->remember_token === $token && $customer->status === 1) {
    return view('email.getpass',compact('customer', 'token'));
}
return abort(404);
}

public function post_Getpass(Request $request, User $customer, $token) {
// Kiểm tra xem remember_token được cung cấp trong request có khớp với token trong URL không
if ($customer->remember_token === $token && $customer->status === 1) {
    // Validate dữ liệu từ request
    $request->validate([
        'password' => 'required|min:6', // Thêm các quy tắc validation khác nếu cần thiết
        'comfirm_password' => 'required|same:password',
    ],[
        'password.required' => 'Vui lòng nhập địa chỉ mật khẩu hợp hợp lệ',
        'password.min' => 'Mật khẩu ít nhất 6 kí tự',
        'comfirm_password.same' => 'Mật khẩu không khớp!!',
    ]);

    // Cập nhật mật khẩu mới cho người dùng
    $newPassword = Hash::make($request->password);
    $customer->password = $newPassword;
    $token = Str::random(10); // Tạo mã token ngẫu nhiên mới
    $customer->update(['remember_token' => $token]); 
    // Lưu thay đổi vào cơ sở dữ liệu
    $customer->save();

    return redirect()->route('login')->with('success', 'Mật khẩu đã được đặt lại thành công. Vui lòng đăng nhập bằng mật khẩu mới.');
}

// Nếu token không khớp, trả về lỗi 404
return abort(404);
}
}   
