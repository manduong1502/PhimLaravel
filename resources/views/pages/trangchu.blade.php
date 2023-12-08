@extends('index')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            @foreach ($slide as $key => $sli) 
            <div class="carousel-item active">
                <div class="dark-bg-image">
                    @php
                        $image_check =substr($sli->image1,0,5);
                    @endphp
                    @if($image_check  =='https')
                        <img src="{{$sli->image1}}" class="d-block " width="100" alt="...">
                    @else
                        <img src="{{ asset('uploads/movie/imagebig/' . $sli->image1) }}" class="d-block " width="100" alt="...">
                    @endif    
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <div class="title-carousel-caption responsive-text">{{$sli->title}}</div>
                    <div class="top-trending-carousel-caption d-flex">
                        <div class="top-title ">TOP 5</div>
                        <div class="trending-title">Top phim thịnh hành</div>
                    </div>
                    <div class="title-smail-carousel-captison d-flex ">
                        @foreach($sli->movie_genre as $gen)
                            <div class="text-title">{{$gen->title}}</div>
                        @endforeach  
                    </div>

                    <div class="play-round-carousel-captison d-flex">
                        <div class="round-play">
                            <a href="{{route('pages.chitiet',$sli->slug)}}"><button class="circular-button"><i class="fa-solid fa-circle-play"></i></button></a>
                        </div>

                        <div class="round-play">
                            <button class="circular-button-note"><i class="fa-solid fa-note-sticky"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



            <div class="container content">
                <div class="content-title">
                    <div class="content-title-big">
                        <h2>ĐỀ XUẤT HOT</h2>
                    </div>
                </div>
                <div class="row slider">
                    @foreach ($phimhot as $key => $hot)
                        <a href="{{route('pages.chitiet',$hot->slug)}}" style="text-decoration: none;">
                            <div class="slider-card" style="width: 180px;">
                                <div class="card cards">
                                    @php
                                        $image_check =substr($hot->image,0,5);
                                    @endphp
                                    @if($image_check  =='https')
                                        <img src="{{$hot->image}}" alt="" style="width: 100%; height: 265px">
                                    @else
                                        <img src="{{ asset('uploads/movie/' . $hot->image) }}" alt="" style="width: 100%; height: 265px">
                                    @endif
                                    <div class="icon-overlay">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </div>
                                </div>

                                <div class="card-text">
                                    <p>{{$hot->title}}</p>
                                </div>
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

    @foreach ($category_home as $key => $cate_home)
        <div class="container contents">
            <div class="content-title">
                <div class="content-title-big">
                    <h2>{{ $cate_home->title }}</h2>
                </div>
            </div>

            <div class="row slider">
                @foreach ($cate_home->movie->take(10) as $key => $mov)
                    <a href="{{route('pages.chitiet',$mov->slug)}}" style="text-decoration: none">
                        <div class="slider-card">
                            <div class="card cards" style="position: relative">
                                @php
                                    $image_check =substr($mov->image,0,5);
                                @endphp
                                @if($image_check == 'https')
                                <img src="{{$mov->image}}" alt="" style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @else 
                                <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="" style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @endif
                                <div class="icon-overlay">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                            </div>

                            <div class="card-text">
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
            <div class="content-title-big">
                <h2>ĐỀ XUẤT HOT</h2>
            </div>

        </div>
        <div class="row slider">
            <div class="slider-card">
                <div class="card card-actor">
                    <img src="/public/image/image-11.png" alt="">

                </div>

                <div class="card-text">
                    <p>Anh bước ra từ ánh lửa</p>
                </div>
            </div>

            <div class="slider-card">
                <div class="card card-actor">
                    <img src="/public/image/image-11.png" alt="">

                </div>

                <div class="card-text">
                    <p>Anh bước ra từ ánh lửa</p>
                </div>
            </div>

            <div class="slider-card">
                <div class="card card-actor">
                    <img src="/public/image/image-11.png" alt="">

                </div>

                <div class="card-text">
                    <p>Anh bước ra từ ánh lửa</p>
                </div>
            </div>

            <div class="slider-card">
                <div class="card card-actor">
                    <img src="/public/image/image-11.png" alt="">

                </div>

                <div class="card-text">
                    <p>Anh bước ra từ ánh lửa</p>
                </div>
            </div>

            <div class="slider-card">
                <div class="card card-actor">
                    <img src="/public/image/image-11.png" alt="">

                </div>
                <div class="card-text">
                    <p>Anh bước ra từ ánh lửa</p>
                </div>
            </div>

            <div class="slider-card">
                <div class="card card-actor">
                    <img src="/public/image/image-11.png" alt="">

                </div>
                <div class="card-text">
                    <p>Anh bước ra từ ánh lửa</p>
                </div>
            </div>

        </div>
    </div>
@endsection
