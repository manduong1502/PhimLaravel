@extends('index')

@section('content')
    <style type="text/css">
    .halim-episode {
    list-style: none;
    margin-bottom: 10px;
    position: relative;
}

.halim-btn {
    text-decoration: none;
    display: block;
    border-radius: 5px;
}

/* Điều chỉnh kiểu cho tập phim đang xem */
.halim-episode.active .btn-halim-active  {
    background-color: #ffcc00; /* Màu nền tập phim đang xem */
    color: #fff; /* Màu chữ tập phim đang xem */
    border-color: #878686; /* Màu viền tập phim đang xem */
}


.vip-tag {
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(20%, -2px); /* Dịch phần tử đi một nửa chiều ngang để nằm gần góc phải */
    color: #ff0000; /* Màu chữ "VIP" */ /* Điều chỉnh kích thước và padding */
    border-radius: 3px; /* Bo tròn góc */
    font-size: 13px; /* Điều chỉnh kích thước chữ */
    padding: 3px 5px;
    background-color:#fff; 
    }
    </style>
    <div class="container film">
        <style type="text/css">
            .iframe-phim iframe {
                width: 100%;
                height: 600px;
                border: 1px solid #fff;
            }
        </style>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content"  >
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
            <div class="card" >
                <img src="{{asset('/public/image/logo/logopro_trắng.png')}}" class="img-fluid logovip" alt="Cosmic Cinema" height="400" width="1000px">
                <h1>Chọn một gói phù hợp với bạn</h1>
                <h3>Bằng việc đăng ký gói Cosmic Vip, bạn đồng ý với Điều khoản dịch vụ của Cosmic. Lưu ý: Chính sách quyền riêng tư của Cosmic mô tả cách dữ liệu được xử lý trong dịch vụ này.</h3>
            
                <div class="container">
                    <div class="row goiphim">
                      <div class="col-md-4">
                        <div class="goiphim_detail">
                            <div class="tieude">
                                <h4>Cơ bản</h4>
                            </div>
                            <div class="detail">
                                <div class="price">
                                    <p class="gia">70,000đ</p>
                                    <p>tháng</p>
                                </div>
                                <div class="quantity">
                                    <p class="chatluong">Chất lượng video</p>
                                    <p>Tốt</p>
                                </div>
                                <div class="resolution">
                                    <p class="phangiai">Độ phân giải</p>
                                    <p>720p</p>
                                </div>
                                <div class="device">
                                    <p class="thietbi">Thiết bị</p>
                                    <div>
                                        <p>Điện thoại</p>
                                        <p>Máy tính</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pay">
                                <form action="{{route('vnpay_payment')}}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="amount" value="70000">
                                    <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><p>MUA</p></button>
                                </form>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="goiphim_detail">
                            <div class="tieude">
                                <h4>Cơ bản</h4>
                            </div>
                            <div class="detail">
                                <div class="price">
                                    <p class="gia">108,000đ</p>
                                    <p>tháng</p>
                                </div>
                                <div class="quantity">
                                    <p class="chatluong">Chất lượng video</p>
                                    <p>Tốt</p>
                                </div>
                                <div class="resolution">
                                    <p class="phangiai">Độ phân giải</p>
                                    <p>1080p</p>
                                </div>
                                <div class="device">
                                    <p class="thietbi">Thiết bị</p>
                                    <div>
                                        <p>Điện thoại</p>
                                        <p>Máy tính</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pay">
                                <form action="{{route('vnpay_payment')}}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="amount" value="108000">
                                    <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><p>MUA</p></button>
                                </form>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="goiphim_detail">
                            <div class="tieude">
                                <h4>Cơ bản</h4>
                            </div>
                            <div class="detail">
                                <div class="price">
                                    <p class="gia">220,000đ</p>
                                    <p>tháng</p>
                                </div>
                                <div class="quantity">
                                    <p class="chatluong">Chất lượng video</p>
                                    <p>Tốt</p>
                                </div>
                                <div class="resolution">
                                    <p class="phangiai">Độ phân giải</p>
                                    <p>4K + HDR</p>
                                </div>
                                <div class="device">
                                    <p class="thietbi">Thiết bị</p>
                                    <div>
                                        <p>Điện thoại</p>
                                        <p>Máy tính</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pay">
                                <form action="{{route('vnpay_payment')}}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="amount" value="220000">
                                    <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><p>MUA</p></button>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>    
            </div>
        </div>
      </div>
    </div>
  </div>

        
        @role('uservip')
            <div class="iframe-phim">
                {!! $episode->linkphim !!}
            </div>
        @else
        <div class="iframe-phim">
            <iframe width="100%" src="{{ asset('https://www.youtube.com/embed/' . $movie->trailer) }}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
        @endrole

        <div class="row mt-3">
            <div class="film-title mt-3 col-md-8">
                <h2 >{{ $movie->title }}</h2>
                <div class="film-title-star d-flex">
                    <div class="star"></i> 9.7 <span style="color:#ffffff">( {{$movie->view}} Người quan tâm  )</span> </div>
                    <div >
                        <a href="#" class="btn btn-share">Chia sẽ</a>
                        <a href="#" class="btn btn-share">Lưu</a>
                    </div>
                </div>
                <hr>

                <div class="tab-content">
                    <div class="tab-pane active server-1">
                        <div class="halim-server">
                            <ul class="halim-list-eps" style="padding: 0">
                                @foreach ($server as $key => $ser)
                                    @foreach ($episode_movie as $key => $epi_mov)
                                        @if ($epi_mov->server == $ser->id)
                                            <a href=""
                                                style="text-decoration: none; list-style: none; padding:10px;">
                                                <li class="halim-episode-ser">
                                                    <span class="halim-btn hanlim-btn-2 halim-info-1-1 box-shadow">
                                                        <div> #{{ $ser->title }}</div>
                                                    </span>
                                                </li>
                                            </a>
                                            @role('uservip')
                                            <ul class="halim-list-eps" style="padding: 0; display: grid; grid-template-columns: repeat(10, 1fr)">
                                                @foreach ($episode_list as $key => $epi)
                                                    @if ($epi->server == $ser->id)
                                                        <a href="{{ url('xem-phim-vip/' . $movie->slug . '/tap-' . $epi->episode . '/server-' . $epi->server) }}"
                                                            style="text-decoration: none; list-style: none; padding-right: 10px; margin-bottom: 10px; position: relative;">
                                                            <li class="halim-episode {{ $tapphim == $epi->episode && $server_active == 'server-' . $ser->id ? 'active' : '' }}">
                                                                <span class="halim-btn hanlim-btn-2 halim-info-1-1 box-shadow">
                                                                    <div class="btn-halim-active">{{ $epi->episode }}</div>
                                                                </span>
                                                            </li>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @else
                                            
                                            <ul class="halim-list-eps" style="padding: 0; display: grid; grid-template-columns: repeat(10, 1fr)">
                                                @foreach ($episode_list as $key => $epi)
                                                    @if ($epi->server == $ser->id)
                                                        <a href=""  data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            style="text-decoration: none; list-style: none; padding-right: 10px; margin-bottom: 10px; position: relative;">
                                                            <li class="halim-episode {{ $tapphim == $epi->episode && $server_active == 'server-' . $ser->id ? 'active' : '' }}">
                                                                <span class="halim-btn hanlim-btn-2 halim-info-1-1 box-shadow">
                                                                    <div class="btn-halim-active">{{ $epi->episode }}</div>
                                                                </span>
                                                                <div class="vip-tag">VIP</div> <!-- Thêm phần tử cho chữ "VIP" -->
                                                            </li>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @endrole
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <div class="content-title d-flex">
                        <div class="content-title-big">
                            <h2 style="font-size: 30px;color:#000"><i class="fa-solid fa-play" style="margin-right: 20px; color:#A41717;"></i>Đề xuất <span style="font-size: 35px;">Hot</span></h2>
                        </div>
                        <div class="divider"></div>

                    </div>
                    <div class="row card_hot1">
                        @foreach ($movie_related as $key => $mov)
                            <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none;">
                                <div class="slider-card" style="margin-right: 15px">
                                    <div class="card cards"style="border-radius: 15px; border: 2px solid black">
                                        @php
                                            $image_check = substr($mov->image1, 0, 5);
                                        @endphp
                                        @if ($image_check == 'https')
                                            <img src="{{ $mov->image }}" alt="" style="height: 220px;border-radius: 10px;">
                                        @else
                                            <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="" style="height: 240px;border-radius: 10px;">
                                        @endif
                                        <div class="icon-overlay">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </div>
                                    </div>

                                    <div class="card-text" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.42), #151515); left:0.5px; border-radius: 0 0 14px 14px;">
                                        <p>{{ $mov->title }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>


                @php
                            $current_url = Request::url();
                        @endphp
                        <div style="background-color: aliceblue" class="fb-comments" data-href="{{ $current_url }}"
                            data-width="100%" data-numposts="10"></div>
            </div>

            <div class="col-md-4 miscellaneous-content-2">
                <div class="miscellaneous-content-2-block ">
                    <div class="miscellaneous-content-2-header">
                        Phim liên quan
                    </div>
                    @foreach ($movie_related->take(5) as $key => $mov)
                        <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none; ">
                            <div class="miscellaneous-content-2-block-film container d-flex">
                                <div class="miscellaneous-content-2-block-film-img">
                                    @php
                                        $image_check = substr($mov->image1, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img width="70" height="100" src="{{ $mov->image }}" alt="">
                                    @else
                                        <img width="70" height="100"
                                            src="{{ asset('uploads/movie/' . $mov->image) }}" alt="">
                                    @endif
                                </div>

                                <div class="miscellaneous-content-2-block-film-text"
                                    style="text-decoration: none; color: white; font-weight: bold">
                                    <div style="color: #FFF;font-family: Montserrat;font-size: 25px;font-style: normal;font-weight: 600;line-height: 28px; /* 200% */letter-spacing: 0.2px;">{{ $mov->title }}</div>
                                    <p style="color: #FFF;font-family: Montserrat;font-size: 13px;font-style: normal;font-weight: 600;line-height: 28px; /* 233.333% */letter-spacing: 0.2px; margin:0">{{$mov->origin_name}}</p>
                                    <p style="color: #FFF;font-family: Montserrat;font-size: 13px;font-style: normal;font-weight: 600;line-height: 28px; /* 233.333% */letter-spacing: 0.2px;">{{$mov->view}}N lượt quan tâm</p>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
