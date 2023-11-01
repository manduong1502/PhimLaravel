@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 table-responsive">
                <table class="table mt-4 table-success table-striped" id="myTable">
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
        </div>
    </div>
@endsection
