@extends('index')

@section('content')
    <style type="text/css">
    .halim-episode {
    list-style: none;
    margin-bottom: 10px;
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
    border-color: #ffcc00; /* Màu viền tập phim đang xem */
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
        {{-- hiển thị phim --}}
        <div class="iframe-phim">
            {!! $episode->linkphim !!}
        </div>

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

                                            <ul class="halim-list-eps" style="padding: 0; display: grid; grid-template-columns: repeat(10, 1fr)">
                                                @foreach ($episode_list as $key => $epi)
                                                    @if ($epi->server == $ser->id)
                                                        <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $epi->episode . '/server-' . $epi->server) }}"
                                                            style="text-decoration: none; list-style: none; padding-right: 10px; margin-bottom: 10px">
                                                            <li class="halim-episode {{ $tapphim == $epi->episode && $server_active == 'server-' . $ser->id ? 'active' : '' }}">
                                                                <span class="halim-btn hanlim-btn-2 halim-info-1-1 box-shadow">
                                                                    <div class="btn-halim-active" >{{ $epi->episode }}</div>
                                                                </span>
                                                            </li>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </ul>
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
                            <div class="slider-card" style="width: 180px;">
                                <div class="card cards">
                                    @php
                                        $image_check = substr($mov->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img src="{{ $mov->image }}" alt="" style="width: 100%; height: 265px">
                                        
                                    @else
                                        <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                                            style="width: 100%; height: 265px">
                                    @endif
                                    <div class="icon-overlay">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </div>
                                    <span class="episode" aria-hidden="true"  >
                                        @if($mov->episode_count == $mov->so_tap)
                                            <span>Hoàn thành</span>
                                        @else
                                        {{$mov->episode_count}}/
                                        @if ($mov->so_tap === '?')
                                            <span style="font-size: 10px;">(cập nhập)</span>
                                        @elseif($mov->so_tap === '? tập')
                                            <span style="font-size: 13px;">(cập nhập)</span>
                                        @else
                                            <span>{{ substr($mov->so_tap, 0, 2) }} tập</span>
                                        @endif
                                        @endif
                                    </span>
                                </div>
    
                                <div class="card-text" style="position: relative; z-index: 99; top: -10px">
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
