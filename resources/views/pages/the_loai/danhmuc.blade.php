@extends('index')

@section('content')
    <div class="container film-title">
        <h2>{{ $cate_slug->title }}</h2>
    </div>
    <div class="container film-card d-grid">
        <div class="card-total m-2">
            @foreach ($movie as $key => $mov)
                <a href="{{ route('pages.chitiet', $mov->slug) }}">
                    <div class="film-card-img">
                        <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="">
                        <div class="play-icon">
                            <i class="fa-solid fa-circle-play"></i>
                        </div>
                        <div class="film-text">{{ $mov->title }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
