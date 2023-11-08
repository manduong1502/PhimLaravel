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
                            {!! Form::open(['route' => 'blog.store', 'method' => 'POST','enctype' => 'multipart/form-data','id'=> 'mainForm']) !!}
                        @else
                            {!! Form::open(['route' => ['blog.update',$blog ->id], 'method' => 'PUT','enctype' => 'multipart/form-data','id'=> 'mainForm']) !!}
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
                                {!! Form::label('title', 'Tiêu đề nhỏ', []) !!}
                                {!! Form::text('title_smail', '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...']) !!}
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
        </div>
    </div>
@endsection