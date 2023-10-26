@extends('admin.index')

@section('admin.content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý quốc gia</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($country))
                            {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['country.update',$country ->id], 'method' => 'PUT']) !!}
                        @endif
                            <div class="form-group">
                                {!! Form::label('title', 'title', []) !!}
                                {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'slug','onkeyup' => 'ChangeToSlug()']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('slug', 'slug', []) !!}
                                {!! Form::text('slug', isset($country) ? $country->slug : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'convert_slug']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description', []) !!}
                                {!! Form::textarea('description', isset($country) ? $country->description : '', ['class' => 'form-control','placeholder' =>'Nhập vào dữ liệu...','id' =>'description']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Active', 'Active', []) !!}
                                {!! Form::select('status', ['1' =>'Hiển thị','0' =>'Không hiển thị'], isset($country) ? $country->status : '', ['class' => 'form-control']) !!}
                            </div>
                            @if (!isset($country))
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
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Active</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach($list as $key => $cate) 
                        <tr id="{{$cate->id}}">
                            <th scope="row">{{$key}}</th>
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
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['country.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")']]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                <a href="{{route('country.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
@endsection