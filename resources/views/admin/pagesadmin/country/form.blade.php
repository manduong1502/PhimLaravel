@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên quốc gia</th>
                            <th scope="col">Đường link</th>
                            <th scope="col">Hiển thị</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $cate)
                            <tr id="{{ $cate->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->slug }}</td>
                                <td>
                                    @if ($cate->status == 1)
                                        <span class="badge badge-success">Hiển thị</span>
                                    @else
                                        <span class="badge badge-danger">Không hiển thị</span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['country.destroy', $cate->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('country.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
