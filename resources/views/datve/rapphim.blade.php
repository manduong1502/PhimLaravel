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
            <div class="list-group-vertical p-2">
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

@endsection
