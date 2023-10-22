<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/gioi-thieu.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
  <header id="site-header">
    <nav class="navbar navbar-expand-lg mt-3">
      <div class="container header">
        <img class="navbar-brand" src="public/image/logo/logo.png" alt="">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{route('auth.index')}}">
              <div class="btn login-introduce">
                Đăng Nhập
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public/image/Những tựa phim việt nam độc.png" class="d-block w-100" alt="...">
        <div class="carousel-item-text">
          <h1>NHỮNG TỰA PHIM VIỆT NAM VÀ QUỐC TẾ ĐÌNH ĐÁM .TẤT CẢ ĐỀU CÓ TRÊN COSMIC VỚI GIÁ CHỈ TỪ 50.000đ.</h1>
          <h2>THAM GIA NGAY NÀO</h2>

          <h4>Bạn đã sẵn sàng xem chưa? hãy đăng kí tài khoản của bạn ngay</h4>
          <a href="{{route('auth.index')}}" class="btn carousel-item-btn">Đăng Kí Ngay</a>
        </div>
      </div>
    </div>
    
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 content-text">
        <h1>Giải trí online không giới hạn hàng nghìn giờ nội dung đậm chất Việt</h1>
        <p>Bom tấn Việt chiếu rạp độc quyền và sớm nhất</p>
        <p>Phim Bộ Hot Châu Á</p>
        <p>Siêu phẩm điện ảnh Hollywood và Disney</p>
        <button class="btn">Đăng Ký Ngay</button>
        <div class="international-text">100+ đối tác sản xuất phim trong nước và quốc tế</div>
        <img src="public/image/logo/nhan-hang-66.png" alt="">
      </div>

      <div class="col-md-6">
        <div class="img-poster">
          <div class="poster-img-1">
            <img src="public/image/logo/1.png" alt="">
            <img class="mt-3" src="public/image/logo/2.png" alt="">
          </div>
          <div class="poster-img">
            <img src="public/image/logo/3.png" alt="">
            <img class="mt-3" src="public/image/logo/4.png" alt="">
          </div>
          <div class="poster-img-1">
            <img src="public/image/logo/5.png" alt="">
            <img class="mt-3" src="public/image/logo/6.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="content-2-header">
      <h1>Bạn có 2 cách để thưởng thức Cosmic</h1>
    </div>

    <div class="row ">
      <div class="col-md-6 content-2">
        <div class="content-2-img">
          <img src="public/image/logo/image-68.png" alt="">
          <button class="btn content-2-btn">Xem phim gói</button>
        </div>
        <p>Chỉ 70K/tháng, thoả thích xem hàng ngàn bộ phim gồm: Phim Việt bom tấn, phim bộ Độc Quyền Galaxy Play, phim
          Hollywood và Disney tuyển chọn và phim bộ Châu Á gay cấn, hấp dẫn.</p>
      </div>
      <div class="col-md-6 content-2">
        <div class="content-2-img">
          <img src="public/image/logo/image-69.png" alt="">
          <button class="btn content-2-btn">Đặt vé phim chiếu rạp</button>
        </div>
        <p>Chỉ 70K/tháng, thoả thích xem hàng ngàn bộ phim gồm: Phim Việt bom tấn, phim bộ Độc Quyền Galaxy Play, phim
          Hollywood và Disney tuyển chọn và phim bộ Châu Á gay cấn, hấp dẫn.</p>
      </div>
      
    </div>
  </div>

  <div class="container mt-5 ">
    <div class="content-2-header">
      <h1>Không chèn quảng cáo khi xem phim</h1>
    </div>

    <div class="row ">
      <div class="col-md-6 content-3">
        <div class="content-3-header">
          <h2>Tận hưởng trọn vẹn, không gián đoạn mỗi phút giây cảm xúc khi thưởng thức bộ phim yêu thích.</h2>
          <a  href="{{route('auth.index')}}" class="btn content-3-header-btn">Đăng kí ngay</a>
        </div>
      </div>
      <div class="col-md-6 content-3">
        <img src="public/image/logo/no-ads-removebg-1.png" alt="">
      </div>
      
    </div>
  </div>


  <footer class="bg-dark text-white pt-5 pb-4 mt-5">

    <div class="container text-center text-md-left">

        <div class="row text-center text-md-left">

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Company Name</h5>
                <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                    ital consectetur lorem ipsum dolor sit amet adipisicing elit.</p>

            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> TheProviders</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Creativity</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> SourceFiles</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> bootstrap 5 alpha</a>
                </p>

            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Your Account</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Become an Affiliates</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;">Shipping Rates</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Help</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                <p>
                    <i class="fas fa-home mr-3"></i>New York, NY 2333, US
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i>theproviders98@gmail.com
                </p>
                <p>
                    <i class="fas fa-phone mr-3"></i>+92 3162859445
                </p>
                <p>
                    <i class="fas fa-print	 mr-3"></i>+01 335 633 77
                </p>
            </div>

        </div>


    </div>

</footer>


  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/index.js"></script>
</body>

</html>
