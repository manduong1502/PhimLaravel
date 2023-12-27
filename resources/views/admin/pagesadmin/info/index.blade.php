@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý thông tin website</div>
                    <div class="card-body container">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($info))
                            {!! Form::open(['route' => 'info.store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['info.update', $info->id], 'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên website', []) !!}
                            {!! Form::text('title', isset($info) ? $info->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if ($errors->has('title'))
                                <span class="errors-message">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('1', 'Mô tả website', []) !!}
                            {!! Form::textarea('description', isset($info) ? $info->description : '', [
                                'class' => 'form-control description',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                            @if ($errors->has('description'))
                                <span class="errors-message">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image', 'Ảnh logo ', []) !!}
                            {!! Form::file('logo', ['class' => 'form-control-file']) !!}
                            @if (isset($info))
                                <img width="20%" src="{{ asset('uploads/logo/' . $info->logo) }}"alt="">
                            @endif
                            @if ($errors->has('image'))
                                <span class="errors-message">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image', 'Ảnh logo vip', []) !!}
                            {!! Form::file('logo_vip', ['class' => 'form-control-file']) !!}
                            @if (isset($info))
                                <img width="20%" src="{{ asset('uploads/logo/' . $info->logo_vip) }}"alt="">
                            @endif
                            @if ($errors->has('image1'))
                                <span class="errors-message">{{ $errors->first('image1') }}</span>
                            @endif
                        </div>

                        @if (!isset($info))
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

    <div class="container mt-5 table-responsive">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ảnh website logo </th>
                            <th scope="col">Ảnh website logo vip</th>
                            <th scope="col">Tên website</th>
                            <th scope="col">Mô tả website</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $cate)
                            <tr id="{{ $cate->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td><img width="70" height="100" src="{{ asset('uploads/logo/' . $cate->logo) }}"alt=""></td>
                                <td><img width="70" height="100" src="{{ asset('uploads/logo/' . $cate->logo_vip) }}"alt=""></td>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->description }}</td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['info.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('info.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection