@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý danh mục</div>
                    <div class="card-body container">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($category))
                            {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên Danh mục', []) !!}
                            {!! Form::text('title', isset($category) ? $category->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                            @if ($errors->has('title'))
                                <span class="errors-message">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường link', []) !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'convert_slug',
                            ]) !!}
                            @if ($errors->has('slug'))
                                <span class="errors-message">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Active', 'Hiển thị', []) !!}
                            {!! Form::select(
                                'status',
                                ['1' => 'Hiển thị', '0' => 'Không hiển thị'],
                                isset($category) ? $category->status : '',
                                ['class' => 'form-control'],
                            ) !!}
                            @if ($errors->has('status'))
                                <span class="errors-message">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        @if (!isset($category))
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
