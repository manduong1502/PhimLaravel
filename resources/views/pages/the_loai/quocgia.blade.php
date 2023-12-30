@extends('index')

@section('content')
    <div class="container film-title">
        <div class="row ">
            <div class="col-md-9"  >
                <div class="content-left" style="background-color: #3a3938 ; ">
        
                <div class="content-title d-flex" style="margin-bottom: 30px">
                    <div class="content-title-big">
                        <h2 ><i class="fa-solid fa-play" style="margin-right: 20px; color:#A41717;"></i>Phim <span >{{$coun_slug->title}}</span></h2>
                    </div>
                    <div class="divider"></div>
                </div>
                @include('pages.the_loai.form_locphim')
                <div class=" film-card" >
                    @foreach ($movie as $key => $mov)
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
                                    {{$mov->episode_count}}/{{ $mov->so_tap }}
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

                <div class="container film-card">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination ">
                            <li class="page-item">
                                <a style="background: #353535;" class="page-link" href="{{ $movie->previousPageUrl() }}" aria-label="Previous">
                                    <span style="color:#fff" aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @for ($i = 1; $i <= $movie->lastPage(); $i++)
                                <li  class="page-item {{ $i == $movie->currentPage() ? 'active' : '' }}">
                                    <a style="background: #ffffff; color:#353535;" class="page-link" href="{{ $movie->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item">
                                <a style="background: #353535;" class="page-link" href="{{ $movie->nextPageUrl() }}" aria-label="Next">
                                    <span style="color:#fff" aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            </div>

            <div class="col-md-3" style=" border-radius: 20px; box-shadow: 0px 4px 4px 0px #A41717, 0px 4px 4px 0px rgba(0, 0, 0, 0.25);background-color: #3a3938; padding:0;">
                <div class="" style="width: 100%; height: auto;">
                    <div class=" miscellaneous-content-1-header">
                        <ul class="d-flex miscellaneous-content-1-header-ul container-fluid custom-list justify-content: center;"
                            style="margin-bottom: 10px;">
                            <li><a style="padding-right: 10px ;" href="#info1">Top view</a></li>
                            <li><a style="padding-right: 10px ;" href="#info2">Top phim bộ</a></li>
                            <li><a href="#info3">Top phim lẻ</a></li>
                        </ul>
                        
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div id="info1" class="info">
                            @foreach($top_view->take(5) as $top_vi)
                            <a href="{{ route('pages.chitiet', $top_vi->slug) }}" >
                                <div class="blog-content-2-title row d-flex pt-1">
                                    <div class="blog-content-2-title-img col-md-3">
                                        @php
                                    $image_check = substr($top_vi->image1, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $top_vi->image }}" width="80" height="100" alt="">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $top_vi->image) }}" width="80" height="120" alt="">
                                @endif
                                    </div>
                                    <div class="blog-content-2-title-text col-md-9">
                                        <h6 style="color: #FFF;font-family: Inter;font-size: 20px;font-style: normal;font-weight: 700;line-height: 28px; /* 140% */letter-spacing: 0.2px;">{{$top_vi->title}}</h6>
                                        <div class="blog-content-information ">
                                            <p class="blog-content-information">{{$top_vi->view}} N lượt quan tâm</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <div id="info2" class="info">
                            @foreach($movie_phimbo->take(5) as $top_pbo)
                            <a href="{{ route('pages.chitiet', $top_pbo->slug) }}">
                                <div class="blog-content-2-title row d-flex pt-1">
                                    <div class="blog-content-2-title-img col-md-3">
                                        @php
                                    $image_check = substr($top_pbo->image1, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $top_pbo->image }}" width="80" height="100" alt="">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $top_pbo->image) }}" width="80" height="120" alt="">
                                @endif
                                    </div>
                                    <div class="blog-content-2-title-text col-md-9">
                                        <h6>{{$top_pbo->title}}</h6>
                                        <div class="blog-content-information ">
                                            <p class="blog-content-information">{{$top_pbo->view}} N lượt quan tâm</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <div id="info3" class="info">
                            <div class="container-fluid">
                                @foreach($movie_phimle->take(5) as $phimle)
                            <a href="{{ route('pages.chitiet', $phimle->slug) }}">
                                <div class="blog-content-2-title row d-flex pt-1">
                                    <div class="blog-content-2-title-img col-md-3">
                                        @php
                                    $image_check = substr($phimle->image1, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $phimle->image }}" width="80" height="100" alt="">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $phimle->image) }}" width="80" height="120" alt="">
                                @endif
                                    </div>
                                    <div class="blog-content-2-title-text col-md-9">
                                        <h6>{{$phimle->title}}</h6>
                                        <div class="blog-content-information ">
                                            <p class="blog-content-information">{{$phimle->view}} N lượt quan tâm</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
