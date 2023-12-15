@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode_vip))
                            {!! Form::open(['route' => 'episodemovievip.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['episodemovievip.update', $episode_vip->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn phim', []) !!}
                            <select name="movie_vip_id" class="form-control select-movie">
                                <option value="">Chọn phim</option>
                                @foreach($list_movie as $movie)
                                    {{-- <option value="{{ $movie->name }}" {{ (isset($episode_vip) && $episode_vip->movie_id == $movie->id) ? 'selected' : '' }}>
                                        {{ $movie->title }}
                                    </option> --}}
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::textarea('linkphim', isset($episode_vip) ? $episode_vip->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            {{-- @if ($errors->has('linkphim'))
                                <span class="errors-message">{{ $errors->first('linkphim') }}</span>
                            @endif --}}
                        </div>

                        <div class="form-group">
                            @if(!isset($episode_vip))
                            {!! Form::label('episode_vip', 'Tập phim', []) !!}
                            <select name="episode_vip" class="form-control" id="show_movie">

                            </select>
                            {{-- @if ($errors->has('episode_vip'))
                                <span class="errors-message">{{ $errors->first('episode_vip') }}</span>
                            @endif --}}
                            @else 
                            {!! Form::label('episode_vip', 'Chọn tập phim', []) !!}
                            <select name="episode_vip" class="form-control">
                                @foreach ($list_episode_vips as $episode_vipId => $episode_vipName)
                                    <option value="{{ $episode_vipId }}" {{ isset($episode_vip) && $episode_vip->episode_vip_id == $episode_vipId ? 'selected' : '' }}>
                                        {{ $episode_vipName }}
                                    </option>
                                @endforeach
                            </select>
                            @endif
                            {{-- {!! Form::text('episote', isset($episode_vip) ? $episode_vip->episode_vip : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'disabled'
                            ]) !!} --}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('linkmovie', 'Server phim', []) !!}
                            {!! Form::select('linkserver',$linkmovie, $episode_vip->server, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        @if (!isset($episode_vip))
                            {!! Form::submit('Thêm Tập Phim', ['class' => 'btn btn-success mt-2']) !!}
                        @else
                            {!! Form::submit('Cập Nhập Tập phim', ['class' => 'btn btn-success mt-2']) !!}
                        @endif

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
