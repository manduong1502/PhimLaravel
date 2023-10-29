@extends('index')

@section('content')
    <div class="container film-title">
        <h2>{{ $coun_slug->title }}</h2>
    </div>
    <div class="container film-card" style="display: grid ;grid-template-columns: repeat(auto-fit, minmax(19%, 1fr)); gap: 5px;">
            @foreach ($movie as $key => $mov)
                <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none; margin-bottom: 30px;">
                    <div class="film-card-img" style="display: flex; flex-direction: column; align-items: center;">
                        <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="" style="width: 250px; height:350px; border-radius: 5px">
                        <div class="play-icon">
                            <i class="fa-solid fa-circle-play"></i>
                        </div>
                        <div class="film-text" style="width: 250px;font-weight: bold; color: white; position: absolute; bottom: 0; left: 2.5px; right: 0;color: white; padding: 5px; text-align: center; border-radius: 0 0 5px 5px">{{ $mov->title }}</div>
                    </div>
                </a>
            @endforeach
    </div>
@endsection
