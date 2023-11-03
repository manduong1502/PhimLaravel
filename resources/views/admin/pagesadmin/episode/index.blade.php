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
                            {!! Form::select(
                                'movie_id',
                                ['0' => 'Chọn phim', 'Phim' => $list_movie],
                                isset($episode) ? $episode->movie_id : '',
                                [
                                    'class' => 'form-control select-movie',
                                ],
                            ) !!}
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
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            <select name="episode" class="form-control" id="show_movie">

                            </select>
                            @if ($errors->has('episode'))
                                <span class="errors-message">{{ $errors->first('episode') }}</span>
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
