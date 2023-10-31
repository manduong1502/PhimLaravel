@extends('index')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="dark-bg-image  ">
                <div class="dark-bg-image-2">
                    <img src="{{ asset('uploads/movie/imagebig/' . $movie->image1) }}" alt="...">
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
                <div class="detail-title responsive-text">{{$movie->title}}</div>
                <div class="detail-content-top mt-3 d-flex">
                    <div class="detail-content-top-text">Top 5</div>
                    <div class="detail-content-top-text-1">Top phim thịnh hành</div>
                </div>
                <div class="detail-title-small mt-3 d-flex ">
                  <span>Thể loại: </span>
                  @foreach($movie->movie_genre as $gen)
                    <div class="text-title">{{$gen->title}}</div>
                  @endforeach  
                </div>

                <div class="detail-title-small   mt-3 d-flex ">
                    <div class="text-title-name ">Diễn viên chính: </div>
                    <div class="d-flex">
                        @if($movie->actor!=NULL)
                        @php
                          $actor = array();
                          $actor = explode(',',$movie->actor)   
                        @endphp
                          @foreach($actor as $key => $act)
                            <a href="">{{$act}}</a>
                          @endforeach
                        @endif
                    </div>
                </div>

                <div class="detail-title-small mt-3 row d-flex" style="text-align: left;">
                  <span class="text-title-name col-3 ">Tập mới nhất: </span>
                  <div class=" col-9">
                      @foreach($episode as $key => $epi)
                      <a href="{{route('watch',['slug'=>$epi->movie->slug,'tap-phim'=>$movie_tapdau->episode])}}">Tập {{$epi->episode}}</a>
                      @endforeach
                  </div>
              </div>

                <div class="detail-title-small mt-3 row d-flex" style="text-align: left;">
                    <div class="text-title-name col-2 ">Miêu tả: </div>
                    <div class=" col-10">
                        <p>{{str_limit($movie->description, 50) }}</p>
                    </div>
                </div>

                <div class="detail-title-small mt-2 d-flex" style="text-align: left;">
                    <a href="{{route('watch',['slug' => $movie->slug,'tap-phim'=>$movie_tapdau->episode])}}" class="btn btn-issue"><i class="fa-solid fa-play"></i> Phát ngay</a>
                    <button class="btn btn-share"><i class="fa-solid fa-share"></i> Chia sẽ</button>
                    <button class="btn btn-share"><i class="fa-solid fa-cloud"></i> Sưu tập</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container miscellaneous mt-5">
<div class="row  miscellaneous-content">
  <div class="col-md-8 miscellaneous-content-1 ">
    <div class=" miscellaneous-content-1-header">
      <ul class="d-flex miscellaneous-content-1-header-ul container-fluid custom-list">
        <li><a href="#info1">Trailer</a></li>
        <li><a href="#info2">Đánh giá</a></li>
        <li><a href="#info3">Tin tức</a></li>
      </ul>
      <hr>
    </div>

    <div class="mb-3 container">
      <div id="info1" class="info">
        <iframe width="100%" height="515"src="{{asset('https://www.youtube.com/embed/'. $movie->trailer)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 10px;"></iframe>

      </div>
   

<!-- begin info3-->
      <div id="info2" class="info">
        <div class="container info3-assess-header">
            Bình luận
        </div>
        @php
         $current_url = Request::url();
        @endphp
        <div style="background-color: aliceblue" class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="10"></div>
      </div>
<!-- end info3-->

<!-- begin info4-->
      <div id="info3" class="info">
        <div class="miscellaneous-content-2-block-film container d-flex">
          <div class="miscellaneous-content-2-block-film-img">
            <img src="public/image/image-37.png" height="170px" alt="">
          </div>

          <div class="miscellaneous-content-2-block-film-text">
            <h4>Review Thanh Gươm Trừ Tà - Sự kết hợp thú vị giữa hài và tâm linh</h6>
              <div class="blog-content-information d-flex">
                <p class="blog-content-information-text">Đánh giá phim</p>
                <p class="blog-content-information-text">levu2004</p>
                <p class="blog-content-information-number">14 giờ trước</p>
            </div>
            <p>Thanh Gươm Trừ Tà (Dr. Cheon And The Lost Talisman) đã mang đến những giây phút giải trí vui nhộn cho khán giả.</p>
          </div>
        </div>

        <div class="miscellaneous-content-2-block-film container d-flex">
          <div class="miscellaneous-content-2-block-film-img">
            <img src="public/image/image-37.png" height="170px" alt="">
          </div>

          <div class="miscellaneous-content-2-block-film-text">
            <h4>Review Thanh Gươm Trừ Tà - Sự kết hợp thú vị giữa hài và tâm linh</h6>
              <div class="blog-content-information d-flex">
                <p class="blog-content-information-text">Đánh giá phim</p>
                <p class="blog-content-information-text">levu2004</p>
                <p class="blog-content-information-number">14 giờ trước</p>
            </div>
            <p>Thanh Gươm Trừ Tà (Dr. Cheon And The Lost Talisman) đã mang đến những giây phút giải trí vui nhộn cho khán giả.</p>
          </div>
        </div>

        <div class="miscellaneous-content-2-block-film container d-flex">
          <div class="miscellaneous-content-2-block-film-img">
            <img src="public/image/image-37.png" height="170px" alt="">
          </div>

          <div class="miscellaneous-content-2-block-film-text">
            <h4>Review Thanh Gươm Trừ Tà - Sự kết hợp thú vị giữa hài và tâm linh</h6>
              <div class="blog-content-information d-flex">
                <p class="blog-content-information-text">Đánh giá phim</p>
                <p class="blog-content-information-text">levu2004</p>
                <p class="blog-content-information-number">14 giờ trước</p>
            </div>
            <p>Thanh Gươm Trừ Tà (Dr. Cheon And The Lost Talisman) đã mang đến những giây phút giải trí vui nhộn cho khán giả.</p>
          </div>
        </div>
      </div> 
    </div>
<!-- end info4-->

    
  </div>
  <div class="col-md-4 miscellaneous-content-2">
    <div class="miscellaneous-content-2-block ">
      <div class="miscellaneous-content-2-header">
        Phim liên quan
      </div>
      <hr>
      @foreach ($movie_related as $key =>$mov)
      <a href="{{route('pages.chitiet',$mov->slug)}}" style="text-decoration: none">
      <div class="miscellaneous-content-2-block-film container d-flex">
        <div class="miscellaneous-content-2-block-film-img">
          <img width="70" height="100" src="{{asset('uploads/movie/' . $movie->image)}}" alt="">
        </div>

        <div class="miscellaneous-content-2-block-film-text">
          <h6>{{$movie->title}}</h6>
          <p>Kumarn - Drama, Horror</p>
          <p>Khởi chiếu: 06/10/2023</p>
        </div>
      </div>
      </a>
        @endforeach
      
    </div>
  </div>
</div>

</div>
@endsection



