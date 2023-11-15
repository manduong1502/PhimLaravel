@extends('admin.index')

@section('admin.content')
    <!-- Modal -->
    <div class="modal" id="blog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm danh tiêu đề con</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">Quản lý blog</div>
                        <div class="card-body container">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (!isset($blog))
                                {!! Form::open(['route' => 'blog.store', 'method' => 'POST']) !!}
                            @else
                                {!! Form::open(['route' => ['blog.update', $blog->id], 'method' => 'PUT']) !!}
                            @endif
                            <div class="form-group">
                                {!! Form::label('Genre', 'Thể Loại', []) !!} <br>
                            {!! Form::select('movie_id', $genre, isset($blog) ? $blog->genre_id : '', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Tiêu đề nhỏ', []) !!}
                                {!! Form::text('title_smail', '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...']) !!}
                                {!! Form::label('description', 'Mô tả', []) !!}
                                {!! Form::textarea('description', isset($blog) ? $blog->description : '', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nhập vào dữ liệu...',
                                    'id' => 'description',
                                ]) !!}
                                <div id="childForms">   
                                    <!-- Các form con sẽ được thêm vào đây -->
                                </div>
                                <button type="button" id="addButton" class="btn btn-success">Thêm Tiêu đề con</button>
                            </div>

                        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                @if (!isset($blog))
                                    {!! Form::submit('Thêm dữ liêu', ['class' => 'btn btn-success mt-2']) !!}
                                @else
                                    {!! Form::submit('Cập Nhập', ['class' => 'btn btn-success mt-2']) !!}
                                @endif
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên Blog</th>
                            <th scope="col">Đường link</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col">Thể Loại</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhập</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $cate)
                            <tr id="{{ $cate->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td><img width="70" height="100"
                                        src="{{ asset('uploads/video/trailer/' . $cate->video) }}"alt="">
                                </td>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->slug }}</td>
                                <td>{{ $cate->description }}</td>
                                <td>
                                    @if ($cate->status == 1)
                                        <span class="badge badge-success">Hiển thị</span>
                                    @else
                                        <span class="badge badge-danger">Không hiển thị</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="badge bg-dark d-block mb-1">{{ $cate->genre->title }}</div>
                                </td>
                                <td>{{ $cate->ngay_tao }}</td>
                                <td>{{ $cate->ngay_cap_nhap }}</td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['blog.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('blog.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#blog">
                                        Thêm tiêu đề con
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
