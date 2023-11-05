@extends('index')

@section('content')
    <div class="container film">
        <style type="text/css">
            .iframe-phim iframe {
                width: 100%;
                height: 600px;
            }
        </style>
        {{-- hiển thị phim --}}
        <div class="iframe-phim">
            {!! $episode->linkphim !!}
        </div>

        <div class="film-btn-support d-flex">
            <a href=""><i class="fa-solid fa-share"></i>Chia sẻ</a>
            <a href=""><i class="fa-solid fa-cloud"></i>Sư tầm</a>
        </div>

        <div class="row mt-3">
            <div class="film-title mt-3 col-md-8">
                <h2>{{ $movie->title }}</h2>
                <div class="film-title-star d-flex">
                    <div class="star"><i class="fa-solid fa-star"></i> 9.7 </div>
                    <div>(99 người đã đánh giá)</div>
                </div>
                <div class="detail-content-top mt-2 d-flex">
                    <div class="detail-content-top-text">Top 5</div>
                    <div class="detail-content-top-text-1">Top phim thịnh hành</div>
                </div>
                <hr>

                <div class="tab-content">
                    <div class="tab-pane active server-1">
                        <div class="halim-server">
                            <ul class="halim-list-eps" style="padding: 0; display:flex">
                                @foreach ($server as $key => $ser)
                                    @foreach ($episode_movie as $key => $epi_mov)
                                        @if ($epi_mov->server == $ser->id)
                                            <a href=""
                                                style="text-decoration: none; list-style: none; padding:10px;">
                                                <li class="halim-episode">
                                                    <span class="halim-btn hanlim-btn-2 halim-info-1-1 box-shadow">
                                                        <div>{{ $ser->title }}</div>
                                                    </span>
                                                </li>
                                            </a>

                                            <ul class="halim-list-eps" style="padding: 0; display:flex">
                                                @foreach ($episode_list as $key => $epi)
                                                    @if ($epi->server == $ser->id)
                                                        <a href="{{ url('xemphim/' . $movie->slug . '/tap-' . $epi->episode . '/server-' . $epi->server) }}"
                                                            style="text-decoration: none; list-style: none; padding-right: 10px">
                                                            <li class="halim-episode">
                                                                <span
                                                                    class="halim-btn hanlim-btn-2 {{ $tapphim == $epi->episode && $server_active == 'server-' . $ser->id ? 'active' : '' }} halim-info-1-1 box-shadow">
                                                                    <div>{{ $epi->episode }}</div>
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
                    <div class="content-title">
                        <div class="content-title-big">
                            <h2>ĐỀ XUẤT HOT</h2>
                        </div>

                    </div>
                    <div class="row slider">
                        @foreach ($movie_related as $key => $mov)
                            <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none">
                                <div class="slider-card">
                                    <div class="card">
                                        @php
                                            $image_check = substr($movie->image1, 0, 5);
                                        @endphp
                                        @if ($image_check == 'https')
                                            <img src="{{ $movie->image }}" alt="">
                                        @else
                                            <img src="{{ asset('uploads/movie/' . $movie->image) }}" alt="">
                                        @endif
                                        <div class="icon-overlay">
                                            <i class="fa-solid fa-circle-play"></i>
                                        </div>
                                    </div>

                                    <div class="card-text">
                                        <p>{{ $movie->title }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <hr>
            </div>

            <div class="col-md-4 miscellaneous-content-2">
                <div class="miscellaneous-content-2-block ">
                    <div class="miscellaneous-content-2-header">
                        Phim đang chiếu
                    </div>
                    <hr>
                    @foreach ($movie_related->take(5) as $key => $mov)
                        <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none">
                            <div class="miscellaneous-content-2-block-film container d-flex">
                                <div class="miscellaneous-content-2-block-film-img">
                                    @php
                                        $image_check = substr($movie->image1, 0, 5);
                                    @endphp
                                    @if ($image_check == 'https')
                                        <img width="100" height="120" src="{{ $movie->image }}" alt="">
                                    @else
                                        <img width="100" height="120"
                                            src="{{ asset('uploads/movie/' . $movie->image) }}" alt="">
                                    @endif
                                </div>

                                <div class="miscellaneous-content-2-block-film-text">
                                    <h6>{{ $movie->title }}</h6>
                                    <p>Kumarn - Drama, Horror</p>
                                    <p>Khởi chiếu: 06/10/2023</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
