@extends('index')

@section('content')
    <div class="container film-title">
        <div class="row ">
            <div class="col-md-9 " style="background-color: #3a3938 ;padding: 10px;">
                <div class="container ">
                    <h2>{{ $cate_slug->title }}</h2>

                </div>
                @include('pages.the_loai.form_locphim')
                <div class=" film-card" style="display: grid ;grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); ">
                    @foreach ($movie as $key => $mov)
                        <a href="{{ route('pages.chitiet', $mov->slug) }}"
                            style="text-decoration: none; margin-bottom: 20px;">
                            <div class="film-card-img" style=" flex-direction: column;">
                                @php
                                    $image_check = substr($mov->image1, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $mov->image }}" alt=""
                                        style="width: 230px; height:300px; border-radius: 5px">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                                        style="width: 230px; height:300px; border-radius: 5px">
                                @endif
                                <div class="play-icon">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                                <div class="film-text"
                                    style="width: 250px;font-weight: bold; color: white; position: absolute; bottom: 0; left: 2.5px; right: 0;color: white; padding: 5px; text-align: center; border-radius: 0 0 5px 5px">
                                    {{ $mov->title }}
                                    {{ $mov->episode_count }}/{{ $mov->so_tap }}
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>

                <div class="container film-card">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination ">
                            <li class="page-item">
                                <a class="page-link" href="{{ $movie->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @for ($i = 1; $i <= $movie->lastPage(); $i++)
                                <li class="page-item {{ $i == $movie->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $movie->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item">
                                <a class="page-link" href="{{ $movie->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>

            <div class="col-md-3" style="background-color: #3a3938;padding: 10px;">
                <div class="" style="width: 100%; height: auto;">
                    <div class=" miscellaneous-content-1-header">
                        <ul class="d-flex miscellaneous-content-1-header-ul container-fluid custom-list"
                            style="margin-bottom: 10px;">
                            <li><a style="padding-right: 10px ;" href="#info1">Top view</a></li>
                            <li><a style="padding-right: 10px ;" href="#info2">Top phim bộ</a></li>
                            <li><a href="#info3">Top phim lẻ</a></li>
                        </ul>
                        <hr>
                    </div>

                    <div class="mb-3">
                        <div id="info1" class="info">
                            @foreach($top_view as $top_vi)
                            <a href="{{ route('pages.chitiet', $top_vi->slug) }}">
                                <div class="blog-content-2-title row d-flex pt-4">
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
                                        <h6>{{$top_vi->title}}</h6>
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
                            @foreach($movie_phimbo as $top_pbo)
                            <a href="{{ route('pages.chitiet', $top_pbo->slug) }}">
                                <div class="blog-content-2-title row d-flex pt-4">
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
                                @foreach($movie_phimle as $phimle)
                            <a href="{{ route('pages.chitiet', $phimle->slug) }}">
                                <div class="blog-content-2-title row d-flex pt-4">
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
