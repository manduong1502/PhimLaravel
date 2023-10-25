@extends('admin.index')

@section('admin.content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý thể loại</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($genre))
                            {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['genre.update',$genre ->id], 'method' => 'PUT']) !!}
                        @endif
                            <div class="form-group">
                                {!! Form::label('title', 'title', []) !!}
                                {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'title_danhmuc']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description', []) !!}
                                {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'description']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Active', 'Active', []) !!}
                                {!! Form::select('status', ['1' =>'Hiển thị','0' =>'Không hiển thị'], isset($genre) ? $genre->status : '', ['class' => 'form-control']) !!}
                            </div>
                            @if (!isset($genre))
                                {!! Form::submit('Thêm dữ liêu', ['class' =>'btn btn-success mt-2']) !!}
                            @else
                            {!! Form::submit('Cập Nhập', ['class' =>'btn btn-success mt-2']) !!}
                            @endif
                            
                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table mt-4 table-success table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Active</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key => $cate) 
                        <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->description}}</td>
                            <td>
                                @if($cate->status == 1)
                                    <span class="badge badge-success">Hiển thị</span>
                                @else
                                    <span class="badge badge-danger">Không hiển thị</span>
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['genre.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")']]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('genre.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
@endsection