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
                            <th scope="col">_id</th>
                            <th scope="col">name</th>
                            <th scope="col">slug</th>
                            <th scope="col">origin_name</th>
                            <th scope="col">content</th>
                            <th scope="col">type</th>
                            <th scope="col">status</th>
                            <th scope="col">thumb_url</th>
                            <th scope="col">poster_url</th>
                            <th scope="col">is_copyright</th>
                            <th scope="col">sub_docquyen</th>
                            <th scope="col">chieurap</th>
                            <th scope="col">trailer_url</th>
                            <th scope="col">time</th>
                            <th scope="col">episode_current</th>
                            <th scope="col">episode_total</th>
                            <th scope="col">quality</th>
                            <th scope="col">lang</th>
                            <th scope="col">notify  </th>
                            <th scope="col">showtimes</th>
                            <th scope="col">year</th>
                            <th scope="col">view</th>
                             <th scope="col">actor</th>
                            <th scope="col">director</th>
                            <th scope="col">category</th>
                            
                            <th scope="col">country</th>
                            {{--
                            <th scope="col">episodes</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resp_movie as $key => $res)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $res['_id'] }}</td>
                                <td>{{ $res['name'] }}</td>
                                <td>{{ $res['slug'] }}</td>
                                <td>{{ $res['origin_name'] }}</td>
                                <td>{{ $res['content'] }}</td>
                                <td>{{ $res['type'] }}</td>
                                <td>{{ $res['status'] }}</td>
                                <td><img src="{{$res['thumb_url']}}" height="80" width="80" alt=""></td>
                                <td><img src="{{$res['poster_url']}}" height="80" width="80" alt=""></td>
                                <td>
                                    @if ($res['is_copyright'] ==true)
                                    <span class="badge bg-success">True</span>
                                    @else
                                    <span class="badge bg-danger">false</span> 
                                    @endif  
                                </td>
                                <td>
                                    @if ($res['sub_docquyen'] ==true)
                                    <span class="badge bg-success">True</span>
                                    @else
                                    <span class="badge bg-danger">false</span> 
                                    @endif  
                                </td>
                                <td>
                                    @if ($res['chieurap'] ==true)
                                    <span class="badge bg-success">True</span>
                                    @else
                                    <span class="badge bg-danger">false</span> 
                                    @endif 
                                </td>
                                <td><iframe width="560" height="315" src="{{ $res['trailer_url'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
                                <td>{{ $res['time'] }}</td>
                                <td>{{ $res['episode_current'] }}</td>
                                <td>{{ $res['episode_total'] }}</td>
                                <td>{{ $res['quality'] }}</td>
                                <td>{{ $res['lang'] }}</td>
                                <td>{{ $res['notify'] }}</td>
                                <td>{{ $res['showtimes'] }}</td>
                                <td>{{ $res['year'] }}</td>
                                <td>{{ $res['view'] }}</td>
                                <td>
                                    @foreach($res['actor'] as $actor)
                                    <span class="badge bg-info">{{$actor}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($res['director'] as $director)
                                    <span class="badge bg-info">{{$director}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($res['category'] as $category)
                                    <span class="badge bg-info">{{$category['name']}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($res['country'] as $country)
                                    <span class="badge bg-info">{{$country['name']}}</span>
                                    @endforeach
                                </td>
                                {{-- <td>
                                    @foreach($res['episodes'] as $episodes)
                                    <span class="badge bg-info">{{$episodes['server_name']}}</span>
                                    @endforeach
                                </td> --}}
                                {{--<td>{{ $res['director'] }}</td>
                                <td>{{ $res['category'] }}</td>
                                <td>{{ $res['country'] }}</td>
                                <td>{{ $res['episodes'] }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
