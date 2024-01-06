<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/dang-nhap-dangky.css') }}">
    <link rel="stylesheet" href="css/responsive_login.css">
    
    <style>
        .errors-message {
            color: red;
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container" id="container">

        <div class="form-container register-container">
      {{-- <form method="POST" {{ route('verify.activation.code') }}>
        @csrf
        <h1>Xác Nhận Email</h1>

        <input type="email" name="email" placeholder="Nhập địa chỉ email" required>
        <input type="text" name="activation_code" placeholder="Nhập mã xác thực" >
        <button type="submit">Gửi</button>
      </form> --}}
    </div>

        <div class="form-container login-container">
            <form method="POST" action="{{ route('post_GetpassRegister', ['customer' => $customer->id, 'token' => $customer->remember_token]) }}">
                @csrf
                <h1>Kích hoạt tài khoản khi mới đăng kí</h1>
                <p>Ấn vào nút để kích hoạt tài khoản</p>
                
                <button type="submit">Kịch hoạt tài khoản </button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">COSMIC<br> Xin chào</h1>
                    {{-- <p>Nếu bạn đã có tài khoản, Hãy đặng nhập ngay nào</p> --}}
                    {{-- <button class="ghost" id="login">Đăng Nhập
                <i class="lni lni-arrow-left login"></i>
            </button> --}}
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">COSMIC<br> Xin chào</h1>
                    {{-- <p>Nếu bạn chưa có tài khoản, Hãy đăng ký ngay nào</p>
          <button class="ghost" id="register">Đăng ký
            <i class="lni lni-arrow-right register"></i>
          </button> --}}
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/login.js') }}"></script>

</body>

</html>
