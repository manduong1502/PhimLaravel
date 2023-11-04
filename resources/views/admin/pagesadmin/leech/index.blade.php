@extends('admin.index')

@section('admin.content')
<!-- Modal -->
<div class="modal " id="chitietphim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="content-title"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <span id="content-detail"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table mt-4 table-success table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Tên phim chính thức</th>
                            <th scope="col">Hình ảnh phim</th>
                            <th scope="col">Hình ảnh poster</th>
                            <th scope="col">Slug</th>
                            <th scope="col">_id</th>
                            <th scope="col">Year</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resp['items'] as $key => $res)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $res['name'] }}</td>
                                <td>{{ $res['origin_name'] }}</td>
                                <td><img src="{{ $resp['pathImage'].$res['thumb_url'] }}" height="80" width="80" alt=""></td>
                                <td><img src="{{ $resp['pathImage'].$res['poster_url'] }}" height="80" width="80" alt=""></td>
                                <td>{{ $res['slug'] }}</td>
                                <td>{{ $res['_id'] }}</td>
                                <td>{{ $res['year'] }}</td>
                                <td>

                                    {{-- <button type="button" data-movie_slug="{{$res['slug']}}" class="btn btn-primary btn-sm leech_details" data-bs-toggle="modal" data-bs-target="#chitietphim">
                                        Chi tiết phim
                                      </button> --}}
                                    <a href="{{route('leech-detaiil',$res['slug'])}}" class="btn btn-primary">Chi tiết phim</a>
                                    <a href="{{route('leech_episode',$res['slug'])}}" class="btn btn-secondary">Xem số tập phim</a>
                                    @php
                                        $movie = App\Models\Movie::where('slug',$res['slug'])->first();
                                    @endphp
                                    
                                    @if (!$movie)
                                    <form action="{{route('leech-store',$res['slug'])}}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-success" value="Add phim">
                                    </form>
                                    @else
                                    <form action="{{route('movie.destroy',$movie->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Xóa phim">
                                    </form>
                                    @endif
                                    
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
