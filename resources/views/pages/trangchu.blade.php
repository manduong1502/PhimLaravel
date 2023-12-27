@extends('index')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            @foreach ($slide as $key => $sli)
                <div class="carousel-item active">
                    <div class="dark-bg-image" style="width: 100%; height: 100%">
                        @php
                            $image_check = substr($sli->image1, 0, 5);
                        @endphp
                        @if ($image_check == 'https')
                            <img src="{{ $sli->image1 }}" class="d-block " width="100" alt="..." style="height: 850px">
                        @else
                            <img src="{{ asset('uploads/movie/imagebig/' . $sli->image1) }}" class="d-block " width="100"
                                alt="...">
                        @endif
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <div class="title-carousel-caption responsive-text">{{ $sli->title }}</div>
                        <div class="top-trending-carousel-caption d-flex">
                            <div class="top-title ">TOP 5</div>
                            <div class="trending-title">Top phim thịnh hành</div>
                        </div>
                        <div class="title-smail-carousel-captison d-flex ">
                            @foreach ($sli->movie_genre as $gen)
                                <div class="text-title">
                                    {{ $gen->title }}
                                </div>
                            @endforeach
                        </div>

                        <div class="play-round-carousel-captison d-flex">
                            <div class="round-play">
                                <a href="{{ route('pages.chitiet', $sli->slug) }}"><button class="circular-button"><i
                                            class="fa-solid fa-circle-play"></i></button></a>
                            </div>

                            <div class="round-play">
                                <button class="circular-button-note"><i class="fa-solid fa-note-sticky"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



            <div class="container content" style="margin-top: 50px">
                <div class="content-title">
                    <div class="content-title-big">
                        <h2>ĐỀ XUẤT HOT</h2>
                    </div>
                </div>
                <div class="row slider">
                    @foreach ($phimhot as $key => $hot)
                        <a href="{{ route('pages.chitiet', $hot->slug) }}" style="text-decoration: none;">
                            <div class="slider-card" style="width: 180px;">
                                <div class="card cards">
                                    @php
                                        $image_check = substr($hot->image, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img src="{{ $hot->image }}" alt="" style="width: 100%; height: 265px">
                                        
                                    @else
                                        <img src="{{ asset('uploads/movie/' . $hot->image) }}" alt=""
                                            style="width: 100%; height: 265px">
                                    @endif
                                    <div class="icon-overlay">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </div>
                                </div>

                                <div class="card-text">
                                    <p style="margin: 0">{{ $hot->title }}</p>
                                </div>
                                <span class="episode" aria-hidden="true" style="position: absolute; top: 0; left: 0; background-color: black; color: white; font-weight: bold; width: auto; padding: 0 5px 0 5px; border-radius: 10px 0 10px 0; opacity: 0.8">
                                    {{$hot->episode_count}}/{{ $hot->so_tap }}
                                    @if($hot->episode_count == $hot->so_tap) 
                                        <span>hoan thanh</span>
                                    @else 
                                </span>
                            </div>
                        </a>
                    @endforeach
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

    @if($history_movie->isNotEmpty())
    <div class="container contents">
        <div class="content-title">
            <div class="content-title-big">
                <h2>Xem tiếp tục</h2>
            </div>
        </div>

        <div class="row slider">
            @foreach ($history_movie->take(10) as $key => $his_mov)
                    <a href="{{ route('pages.chitiet', $his_mov->movie->slug) }}" style="text-decoration: none">
                        <div class="slider-card">
                            <div class="card cards" style="position: relative">
                                @php
                                    $image_check = substr($his_mov->movie->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $his_mov->movie->image }}" alt=""
                                        style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $his_mov->movie->image) }}" alt=""
                                        style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @endif
                                <div class="icon-overlay">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                            </div>

                            <div class="card-text">
                                {{ $his_mov->movie->title }}
                                <span class="episode" aria-hidden="true" style="position: absolute; top: -300px; left: 0; background-color: black; color: white; width: auto; padding: 0 5px 0 5px; border-radius: 10px 0 10px 0; opacity: 0.8">
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
        </div>
    </div>
    @endif

    <div class="container contents">
        <div class="content-title">
            <div class="content-title-big">
                <h2>Phim độc quyền tại Cosmic</h2>
            </div>
        </div>

        <div class="row slider">
            @foreach ($movie_vip->take(10) as $key => $mov_vip)
                <a href="{{ route('pages.chitetvip', $mov_vip->slug) }}" style="text-decoration: none">
                    <div class="slider-card">
                        <div class="card cards" style="position: relative">

                            <img src="{{ asset('uploads/movie/' . $mov_vip->image) }}" alt=""
                                style="width: 250px; height:330px; border-radius: 5px; position: relative">
                            <div class="icon-overlay">
                                <i class="fa-solid fa-circle-play"></i>
                            </div>
                        </div>
                        <div class="icon-vip card">
                            <p>Chỉ có trên Cosmic Vip</p>
                        </div>
                        <div class="card-text">
                            {{ $mov_vip->title }}
                            <span class="episode" aria-hidden="true" style="position: absolute; top: -300px; left: 0; background-color: black; color: white; width: auto; padding: 0 5px 0 5px; border-radius: 10px 0 10px 0; opacity: 0.8">
                                {{$mov_vip->episode_count}}/{{ $mov_vip->so_tap }}
                                @if($mov_vip->episode_count == $mov_vip->so_tap)
                                <span>Hoàn thành</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>


    @foreach ($category_home as $key => $cate_home)
        <div class="container contents">
            <div class="content-title">
                <div class="content-title-big">
                    <h2>{{ $cate_home->title }}</h2>
                </div>
            </div>

            <div class="row slider">
                @foreach ($cate_home->movie->take(10) as $key => $mov)
                    <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none">
                        <div class="slider-card">
                            <div class="card cards" style="position: relative">
                                @php
                                    $image_check = substr($mov->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $mov->image }}" alt=""
                                        style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                                        style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @endif
                                <div class="icon-overlay">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                            </div>

                            <div class="card-text">
                                {{ $mov->title }}
                                <div>
                                    <span class="episode" aria-hidden="true" style="height:auto; position: absolute; top: -300px; left: -5px; background-color: black; color: white; width: auto; padding: 5px; border-radius: 10px 0 5px 0; opacity: 0.8">
                                        {{$mov->episode_count}}/{{ $mov->so_tap }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
