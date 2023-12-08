@extends('index')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/gioithieu1.css">
    <link rel="stylesheet" href="js/gioithieu1.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
  </head>



  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public/image/anhbia1.jpeg" class="d-block w-100" alt="...">
        <div class=" carousel-caption d-none d-md-block position-absolute bottom-0 start-0">
          <a href="{{route('auth.index')}}" class="btn btn-danger btn-lg px-5">Đăng Kí Ngay</a>
          <h4 class="fw-normal pt-3">Bạn chưa đăng ký tài khoản? Đăng kí tài khoản tại đây</h4>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/image/anhbia2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/image/anhbia3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
    </div> 
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>

  <div class="container mt-5 ">
    <div class="row d-flex justify-content-center my-4">
        <div class="col">
            <h4 class="card-title text-center fs-2 fw-bold text-uppercase">THƯỞNG THỨC COSMIC VỚI 2 CÁCH</h4>
        </div>
    </div>

    <div class="row">
        <div class="col px-2">
            <div class="col d-flex justify-content-center">
                <img class="card-img-top rounded-2" style="height: 300px" src="public/image/maytinh.jpg" alt="">
            </div>
            <div class="col d-flex justify-content-center mt-3">
                <button class="btn btn-danger btn-lg">Xem phim trực tuyến</button>
            </div>
            <div class="col mt-3">
                <p class="fs-5">Chỉ 70K/tháng, thoả thích xem hàng ngàn bộ phim gồm: Phim Việt bom tấn, phim bộ Độc Quyền Galaxy Play, phim
                Hollywood và Disney tuyển chọn và phim bộ Châu Á gay cấn, hấp dẫn.</p>
            </div>
        </div>
        <div class="col px-2">
            <div class="col d-flex justify-content-center">
                <img class="card-img-top rounded-2" style="height: 300px" src="public/image/rapphim.jpg" alt="">
            </div>
            <div class="col d-flex justify-content-center mt-3">
                <button class="btn btn-danger btn-lg">Đặt vé phim chiếu rạp</button>
            </div>
            <div class="col mt-3">
                <p class="fs-5">Chỉ 70K/tháng, thoả thích xem hàng ngàn bộ phim gồm: Phim Việt bom tấn, phim bộ Độc Quyền Galaxy Play, phim
                Hollywood và Disney tuyển chọn và phim bộ Châu Á gay cấn, hấp dẫn.</p>
            </div>
        </div>
    </div>
</div>

    @foreach ($category_home as $key => $cate_home)
        <div class="carousel slide">
            <div class="content-title">
                <div class="content-title-big d-flex mx-auto">
                     <button type="button" class="btn btn-danger btn-lg text-uppercase">{{ $cate_home->title }}</button>
                </div>
            </div>

            <div class="row slider">
                @foreach ($cate_home->movie->take(10) as $key => $mov)
                    <a href="{{route('pages.chitiet',$mov->slug)}}" style="text-decoration: none">
                        <div class="slider-card">
                            <div class="card cards" style="position: relative">
                                <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="" style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                <div class="icon-overlay">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                            </div>

                            <div class="card-text position-relative">
                                {{ $mov->title }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
  

    <div class="container mt-5 ">
        <div class="row d-flex justify-content-center my-4">
            <div class="col">
                <h4 class="card-title text-center fs-2 fw-bold text-uppercase">KHUYẾN MÃI VÀ SỰ KIỆN</h4>
            </div>
        </div>

    
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" >
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4">
                    <img src="public/image/km1.jpg" class="d-block w-100 zoom" alt="Slide 1">
                  </div>
                  <div class="col-md-4">
                    <img src="public/image/km2.png" class="d-block w-100 zoom" alt="Slide 2">
                  </div>
                  <div class="col-md-4">
                    <img src="public/image/km3.png" class="d-block w-100 zoom" alt="Slide 3">
                  </div>
                </div>
              </div>
              <!-- Thêm các carousel-item khác nếu cần -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
      
    <div class="container mt-5 ">
        <div class="content-2-header mb-5">
          <h4 class="card-title text-center fs-2 fw-bold text-uppercase">Không quảng cáo và hơn thế nữa</h4>
        </div>
    
        <div class="row ">
          <div class="col-md-6 content-3">
            <div class="content-3-header content-text">
                {{-- <h2>Tận hưởng trọn vẹn, không gián đoạn mỗi phút giây cảm xúc khi thưởng thức bộ phim yêu thích.</h2> --}}
                <h1>Giải trí online không giới hạn hàng nghìn giờ nội dung đậm chất Việt</h1>
                <p>Bom tấn Việt chiếu rạp độc quyền và sớm nhất</p>
                <p>Phim Bộ Hot Châu Á</p>
                <p>Siêu phẩm điện ảnh Hollywood và Disney</p>
              <a  href="{{route('auth.index')}}" class="btn content-3-header-btn">Đăng kí ngay</a>
            </div>
          </div>
          <div class="col-md-6 content-3">
            <img class="img-fluid mx-auto d-block" src="public/image/logo/no-ads-removebg-1.png" alt="">
            <h4 class="text-center">Tận hưởng trọn vẹn, không gián đoạn mỗi phút giây cảm xúc khi thưởng thức bộ phim yêu thích.</h4>
          </div>
          
        </div>
      </div>
    
      <div class="container mt-5 bg-dark p-3 rounded-3">
        <div class="row my-3">
          <h4 class="card-title text-center fs-2 fw-bold text-uppercase">CÁC ĐỐI TÁC CỦA COSMIC</h4>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
              <img src="public/image/logo/beta.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 1" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
              <img src="public/image/logo/cgv.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 2" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
              <img src="public/image/logo/metiz.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 3" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/starlight.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 4" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/ncc.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 5" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/lotte.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 6" style="width:100px; height:100px">
            </div>
          </div>
          <!-- Row thứ 2 -->
          <div class="row mt-2">
            <div class="col-md-2">
                <img src="public/image/logo/vnpay.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 7" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/zalo4.png" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 8" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/momo.png" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 9" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/visa.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 10" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/jcb.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 11" style="width:100px; height:100px">
            </div>
            <div class="col-md-2">
                <img src="public/image/logo/mastercard.jpg" class="img-fluid mx-auto d-block rounded-2 zoom" alt="Ảnh 12" style="width:100px; height:100px">
            </div>
            <!-- Thêm các cột và hình ảnh cho hàng thứ 2 tương tự như trên -->
          </div>
      </div>

  {{-- <div class="container mt-5">
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
  </div> --}}

@endsection