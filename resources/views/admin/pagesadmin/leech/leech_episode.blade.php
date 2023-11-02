@extends('admin.index')

@section('admin.content')

    <div class="container mt-5 table-responsive">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-5 table-responsive">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sever embed</th>
                            <th scope="col">Sever m3u8</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Slug phim</th>
                            <th scope="col">Số tập</th>
                            <th scope="col">Tập phim</th>
                            <th scope="col">Quản lý</th>
                            
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resp['episodes'] as $key => $res)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>
                                    @foreach($res['server_data'] as $key => $server1)
                                        <ul>
                                            <li> Tập {{$server1['name']}}
                                                <input type="text" class="form-control" value="{{$server1['link_embed']}}">
                                            </li>
                                            
                                        </ul>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($res['server_data'] as $key => $server2)
                                        <ul>
                                            <li> Tập {{$server2['name']}}
                                                <input type="text" class="form-control" value="{{$server2['link_m3u8']}}">
                                            </li>

                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ $resp['movie']['name'] }}</td>
                                <td>{{ $resp['movie']['slug'] }}</td>
                                <td>{{ $resp['movie']['episode_total'] }}</td>
                                <td>{{ $res['server_name'] }}</td>
                                
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="submit" value="Thêm tập phim" class="btn btn-success">
                                    </form>
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="submit" value="Xóa tập phim" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
