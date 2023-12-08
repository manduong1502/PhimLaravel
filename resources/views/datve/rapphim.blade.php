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

        <div class="form bg-light border border-light rounded text-dark m-3 p-3">
            <div class="row">
                <div class="btn-group btn-group-sm p-1">
                    <div class="col-auto">
                        <label class="form-label" for="vitri">Vị trí</label>
                    </div>
                    <button type="button" id="vitri" class="btn btn-outline-danger"><i class="fa-solid fa-location-dot"></i>Đà Nẵng</button>
                    <button type="button" id="vitri" class="btn btn-outline-danger"><i class="fa-solid fa-crosshairs"></i>Gần bạn</button>
                </div>
                <div class="list-group-horizontal p-1">
                    <img src="public/public/image/image/1.png" alt="" class="image-fluid" style="width: 50px; height:50px; border-radius: 2px;">
                    <p>àafds</p>
                </div>  
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">
                        <form class="d-flex" action="{{route('search')}}" method="GET">
                            <div class="d-flex input-group">
                            <input type="text" name="search" class="form-control me-2" id="timkiem" placeholder="Tìm tên theo rạp" autocomplete="off" >
                            <button class="btn btn-outline-danger"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <ul class="list-group" id="result" style="display: none; position: absolute; top: 100%; left: 60.5%; border: 1px solid black; width: 300px; z-index: 999; "></ul>
                          </form>
                    </th>
                    <th scope="col">Hàng 2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-4">Data 1</td>
                    <td class="col-8">Data 2</td>
                  </tr>
                  <!-- Các hàng khác -->
                </tbody>
              </table>
              
            <div class="row">
                <div class="col-4">
                    <form class="d-flex" action="{{route('search')}}" method="GET">
                        <div class="d-flex input-group">
                        <input type="text" name="search" class="form-control me-2" id="timkiem" placeholder="Tìm tên theo rạp" autocomplete="off" >
                        <button class="btn btn-outline-danger">Search</button>
                        </div>
                        <ul class="list-group" id="result" style="display: none; position: absolute; top: 100%; left: 60.5%; border: 1px solid black; width: 300px; z-index: 999; "></ul>
                      </form>
                </div>
                <div class="col-8 ">
                    <div class="table">

                    </div>
                    {{-- <div class="row">
                        <div class="col-2 d-flex mx-auto">
                            <img src="public/public/image/image/1.png" alt="" style="width: 50px; height:50px; border-radius: 2px;">
                        </div>
                        <div class="col-10">
                            <p><strong>This line rendered as bold text.</strong></p>
                            <p><small>This line of text is meant to be treated as fine print.</small></p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

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
