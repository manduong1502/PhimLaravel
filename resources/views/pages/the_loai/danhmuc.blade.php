@extends('index')

@section('content')
    <div class="container film-title">
        <h2>{{ $cate_slug->title }}</h2>

    </div>

    <div class="container">
        <form action="{{ route('loc_phim') }}" method="get">
            @csrf
            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">

                        <select class="form-control" name="order" id="exampleFormControlSelect1">
                            <option value="">----Sắp Xếp----</option>
                            <option value="date">Ngày đăng</option>
                            <option value="year_release">Năm sản xuất</option>
                            <option value="name_movie">Tên Phim</option>
                            <option value="views">Lượt xem</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">

                        <select class="form-control" name="genre" id="exampleFormControlSelect1">
                            <option value="">----Thể Loại----</option>
                            @foreach ($genre as $key => $gen)
                            <option value="{{$gen->id}}">{{$gen->title}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">

                        <select class="form-control" name="country" id="exampleFormControlSelect1">
                            <option value="">----Quốc gia----</option>
                            @foreach ($country as $key => $coun)
                            <option value="{{$coun->id}}">{{$coun->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                            {!! Form::selectYear('year', 2000, 2023,null, [
                                        'class' => 'form-control',
                                        'placeholder' => '----Năm phim-----'
                                    ]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                <input type="submit" class="btn btn-sm btn-default" value="Lọc Phim">
            </div>
            </div>
            
        </form>
    </div>


    <div class="container film-card"
        style="display: grid ;grid-template-columns: repeat(auto-fit, minmax(19%, 1fr)); gap: 5px;">
        @foreach ($movie as $key => $mov)
            <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none; margin-bottom: 30px;">
                <div class="film-card-img" style="display: flex; flex-direction: column; align-items: center;">
                    @php
                        $image_check = substr($mov->image1, 0, 5);
                    @endphp
                    @if ($image_check == 'https')
                        <img src="{{ $mov->image }}" alt=""
                            style="width: 250px; height:330px; border-radius: 5px">
                    @else
                        <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                            style="width: 250px; height:330px; border-radius: 5px">
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
@endsection
