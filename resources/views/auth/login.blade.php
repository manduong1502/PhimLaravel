<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Double Slider Login / Registration Form</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/dang-nhap-dangky.css">
</head>
<body>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form method="POST" action="{{route('auth.do_register')}}">
        @csrf
        <h1>Đăng ký</h1>
        <input
        name="username"
        type="text"
        placeholder="username"
        required
        value="{{old('username')}}"
        >
        @if($errors->has('username'))
          <span class="errors-message">{{$errors->first('username')}}</span>
        @endif
        <input
        name="email"
        type="email"
        placeholder="Email"
        required
        value="{{old('email')}}"
        >
        @if($errors->has('email'))
          <span class="errors-message">{{$errors->first('email')}}</span>
        @endif
        <input
        name="password"
        type="password"
        placeholder="Password"
        required
        >
        @if($errors->has('password'))
          <span class="errors-message">{{$errors->first('password')}}</span>
        @endif
        <input
        name="password_confirmation"
        type="password"
        placeholder="Password confirmation"
        id="password_confirmation"
        class="form-control"
        >
        @if($errors->has('password_confirmation'))
          <span class="errors-message">{{$errors->first('password_confirmation')}}</span>
        @endif
        <button type="submit">Đăng Ký</button>
        <span>or use your account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form method="POST" action="{{route('auth.do_login')}}">
        @csrf
        <h1>Đăng Nhập</h1>
        <input
        name="email"
        type="email"
        placeholder="Email"
        c
        required
        >
        @if($errors->has('email'))
          <span class="errors-message">{{$errors->first('email')}}</span>
        @endif
        <input
        name="password"
        type="password"
        placeholder="Password"
        required
        >
        @if($errors->has('password'))
          <span class="errors-message">{{$errors->first('password')}}</span>
        @endif
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Hiển thị</label>
          </div>
          <div class="pass-link">
            <a href="#">Quên mật khẩu</a>
          </div>
        </div>
        <button type="submit">Đăng Nhập</button>
        <span>or use your account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1 class="title">COSMIC<br> Xin chào</h1>
            <p>Nếu bạn đã có tài khoản, Hãy đặng nhập ngay nào</p>
            <button class="ghost" id="login">Đăng Nhập
                <i class="lni lni-arrow-left login"></i>
            </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">COSMIC<br> Xin chào</h1>
          <p>Nếu bạn chưa có tài khoản, Hãy đăng ký ngay nào</p>
          <button class="ghost" id="register">Đăng ký
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="js/login.js"></script>

</body>
</html>