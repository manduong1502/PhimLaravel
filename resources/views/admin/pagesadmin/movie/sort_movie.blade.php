@extends('admin.index')

@section('admin.content')
<style type="text/css">
  .tieude_phim {
    font-weight: bold;
    color: blueviolet;
    font-size: 20px;
    text-transform: uppercase;
  }
</style>
    <div class="container mt-5">
        <div class="row ">
            <div class="">
                <div class="card">
                    <div class="card-header">Sắp xếp film</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{route('pages.trangchu')}}">Trang chủ</a>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                              
                              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <ul class="navbar-nav category_position" id="sortable">
                                  @foreach($category as $key => $cate)
                                  <li id="{{$cate->id}}" class="ui-state-default"><a class="nav-link" href="{{route('category',$cate->slug)}}">{{$cate->title}}</a></li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                          </nav>

                          @foreach($category_home as $key => $cate_home)
                            <p class="tieude_phim">Danh mục: {{$cate_home->title}} </p>
                            <div class="row movie_position sortable_movie" id="">
                              @foreach ($cate_home->movie->sortByDesc('position')->take(10) as $key => $mov)
                              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box_phim" id="{{$mov->id}}">
                                <div class="card" style="width: 18rem;">
                                  @php
                                    $image_check = substr($mov->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $mov->image }}" alt=""
                                        style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @else
                                    <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                                        style="width: 250px; height:330px; border-radius: 5px; position: relative">
                                @endif
                                  <div class="card-body">
                                    {{ $mov->title }}
                                  </div>
                                </div>
                              </div>
                              @endforeach
                            </div>
                          @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
