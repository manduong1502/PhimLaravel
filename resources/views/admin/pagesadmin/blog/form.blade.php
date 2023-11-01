@extends('admin.index')

@section('admin.content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
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