@extends('admin.index')

@section('admin.content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý danh mục</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($blog))
                            {!! Form::open(['route' => 'blog.store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['blog.update',$blog ->id], 'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
                        @endif
                            <div class="form-group">
                                {!! Form::label('title', 'Tên Blog', []) !!}
                                {!! Form::text('title', isset($blog) ? $blog->title : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'slug','onkeyup' => 'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', 'Đường link', []) !!}
                                {!! Form::text('slug', isset($blog) ? $blog->slug : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'convert_slug']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Mô tả', []) !!}
                                {!! Form::textarea('description', isset($blog) ? $blog->description : '', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nhập vào dữ liệu...',
                                    'id' => 'description',
                                ]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Genre', 'Thể Loại', []) !!} <br>
                            {!! Form::select('genre_id', $genre, isset($blog) ? $blog->genre_id : '', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Active', 'Hiển thị', []) !!}
                                {!! Form::select('status', ['1' =>'Hiển thị','0' =>'Không hiển thị'], isset($blog) ? $blog->status : '', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('video', 'Video', []) !!}
                                {!! Form::file('video', ['class' => 'form-control-file']) !!}
                                @if (isset($blog))
                                    <img width="20%" src="{{ asset('uploads/movie/trailer/' . $blog->video) }}"alt="">
                                @endif
                            </div>
                            @if (!isset($blog))
                                {!! Form::submit('Thêm dữ liêu', ['class' =>'btn btn-success mt-2']) !!}
                            @else
                            {!! Form::submit('Cập Nhập', ['class' =>'btn btn-success mt-2']) !!}
                            @endif
                            
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="mt-4"></div>
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Video</th>
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
                        @foreach($list as $key => $cate) 
                        <tr id="{{$cate->id}}">
                            <th scope="row">{{$key}}</th>
                            <td><img width="70" height="100" src="{{ asset('uploads/video/trailer/' . $cate->video) }}"alt="">
                            </td>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->slug}}</td>
                            <td>{{$cate->description}}</td>
                            <td>
                                @if($cate->status == 1)
                                    <span class="badge badge-success">Hiển thị</span>
                                @else
                                    <span class="badge badge-danger">Không hiển thị</span>
                                @endif
                            </td>
                            <td><div class="badge bg-dark d-block mb-1">{{ $cate->genre->title }}</div></td>
                            <td>{{ $cate->ngay_tao }}</td>
                            <td>{{ $cate->ngay_cap_nhap }}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['blog.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")']]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('blog.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
@endsection