@extends('index')

@section('content')
    @if (isset($cate_slug))
        <div class="container film-title">
            <h2>{{ $cate_slug->title }}</h2>
        </div>
        <div class="container film-card d-grid">
            <div class="card-total m-2">
                <div class="film-card-img">
                    <img src="public/image/image-40.png" alt="">
                    <div class="play-icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                    <div class="film-text">ssdsddfsdslkdsd</div>
                </div>
            </div>
        </div>
    @elseif(isset($gen_slug))
        <div class="container film-title">
            <h2>{{$gen_slug->title}}</h2>
        </div>
        <div class="container film-card d-grid">
            <div class="card-total m-2">
                <div class="film-card-img">
                    <img src="public/image/image-40.png" alt="">
                    <div class="play-icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                    <div class="film-text">ssdsddfsdslkdsd</div>
                </div>
            </div>
        </div>
    @elseif(isset($coun_slug))
        <div class="container film-title">
            <h2>{{ $coun_slug->title }}</h2>
        </div>
        <div class="container film-card d-grid">
            <div class="card-total m-2">
                <div class="film-card-img">
                    <img src="public/image/image-40.png" alt="">
                    <div class="play-icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                    <div class="film-text">ssdsddfsdslkdsd</div>
                </div>
            </div>
        </div>
    @endif
@endsection
