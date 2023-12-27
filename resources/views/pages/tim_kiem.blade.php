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
                            $image_check = substr($his_mov->movie->image, 0, 5);
                        @endphp
                        @if ($image_check == 'https')
                            <img src="{{ $his_mov->movie->image }}" alt=""
                                style="width: 250px; height:330px; border-radius: 5px; position: relative">
                        @else
                            <img src="{{ asset('uploads/movie/' . $his_mov->movie->image) }}" alt=""
                                style="width: 250px; height:330px; border-radius: 5px; position: relative">
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
