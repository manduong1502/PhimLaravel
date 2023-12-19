@extends('index')

@section('content')
    <div class="container film-title">
        <h2>{{ $coun_slug->title }}</h2>
    </div>

    @include('pages.the_loai.form_locphim')
    <div class="container film-card"
        style="display: grid ;grid-template-columns: repeat(auto-fit, minmax(19%, 1fr)); gap: 5px;">
        @foreach ($movie as $key => $mov)
            <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none; margin-bottom: 30px;">
                <div class="film-card-img" style="display: flex; flex-direction: column; align-items: center;">
                    @php
                        $image_check = substr($mov->image1, 0, 5);
                    @endphp
                    @if ($image_check == 'https')
                        <img src="{{ $mov->image }}" alt="" style="width: 250px; height:350px; border-radius: 5px">
                    @else
                        <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                            style="width: 250px; height:350px; border-radius: 5px">
                    @endif
                    <div class="play-icon">
                        <i class="fa-solid fa-circle-play"></i>
                    </div>
                    <div class="film-text"
                        style="width: 250px;font-weight: bold; color: white; position: absolute; bottom: 0; left: 2.5px; right: 0;color: white; padding: 5px; text-align: center; border-radius: 0 0 5px 5px">
                        {{ $mov->title }}
                        {{$mov->episode_count}}/{{ $mov->so_tap }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="container film-card justify-content-end">
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
@endsection
