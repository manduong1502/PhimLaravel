<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$meta_title}}</title>
    <link rel="canonical" href="{{Request::url()}}">

    <link rel="next" href="">
    <link rel="icon" type="image/png" href="{{$meta_image}}">

    <meta name="revisit-after" content="1 days"/>
    <meta name="robots" content="index,follow"/>
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:description" content="{{$meta_description}}" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:image" content="{{$meta_image}}" />
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
            <form method="POST" action="{{ route('post_password') }}">
                @csrf
                <h1>Quên mật khẩu</h1>
                <input name="email" type="email" placeholder="Email"  required>
                @if ($errors->has('email'))
                    <span class="errors-message">{{ $errors->first('email') }}</span>
                @endif
                
                <div class="content">
                    
                    {{-- <div class="pass-link">
            <a href="#">Quên mật khẩu</a>
          </div> --}}
                </div>
                <button type="submit">Gửi email</button>
                        
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
