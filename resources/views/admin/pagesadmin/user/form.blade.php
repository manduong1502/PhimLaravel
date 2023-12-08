@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên </th>
                            <th scope="col">Email</th>
                            <th scope="col">Vai trò(Role)</th>
                            <th scope="col">Quyền(Permisson)</th>
                            <th scope="col">Quản lý</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($users as $key => $u)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    @foreach ($u->roles as $key => $role)
                                        {{$role->name}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($role->permissions as $key =>$permission)
                                        <h6 > <span class="badge badge-danger">{{$permission->name}}</span></h6>
                                        
                                    @endforeach
                                </td>
                                

                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('phan_vaitro',$u->id)}}">Phân vai trò</a>
                                    <a class="btn btn-sm btn-warning" href="{{route('phan_quyen',$u->id)}}">Phân quyền</a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['user.destroy', $u->id, 'onsubmit' => 'return confirm("Bạn có muốn xóa hay ko?")'],
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
