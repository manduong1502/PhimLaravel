@extends('index')
@section('content')


    <div id="carouselExample" class="carousel slide ">
        <div class="carousel-inner">
            @foreach ($slide as $key => $sli)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <div class="dark-bg-image">
                <div class="dark-bg-image-2">
                @php
                $image_check = substr($sli->image1, 0, 5);
                @endphp
                @if ($image_check == 'https')
                <img src="{{ $sli->image1 }}" class="d-block w-100" style="object-fit: cover;" height="900" alt="...">
                @else
                <img src="{{ asset('uploads/movie/imagebig/' . $sli->image1) }}" style="object-fit: cover;" class="d-block w-100" height="900" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="title-carousel-caption">{{ $sli->origin_name }}</div>
                    <div class="responsive-text">{{ $sli->title }}</div>
                    <hr style="opacity: inherit;margin: 0; width: 500px;">
                    <div class="top-trending-carousel-caption ">
                        
                        <div class="top-title ">Thời lượng: {{$sli->time}}</div>
                        <div class="top-title ">Năm: {{$sli->nam_phim}}</div>
                        <div class="top-title ">Quốc gia: {{$sli->country->title}}</div>
                        <div class="top-title ">Số tập: 
                            {{$sli->episode_count}} /
                            @if($sli->so_tap === '?')
                                (Đang cập nhập)
                            @elseif($sli->so_tap === '? tập')
                                (Đang cập nhập)    
                            @else
                            <span>{{ substr($sli->so_tap, 0, 2) }} tập</span>   
                            @endif
                           @if($sli->episode_count == $sli->so_tap) 
                            <span style="color: rgb(211, 31, 31)">(Hoàn thành)</span>
                           @endif
                        </div>
                        <div class="top-title ">Thể loại:
                            @foreach ($sli->movie_genre->take(6) as $gen)
                            {{ $gen->title }},
                            @endforeach
                            ...
                        </div>

                        <div class="top-title"> Diễn viên:
                            @foreach ($sli->movie_actor->take(5) as $act)
                            {{ $act->name }},
                            @endforeach
                            ....
                        </div>
                    </div>
                    
        
                    <div class="play-round-carousel-captison d-flex">
                        <div class="round-play ">
                            <a class="circular-button" href="{{ route('pages.chitiet', $sli->slug) }}">Phát ngay</a>
                        </div>
        
                        <div class="round-play">
                            <a class="circular-button-note" href="{{ route('pages.chitiet', $sli->slug) }}">Xem trailer</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>

            @endforeach
          </div>


        <div class="container content" style="margin-top: 50px">
            <div class="content-title">
                <div class="content-title-big">
                    <h2>ĐỀ XUẤT HOT</h2>
                </div>
            </div>
            <div class="row card_hot">
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
                                <p>{{ $hot->title }}</p>
                                <span class="episode" aria-hidden="true">
                                    {{$hot->episode_count}}/{{ $hot->so_tap }}
                                </span>

                                <span class="episode" aria-hidden="true" >
                                    {{$hot->lang}}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
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
                                <span class="episode" aria-hidden="true">
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

                        <div class="card-text">
                            {{ $mov_vip->title }}
                            <span class="episode" aria-hidden="true">
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


    @foreach ($category_home->take(5) as $key => $cate_home)
        <div class="container contents">
            <div class="content-title">
                <div class="content-title-big">
                    <h2>{{ $cate_home->title }}</h2>
                </div>
            </div>

            <div class="row slider">
                @foreach ($cate_home->movie->sortByDesc('position')->take(10) as $key => $mov)
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
                                <span class="episode" aria-hidden="true">
                                    {{$mov->episode_count}}/{{ $mov->so_tap }}
                                </span>

                                <span class="episode" aria-hidden="true" >
                                    {{$mov->lang}}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
