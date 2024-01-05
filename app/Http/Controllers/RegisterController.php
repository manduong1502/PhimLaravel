<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRegisterRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function index()
    {
        $meta_title = 'Đăng kí cosmic';
        $meta_description = 'Hãy đăng nhập, đăng kí để vào web film cosmic';
        return view('auth.login',compact('meta_title', 'meta_description'));
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
            $token= Str::random(10);
            $user->remember_token = $token;
            $user->status = null;
            $user->save();

            $customer = User::where('email', $request->email)->first();

            Mail::send('email.check_email_register',compact('customer'),function($email) use($customer) {
                $email->subject('Xác Thực Email - Kích hoạt lại tài khoản');
                $email->to($customer->email,$customer->username);
            });

            // Chuyển hướng sau đăng ký thành công và hiển thị thông báo
            return redirect()->route('auth.index')->with('success', 'Đăng ký thành công vui lòng check email để kích hoạt tài khoản');
        } else {
            // Xử lý khi đăng ký không thành công
            return redirect()->route('auth.index')->with('error', 'Đăng ký không thành công.');
        }
    }

    
public function getPass (User $customer,$token) {
    if($customer->remember_token === $token ) {
        $meta_title = 'Kích hoạt tài khoản cosmic';
        $meta_description = 'Hãy đăng nhập, đăng kí để vào web film cosmic';
        return view('email.get_email_register',compact('customer', 'token','meta_title', 'meta_description'));
    }
    return abort(404);
    }
    
    public function post_Getpass(Request $request, User $customer, $token) {
        // Kiểm tra xem remember_token được cung cấp trong request có khớp với token trong URL không
        if ($customer->remember_token === $token && $customer->status !== 1) {
            // Validate dữ liệu từ request ở đây nếu cần
            
            // Cập nhật mật khẩu mới cho người dùng
            $newToken = Str::random(10); // Tạo mã token ngẫu nhiên mới
            $customer->update(['remember_token' => $newToken]); 
            
            // Cập nhật trạng thái chỉ khi trạng thái hiện tại không phải là 1
            $customer->status = 1;
            
            // Lưu thay đổi vào cơ sở dữ liệu
            $customer->save();
        
            return redirect()->route('auth.index')->with('success', 'Tài khoản của bạn đã kích hoạt thành công');
        }
        
        // Nếu token không khớp hoặc trạng thái đã là 1, chuyển hướng hoặc thông báo lỗi
        return redirect()->route('error')->with('error', 'Liên kết không hợp lệ hoặc tài khoản đã được kích hoạt');
    }
}
