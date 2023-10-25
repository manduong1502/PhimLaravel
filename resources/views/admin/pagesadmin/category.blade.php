@extends('admin.index')

@section('admin.content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Quản lý danh mục</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('title', 'title', []) !!}
                                {!! Form::text('title', null, ['class' => 'form-control','placeholders' =>'Nhập vào dữ liệu...','id' =>'title_danhmuc']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description', []) !!}
                                {!! Form::textarea('title', null, ['class' => 'form-control','placeholders' =>'Nhập vào dữ liệu...','id' =>'Description']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Active', 'Active', []) !!}
                                {!! Form::select('status', ['1' =>'Hiển thị','0' =>'Không hiển thị'], null, ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('Thêm dữ liêu', ['class' =>'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
@endsection