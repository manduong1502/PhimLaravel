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
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường link', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'description',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('so_tap', 'Số Tập', []) !!}
                            {!! Form::text('so_tap', isset($movie) ? $movie->so_tap : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Diễn viên (mỗi diễn viên cách dấu phẩy vd: dv1,dv2)', []) !!}
                            {!! Form::text('actor', isset($movie) ? $movie->actor : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('daodien', 'Daodien', []) !!}
                            {!! Form::textarea('daodien', isset($movie) ? $movie->daodien : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'daodien',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Active', 'Hiển thị', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ? $movie->status : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Category', 'Danh mục', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Country', 'Quốc Gia', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control']) !!}
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
                    <a class="btn btn-danger" href="{{ route('movie.index') }}">Cập nhập file Jojn</a>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-4 ">
        <table class="table mt-4 table-success table-striped  table-responsive" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình ảnh nhỏ</th>
                    <th scope="col">Hình ảnh lớn</th>
                    <th scope="col">Trailer</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Thêm tập phim</th>
                    <th scope="col">Số tập</th>
                    <th scope="col">Đường dẫn phim</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hiển thị</th>
                    <th scope="col">Diễn viên</th>
                    <th scope="col">Hiển thị Đề xuất hot</th>
                    <th scope="col">Hiển thị slide</th>
                    <th scope="col-md-3">Danh mục</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Năm phim</th>
                    <th scope="col">Ngày Cập Nhập</th>
                    <th scope="col">Năm phim</th>
                    <th scope="col">Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody class="order_position">
                @foreach ($list as $key => $cate)
                    <tr id="{{ $cate->id }}">
                        <th scope="row">{{ $key }}</th>
                        <td>
                            <img width="70" height="100" src="{{ asset('uploads/movie/' . $cate->image) }}"alt="">
                            <input type="file" data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}" class="form-control-file file_image" accept="image/*">
                            <div id="success_image"></div>
                        </td>
                        <td>
                            <img width="70" height="100"
                                src="{{ asset('uploads/movie/imagebig/' . $cate->image1) }}"alt="">
                        </td>
                        <td><iframe width="200" height="100"
                                src="{{ 'https://www.youtube.com/embed/' . $cate->trailer }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </td>
                        <td>{{ $cate->title }}</td>
                        <td><a href="{{ route('add-episode', [$cate->id]) }}" class="btn btn-danger btn-sm">Thêm tập
                                phim</a></td>
                        <td> {{ $cate->episode_count }}/{{ $cate->so_tap }} tập</td>
                        <td>{{ $cate->slug }}</td>
                        <td>{{ $cate->description }}</td>
                        <td>
                            {{-- @if ($cate->status == 1)
                                <span class="badge badge-success">Hiển thị</span>
                            @else
                                <span class="badge badge-danger">Không hiển thị</span>
                            @endif --}}
                            <select id="{{$cate->id}}" class="trangthai_choose">
                                <option value="1" {{$cate->status == 1 ? 'selected' : ''}}>Hiển thị</option>
                                <option value="0" {{$cate->status == 0 ? 'selected' : ''}}>Không hiển thị</option>
                            </select>
                        </td>
                        <td>{{ $cate->actor }}</td>
                        <td>
                            {{-- @if ($cate->phim_hot == 1)
                                <span class="badge badge-success">Hiển thị</span>
                            @else
                                <span class="badge badge-danger">Không hiển thị</span>
                            @endif --}}
                            <select id="{{$cate->id}}" class="phimhot_choose">
                                <option value="1" {{$cate->phim_hot == 1 ? 'selected' : ''}}>Hiển thị</option>
                                <option value="0" {{$cate->phim_hot == 0 ? 'selected' : ''}}>Không hiển thị</option>
                            </select>
                        </td>
                        <td>
                            {{-- @if ($cate->slide == 1)
                                <span class="badge badge-success">Hiển thị</span>
                            @else
                                <span class="badge badge-danger">Không hiển thị</span>
                            @endif --}}
                            <select id="{{$cate->id}}" class="slide_choose">
                                <option value="1" {{$cate->slide == 1 ? 'selected' : ''}}>Hiển thị</option>
                                <option value="0" {{$cate->slide == 0 ? 'selected' : ''}}>Không hiển thị</option>
                            </select>
                        </td>
                        <td>
                            {{-- {{ $cate->category->title }} --}}
                            {!! Form::select('category_id', $category, isset($cate) ? $cate->category->id : '', [
                                'class' => 'form-control category_choose',
                                'style' => 'width : 150px;',
                                'id' => isset($cate) ? $cate->id : '',
                            ]) !!}
                        </td>
                        <td>
                            @if (isset($movie_genre))
                                @foreach ($cate->movie_genre as $gen)
                                    <div class="badge bg-dark d-block mb-1">{{ $gen->title }}</div>
                                @endforeach
                            @else
                                <div class="badge bg-dark d-block mb-1">{{ $cate->genre->title }}</div>
                            @endif

                        </td>
                        <td>
                            {{-- {{ $cate->country->title }} --}}
                            {!! Form::select('country_id', $country, isset($cate) ? $cate->country->id : '', ['class' => 'form-control country_choose','style' => 'width : 150px;','id' => isset($cate) ? $cate->id : '']) !!}
                        </td>
                        <td>
                            {!! Form::selectYear('year', 2000, 2023, isset($cate->nam_phim) ? $cate->nam_phim : '', [
                                'class' => 'select-year',
                                'id' => $cate->id,
                            ]) !!}
                        </td>
                        <td>{{ $cate->ngay_tao }}</td>
                        <td>{{ $cate->ngay_cap_nhap }}</td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['movie.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                            ]) !!}
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{ route('movie.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection