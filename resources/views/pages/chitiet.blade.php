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
                            <img src="{{ $movie->image1 }}" alt="...">
                        @else
                            <img src="{{ asset('uploads/movie/imagebig/' . $movie->image1) }}" alt="..."
                                style="width: 100%;">
                        @endif
                    </div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <div class="detail-title responsive-text">{{ $movie->title }}</div>
                    <div class="detail-title-small mt-2 d-flex ">
                        <span>Thể loại: </span>
                        @foreach ($movie->movie_genre as $gen)
                            <div class="text-title" style="margin-left: 5px; color: black; padding: 0 5px 0 5px;">
                                {{ $gen->title }}</div>
                        @endforeach
                    </div>

                    <div class="detail-title-small   mt-2 d-flex ">
                        <div class="text-title-name ">Diễn viên chính: </div>
                        <div class="d-flex">
                            @foreach ($movie->movie_actor as $act)
                            <div class="text-title" style="margin-left: 5px; color: black; padding: 0 5px 0 5px;">
                                {{ $act->name }}</div>
                        @endforeach
                        </div>
                    </div>
                    <div class="detail-title-small mt-2 d-flex ">
                        <span>Thời Lượng: </span>

                        <div class="" style="margin-left: 5px; color: rgb(255, 255, 255);">
                            {{ $movie->time }}
                        </div>

                    </div>

                    <div class="detail-title-small mt-2 d-flex ">
                        <span>Tập: </span>

                        <div class="" style="margin-left: 5px; color: rgb(255, 255, 255);">
                            {{ $movie->episode_count }}/{{ $movie->so_tap }}
                            @if ($movie->episode_count == $movie->so_tap)
                                <span>(Hoàn thành)</span>
                            @endif
                        </div>

                    </div>

                    <div class="detail-title-small mt-2 d-flex ">
                        <span>Năm: </span>

                        <div class="" style="margin-left: 5px; color: rgb(255, 255, 255);">
                            {{ $movie->nam_phim }}
                        </div>

                    </div>

                    <div class="detail-title-small mt-2 d-flex ">
                        <span>Chất lượng: </span>

                        <div class="" style="margin-left: 5px; color: rgb(255, 255, 255);">
                            {{ $movie->quality }}
                        </div>

                    </div>

                    <div class="detail-title-small mt-2  d-flex" style="text-align: left;">
                        <span class="text-title-name col-3 ">Tập mới nhất: </span>
                        <div class=" col-9">
                            @foreach ($episode as $key => $epi)
                                <a href="{{ url('xem-phim/' . $epi->movie->slug . '/tap-' . $epi->episode . '/server-' . $epi->server) }}"
                                    style="text-decoration: none; color: white; margin-left: 5px; font-weight: bold"> Tập
                                    {{ $epi->episode }}</a>
                            @endforeach
                        </div>
                    </div>


                    <div class="detail-title-small mt-3 d-flex" style="text-align: left;">
                        @if ($movie_tapdau && $movie_tapdau->episode && $movie_tapdau->episode !== 'Full')
                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-' . $movie_tapdau->episode . '/server-' . $movie_tapdau->server) }}"
                                class="btn btn-issue">
                                <i class="fa-solid fa-play"></i> Phát ngay
                            </a>
                        @elseif($movie_tapdau && $movie_tapdau->episode && $movie_tapdau->episode === 'Full')
                            <a href="{{ url('xem-phim/' . $movie->slug . '/tap-Full/server-' . $movie_tapdau->server) }}"
                                class="btn btn-issue">
                                <i class="fa-solid fa-play"></i> Phát ngay
                            </a>
                        @endif
                        <button class="btn btn-share"><i class="fa-solid fa-share"></i> Chia sẽ</button>
                        <button class="btn btn-share"><i class="fa-solid fa-cloud"></i> Sưu tập</button>
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
                        <li><a href="#info1">Thông tin</a></li>
                        <li><a href="#info2">Đánh giá</a></li>
                    </ul>
                    <hr>
                </div>

                <div class="mb-3 container">
                    <div id="info1" class="info">
                        <div class="container-fluid">
                            <h3>Tóm tắt</h3>
                            {!! $movie->description !!}
                            <h3>Trailer</h3>
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
                    <hr>
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
                                    <h6>{{ $mov->title }}</h6>
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
