@extends('admin.index')

@section('admin.content')
    <div class="container mt-5 table-responsive">
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
                            {!! Form::open(['route' => 'episodemovievip.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['episodemovievip.update', $episode->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('movie_title', 'Phim', []) !!}
                            {!! Form::text('movie_title', isset($movie) ? $movie->title : '', [
                                'class' => 'form-control',
                                'readonly',
                            ]) !!}
                            {!! Form::hidden('movie_vip_id', isset($movie) ? $movie->id : '') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::textarea('linkphim', isset($episode) ? $episode->linkphim : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            
                        </div>
                        @if (isset($episode))
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập phim', []) !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nhập vào dữ liệu...',
                                    isset($episode) ? 'readonly' : '',
                                ]) !!}
                                
                            </div>
                        @else
                            <div class="form-group">
                                {!! Form::label('episode', 'Tập phim', []) !!}

                                {!! Form::selectRange('episode', 1, $movie->so_tap, $movie->so_tap, [
                                    'class' => 'form-control',
                                ]) !!}
                                {{-- {!! Form::label('episode', 'Tập phim', []) !!}
                            <select name="episode" class="form-control" id="show_movie">
                                
                            </select> --}}
                            </div>
                        @endif

                        <div class="form-group">
                            {!! Form::label('linkmovie', 'Server phim', []) !!}
                            {!! Form::select('linkserver',$linkmovie, '', [
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

                    <table class="table mt-4 table-success table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Phim</th>
                                <th scope="col">Tập phim</th>
                                <th scope="col">Link phim</th>
                                <th scope="col">Server phim</th>
                                <th scope="col">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody class="order_position">
                            @foreach ($list_episode as $key => $episode)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $episode->movie_vip->title }}</td>
                                    <td>Tập {{ $episode->episode }}</td>
                                    <td>{!! $episode->linkphim !!}</td>
                                    {{-- <td>
                                    @if ($cate->status == 1)
                                        <span class="badge badge-success">Hiển thị</span>
                                    @else
                                        <span class="badge badge-danger">Không hiển thị</span>
                                    @endif
                                </td> --}}
                                <td>
                                    @foreach($list_server as $key => $server_link)
                                        @if($episode->server  == $server_link->id)
                                            {{$server_link->title}}
                                        @endif
                                    @endforeach
                                </td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['episodemovievip.destroy', $episode->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                        ]) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('episodemovievip.edit', $episode->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
