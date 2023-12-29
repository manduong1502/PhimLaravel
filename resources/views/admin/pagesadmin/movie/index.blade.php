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
                        @if (!isset($movie))
                            {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên Phim', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                            @if($errors->has('title'))
                            <span class="errors-message">{{$errors->first('title')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Tên Phim tiếng anh', []) !!}
                            {!! Form::text('origin_name', isset($movie) ? $movie->origin_name : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if($errors->has('origin_name'))
                            <span class="errors-message">{{$errors->first('origin_name')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường link', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'convert_slug',
                            ]) !!}
                            @if($errors->has('slug'))
                            <span class="errors-message">{{$errors->first('slug')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'description',
                            ]) !!}
                            @if($errors->has('description'))
                            <span class="errors-message">{{$errors->first('description')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('so_tap', 'Số Tập', []) !!}
                            {!! Form::text('so_tap', isset($movie) ? $movie->so_tap : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                            ]) !!}
                            @if($errors->has('so_tap'))
                            <span class="errors-message">{{$errors->first('so_tap')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Chất lượng', []) !!}
                            {!! Form::text('quality', isset($movie) ? $movie->quality : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if($errors->has('title'))
                            <span class="errors-message">{{$errors->first('quality')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Lang(Vietsub,thuyetminh)', []) !!}
                            {!! Form::text('lang', isset($movie) ? $movie->lang : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if($errors->has('origin_name'))
                            <span class="errors-message">{{$errors->first('lang')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Thời lượng', []) !!}
                            {!! Form::text('time', isset($movie) ? $movie->time : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if($errors->has('origin_name'))
                            <span class="errors-message">{{$errors->first('time')}}</span>
                          @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('Actor', 'Diễn viên', []) !!} <br>
                            @foreach ($list_actor as $key => $list_act)
                                @if (isset($movie))
                                    {!! Form::checkbox(
                                        'actor[]',
                                        $list_act->id,
                                        isset($movie_actor) && $movie_actor->contains($list_act->id) ? true : false,
                                    ) !!}
                                @else
                                    {!! Form::checkbox('actor[]', $list_act->id) !!}
                                @endif
                                {!! Form::label('actor', $list_act->name) !!}
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('Active', 'Năm phim', []) !!}
                            {!! Form::selectYear('nam_phim', 2000, 2023, isset($movie) ? $movie->nam_phim : '', [
                                        'class' => 'form-control',
                                    ]) !!}
                            @if($errors->has('status'))
                            <span class="errors-message">{{$errors->first('status')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Active', 'Hiển thị', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ? $movie->status : '', [
                                'class' => 'form-control',
                            ]) !!}
                            @if($errors->has('status'))
                            <span class="errors-message">{{$errors->first('status')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Category', 'Danh mục', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', [
                                'class' => 'form-control',
                            ]) !!}
                            @if($errors->has('category_id'))
                            <span class="errors-message">{{$errors->first('category_id')}}</span>
                          @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Country', 'Quốc Gia', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control']) !!}
                            @if($errors->has('country_id'))
                                <span class="errors-message">{{$errors->first('country_id')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Genre', 'Thể Loại', []) !!} <br>
                            {{-- {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class' => 'form-control']) !!} --}}
                            @foreach ($list_genre as $key => $list_gen)
                                @if (isset($movie))
                                    {!! Form::checkbox(
                                        'genre[]',
                                        $list_gen->id,
                                        isset($movie_genre) && $movie_genre->contains($list_gen->id) ? true : false,
                                    ) !!}
                                @else
                                    {!! Form::checkbox('genre[]', $list_gen->id) !!}
                                @endif
                                {!! Form::label('genre', $list_gen->title) !!}
                            @endforeach
                        </div>


                        <div class="form-group">
                            {!! Form::label('Phim hot', 'Loại', []) !!}
                            {!! Form::select('type', ['series' => 'Phim bộ', 'single' => 'Phim lẽ','hoathinh'=>'Hoạt hình'], isset($movie) ? $movie->type : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Phim hot', 'Hiển thị slide', []) !!}
                            {!! Form::select('slide', ['0' => 'Không hiển thị', '1' => 'Hiển thị'], isset($movie) ? $movie->slide : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Phim hot', 'Đề xuất hot', []) !!}
                            {!! Form::select(
                                'phim_hot',
                                ['0' => 'Không hiển thị', '1' => 'Hiển thị'],
                                isset($movie) ? $movie->phim_hot : '',
                                [
                                    'class' => 'form-control',
                                ],
                            ) !!}
                            @if($errors->has('phim_hot'))
                                <span class="errors-message">{{$errors->first('phim_hot')}}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            {!! Form::label('Image', 'Ảnh nhỏ', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($movie))
                                <img width="20%" src="{{ asset('uploads/movie/' . $movie->image) }}"alt="">
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image', 'Ảnh lớn', []) !!}
                            {!! Form::file('image1', ['class' => 'form-control-file']) !!}
                            @if (isset($movie))
                                <img width="20%" src="{{ asset('uploads/movie/imagebig/' . $movie->image1) }}"alt="">
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Trailer (link cuối đuôi youtube)', []) !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                        </div>


                        @if (!isset($movie))
                            {!! Form::submit('Thêm dữ liêu', ['class' => 'btn btn-success mt-2']) !!}
                        @else
                            {!! Form::submit('Cập Nhập', ['class' => 'btn btn-success mt-2']) !!}
                        @endif

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
