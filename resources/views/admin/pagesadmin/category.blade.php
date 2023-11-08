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
                        @if (!isset($category))
                            {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['category.update',$category ->id], 'method' => 'PUT']) !!}
                        @endif
                            <div class="form-group">
                                {!! Form::label('title', 'Tên Danh mục', []) !!}
                                {!! Form::text('title', isset($category) ? $category->title : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'slug','onkeyup' => 'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', 'Đường link', []) !!}
                                {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'convert_slug']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Active', 'Hiển thị', []) !!}
                                {!! Form::select('status', ['1' =>'Hiển thị','0' =>'Không hiển thị'], isset($category) ? $category->status : '', ['class' => 'form-control']) !!}
                            </div>
                            @if (!isset($category))
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
                        <th scope="col">Tên Danh mục</th>
                        <th scope="col">Đường link</th>
                        <th scope="col">Hiển thị</th>
                        <th scope="col">Chỉnh sửa</th>
                      </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach($list as $key => $cate) 
                        <tr id="{{$cate->id}}">
                            <th scope="row">{{$key}}</th>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->slug}}</td>
                            <td>
                                @if($cate->status == 1)
                                    <span class="badge badge-success">Hiển thị</span>
                                @else
                                    <span class="badge badge-danger">Không hiển thị</span>
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")']]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('category.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
@endsection