@extends('index')

@section('content')
<nav class="navbar navbar-expand-lg" style="background-color:rgba(0, 0, 0, 0.048);height: 30px;">
</nav>
<div id="carouselExampleCaptions" class="carousel slide mt-5">
    <div class="form m-5 mt-3 rounded" style="background:rgba(0, 0, 0, 0.048)">
        <div class="row fw-bold fs-4 m-5" >
            <div class="col m-3" >
            <h1>Đặt mua vé trên COSMIC</h1>
            <ul class="list">
                <li class="list-item">Mua vé online, trải nghiệm phim hay</li>
                <li class="list-item">Đặt vé an toàn trên Cosmic</li>
                <li class="list-item">Thoải mái chọn chỗ ngồi, mua bắp nước tiện lợi</li>
                <li class="list-item">Lịch sử đặt vé được lưu lại ngay</li>
                
            </ul>
            <button type="button" class="btn btn-danger btn-lg d-flex mx-auto">ĐẶT VÉ NGAY</button>
            </div>
            <div class="col m-3">
                <img src="public/image/image-11.png" class="img-fluid rounded" alt="...">
            </div>
        </div>
    </div>  
</div>

@foreach ($category_home as $key => $cate_home)
        <div class="container contents">
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



    <div class="container contents">
        <div class="content-title">
            <div class="content-title-big d-flex mx-auto">
                <button type="button" class="btn btn-danger btn-lg">LỊCH CHIẾU PHIM</button>
            </div>
        </div>
        <form class="row g-3 bg-light text-dark p-3" action="">
            <div class="row">
                <div class="col-auto">
                    <p>Vị trí</p>
                </div>
                <div class="col-auto">
                    <select class="form-select border border-danger text-danger" aria-label="Default select example">
                        <option value="1">Đà Nẵng</option>
                        <option value="2">Hà Nội</option>
                        <option value="3">Tp. HCM</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select border border-danger text-danger" aria-label="Default select example">
                        <option selected>Đà Nẵng</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="card border-0 bg-transparent text-dark py-0" style="width: 70px; height: 100px">
                    <img src="public/image/logo/vnpay.jpg" class="card-img-top img-fluid" style="width: 50px; height:50px;" alt="...">
                    <div class="card-body">
                      <p class="card-text text-truncate text-dark">dassdfsdfsd</p>
                    </div>
                </div>
                <div class="card border-0 bg-transparent text-dark py-0" style="width: 70px; height: 100px">
                    <img src="public/image/logo/vnpay.jpg" class="card-img-top img-fluid" style="width: 50px; height:50px;" alt="...">
                    <div class="card-body">
                      <p class="card-text text-truncate text-dark">j bvzjbcvkzxjcbz</p>
                    </div>
                </div>
            </div>
            <div class="row border-bottom border-dark">
                <div class="col-4 border-end border-dark">
                    <div class="row ">
                        <div class="d-flex input-group">
                            <input type="text" name="search" class="form-control me-2" id="timkiem" placeholder="Tìm tên theo rạp" autocomplete="off" >
                            <button class="btn btn-outline-danger">Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="card border-0 bg-transparent">
                            <div class="row ">
                              <div class="col-md-4 my-auto">
                                <img src="public/image/logo/vnpay.jpg" class="img-fluid rounded border border-secondary" style="width:40px; height:40px" alt="...">
                              </div>
                              <div class="col-md-8 my-auto">
                                <div class="card-body my-auto">
                                    <div class="row" style=" height: 30px;">
                                        <h5 class="card-title text-start text-xs">Card title</h5>
                                        <p class="card-text text-dark text-xs fw-light">This is a wider card with supportin This content is a little bit longer.</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-4 border-end border-dark">
                    <select class="form-select border-0" multiple aria-label="multiple select example">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
                <div class="col-8">
                    jhgui
                </div>
            </div>
        </form>
    </div>

@endsection
