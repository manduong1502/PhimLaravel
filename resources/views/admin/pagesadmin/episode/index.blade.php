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
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('movie', 'Chọn phim', []) !!}
                            <select name="movie_id" class="form-control select-movie">
                                <option value="">Chọn phim</option>
                                @foreach($list_movie as $movie)
                                    <option value="{{ $movie->id }}" {{ (isset($episode) && $episode->movie_id == $movie->id) ? 'selected' : '' }}>
                                        {{ $movie->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::textarea('linkphim', isset($episode) ? $episode->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if ($errors->has('linkphim'))
                                <span class="errors-message">{{ $errors->first('linkphim') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            @if(!isset($episode))
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            <select name="episode" class="form-control" id="show_movie">

                            </select>
                            @if ($errors->has('episode'))
                                <span class="errors-message">{{ $errors->first('episode') }}</span>
                            @endif
                            @else 
                            {!! Form::label('episode', 'Chọn tập phim', []) !!}
                            <select name="episode" class="form-control">
                                @foreach ($list_episodes as $episodeId => $episodeName)
                                    <option value="{{ $episodeId }}" {{ isset($episode) && $episode->episode_id == $episodeId ? 'selected' : '' }}>
                                        {{ $episodeName }}
                                    </option>
                                @endforeach
                            </select>
                            @endif
                            {{-- {!! Form::text('episote', isset($episode) ? $episode->episode : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'disabled'
                            ]) !!} --}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('linkmovie', 'Server phim', []) !!}
                            {!! Form::select('linkserver',$linkmovie, $episode->server, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        @if (!isset($episode))
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
