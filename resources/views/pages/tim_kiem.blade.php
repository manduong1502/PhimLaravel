@extends('index')

@section('content')
    <div class="container film-title">
        <h2>Tìm Kiếm</h2>
    </div>

    @include('pages.the_loai.form_locphim')
    
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
                        <div class="film-text">{{ $mov->title }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
