@extends('index')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="dark-bg-image ">
                    <div class="dark-bg-image-2">
                        @php
                            $image_check = substr($movie->image1, 0, 5);
                        @endphp
                        @if ($image_check == 'https')
                            <img src="{{ $movie->image1 }}" alt="..." width="100%" height="800">
                        @else
                            <img src="{{ asset('uploads/movie/imagebig/' . $movie->image1) }}" alt="..."
                                style="width: 100%;">
                        @endif
                    </div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <div class="title-carousel-caption">{{ $movie->title }}</div>
                    <div class="responsive-text">{{ $movie->origin_name }}</div>
                    <div class="responsive-text112 " >
                        <div class="responsive-text12">
                            {{ $movie->nam_phim }}
                        </div>
                        <div class="responsive-text12">
                            {{ $movie->quality }}
                        </div>
                        <div class="responsive-text12">
                            {{ $movie->lang }}
                        </div>

                        <div class="responsive-text12 ">
                            {{$movie->episode_count}} /
                            @if($movie->so_tap === '?')
                                (Đang cập nhập)
                            @elseif($movie->so_tap === '? tập')
                                (Đang cập nhập)    
                            @else
                            <span>{{ substr($movie->so_tap, 0, 2) }} tập</span>   
                            @endif
                           @if($movie->episode_count == $movie->so_tap) 
                            <span style="color: rgb(211, 31, 31)">(Hoàn thành)</span>
                           @endif
                        </div>

                        <div class="responsive-text12">
                            {{ $movie->time }}
                        </div>
                    </div>
                    <hr style="opacity: inherit;margin: 0; width: 500px;">
                    <div class="top-trending-carousel-caption ">
                        <div class="top-title ">
                            Quốc gia: {{$movie->country->title}}
                        </div>
                        <div class="top-title ">Thể loại:
                            @foreach ($movie->movie_genre->take(6) as $gen)
                            {{ $gen->title }},
                            @endforeach
                            ...
                        </div>

                        <div class="top-title"> Diễn viên:
                            @foreach ($movie->movie_actor->take(5) as $act)
                            {{ $act->name }},
                            @endforeach
                            ....
                        </div>
                    </div>
                    <div class="detail-title-small mt-2  d-flex" style="text-align: left;">
                        <span class="text-title-name col-3 " style="font-weight: bold;">Tập mới nhất: </span>
                        <div class=" col-9">
                            @foreach ($episode as $key => $epi)
                                @if($epi->episode == '')
                                    <span style="font-weight: bold;">Trailer</span>
                                @else
                                <a href="{{ url('xem-phim-vip/' . $epi->movie_vip->slug . '/tap-' . $epi->episode . '/server-' . $epi->server) }}"
                                    style="text-decoration: none; color: white; margin-left: 5px; font-weight: bold"> Tập
                                    {{ $epi->episode }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>


                    <div class="detail-title-small mt-3 d-flex" style="text-align: left;">
                        @if ($movie_tapdau && $movie_tapdau->episode && $movie_tapdau->episode !== 'Full')
                            <a href="{{ url('xem-phim-vip/' . $movie->slug . '/tap-' . $movie_tapdau->episode . '/server-' . $movie_tapdau->server) }}"
                                class="btn-issue">
                                <i class="fa-solid fa-play"></i> Phát ngay
                            </a>
                        @elseif($movie_tapdau && $movie_tapdau->episode && $movie_tapdau->episode === 'Full')
                            <a href="{{ url('xem-phim-vip/' . $movie->slug . '/tap-Full/server-' . $movie_tapdau->server) }}"
                                class="btn-issue">
                                <i class="fa-solid fa-play"></i> Phát ngay
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container miscellaneous mt-5">
        <div class="row  miscellaneous-content">
            <div class="col-md-8 miscellaneous-content-1 ">
                <div class=" miscellaneous-content-1-header">
                    <ul class="d-flex miscellaneous-content-1-header-ul container-fluid custom-list"
                        style="margin-bottom: 10px;">
                        <li style="margin-top:20px"><a href="#info1">Thông tin</a></li>
                        <li style="margin-top:20px"><a href="#info2">Đánh giá</a></li>
                    </ul>
                    <hr>
                </div>

                <div class="mb-3 container">
                    <div id="info1" class="info">
                        <div class="container-fluid">
                            <h3> <i class="fa-solid fa-play" style="color: #A41717; font-size:15px;"></i> Tóm tắt</h3>
                            {!! $movie->description !!}
                            <h3> <i class="fa-solid fa-play" style="color: #A41717; font-size:15px;"></i> Trailer</h3>
                            <iframe width="100%"
                                height="515"src="{{ asset('https://www.youtube.com/embed/' . $movie->trailer) }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen style="border-radius: 10px;"></iframe>
                        </div>



                    </div>
                    <!-- begin info3-->
                    <div id="info2" class="info">
                        <div class="container info3-assess-header">
                            Bình luận
                        </div>
                        @php
                            $current_url = Request::url();
                        @endphp
                        <div style="background-color: aliceblue" class="fb-comments" data-href="{{ $current_url }}"
                            data-width="100%" data-numposts="10"></div>
                    </div>
                    <!-- end info3-->

                    <!-- begin info4-->
                
                </div>
                <!-- end info4-->


            </div>
            <div class="col-md-4 miscellaneous-content-2">
                <div class="miscellaneous-content-2-block ">
                    <div class="miscellaneous-content-2-header">
                        Phim liên quan
                    </div>
                    @foreach ($movie_related->take(5) as $key => $mov)
                        <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none">
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
