@extends('index')

@section('content')
    <div class="container film-title">
        <h2>Tìm Kiếm</h2>
    </div>
    <div class="container film-card d-grid">
        <div class="card-total m-2">
            @foreach ($movie as $key => $mov)
                <a href="{{ route('pages.chitiet', $mov->slug) }}">
                    <div class="film-card-img">
                        @php
                            $image_check = substr($movie->image1, 0, 5);
                        @endphp
                        @if ($image_check == 'https')
                        <img src="{{$mov->image }}" alt="">
                        @else
                        <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="">
                        @endif
                        <div class="play-icon">
                            <i class="fa-solid fa-circle-play"></i>
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
