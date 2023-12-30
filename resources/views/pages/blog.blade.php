@extends('index')

@section('content')
    <div class="container contents">
        <div class="content-title d-flex">
            <div class="content-title-big">
                <h2 style="font-size: 30px;color:#000"><i class="fa-solid fa-play" style="margin-right: 20px; color:#A41717;"></i>Đề xuất <span style="font-size: 35px;">mov</span></h2>
            </div>
            <div class="divider"></div>

        </div>
        <div class="row slider">
            {{-- @foreach ($movie_related as $key => $mov)
                <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none;">
                    <div class="slider-card">
                        <div class="card cards"style="border-radius: 15px; border: 2px solid black">
                            @php
                                $image_check = substr($mov->image1, 0, 5);
                            @endphp
                            @if ($image_check == 'https')
                                <img src="{{ $mov->image }}" alt="" style="height: 300px;border-radius: 10px;">
                            @else
                                <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt="" style="height: 300px;border-radius: 10px;">
                            @endif
                            <div class="icon-overlay">
                                <i class="fa-solid fa-circle-play"></i>
                            </div>
                        </div>

                        <div class="card-text" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.42), #151515); left:0.5px; border-radius: 0 0 14px 14px;">
                            <p>{{ $mov->title }}</p>
                        </div>
                    </div>
                </a>
            @endforeach --}}
            @foreach ($movie_related as $key => $mov)
                    <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none;">
                        <div class="slider-card" style="width: 180px;">
                            <div class="card cards">
                                @php
                                    $image_check = substr($mov->image, 0, 5);
                                @endphp
                                @if ($image_check == 'https')
                                    <img src="{{ $mov->image }}" alt="" style="width: 100%; height: 265px">
                                    
                                @else
                                    <img src="{{ asset('uploads/movie/' . $mov->image) }}" alt=""
                                        style="width: 100%; height: 265px">
                                @endif
                                <div class="icon-overlay">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                                <span class="episode" aria-hidden="true"  >
                                    @if($mov->episode_count == $mov->so_tap)
                                        <span>Hoàn thành</span>
                                    @else
                                    {{$mov->episode_count}}/{{ $mov->so_tap }}
                                    @endif
                                </span>
                            </div>

                            <div class="card-text" style="position: relative; z-index: 99; top: -10px">
                                <p>{{ $mov->title }}</p>
                    
                            </div>
                        </div>
                    </a>
                @endforeach
        </div>
    </div>
    
    <div class="blog-content container">
        <div class="row d-flex" >
            <div class="col-md-7 blog-content-left">
                <a href="{{route('blog-view',$blog->slug)}}" style="text-decoration: none; color: white; margin-top: 20px">
                <img src="{{asset('uploads/video/trailer/'.$blog->video)}}" width="100%" height="400" alt=""  style="margin-top: 20px;border-radius: 40px;">
                <div style="margin-left: 10px; padding: 10px">
                    <h2>{{$blog->title}}</h2>
                    <div class="blog-content-information d-flex">
                    <p class="blog-content-information-text">Đánh giá phim</p>
                    <p class="blog-content-information-text">levu2004</p>
                    <p class="blog-content-information-number">{{$blog->ngay_cap_nhap}}</p>
                </div>
                </div>
                
                </a>
            </div>
            <div class="col-md-5">
              @foreach($list_blog->take(4) as $key => $blog)
              <a href="{{route('blog-view',$blog->slug)}}" style="text-decoration: none; background-color: #2C2C2C;">
                <div class="background-blog-content" style="text-decoration: none; color: #fff">
                    <h5>{{$blog->title}}</h5>
                    <div class="blog-content-information d-flex">
                        <p class="blog-content-information-text">Đánh giá phim</p>
                        <p class="blog-content-information-text">levu2004</p>
                        <p class="blog-content-information-number">14 giờ trước</p>
                    </div>
                </div>
            </a>
              @endforeach
            </div>
        </div>
    </div>

    <div class="blog-content container">
        <div class="row d-flex">
            <div class="col-md-7"> 
                <div class="background-blog-content-2-header" style="border-radius: 15px 15px 0 0">
                    <p>Mới cập nhập</p>
                </div>
                <div class="background-blog-content-2"style="border-radius: 0 0 15px 15px">
                    <div class="background-blog-content-2-title container">
                      @foreach($blog_news->take(5) as $key=> $new)
                      <a href="{{route('blog-view',$blog->slug)}}" style="text-decoration: none; color: white;">
                        <div class="blog-content-2-title row d-flex pb-3">
                            <div class="blog-content-2-title-img col-md-3">
                                <img src="{{asset('uploads/video/trailer/'.$new->video)}}" width="120" height="140" alt="">
                            </div>
                            <div class="blog-content-2-title-text col-md-9">
                                <h5>{{$new->title}}</h5>
                                <div class="blog-content-information d-flex">
                                    <p class="blog-content-information-text">Đánh giá phim</p>
                                    <p class="blog-content-information-text">levu2004</p>
                                    <p class="blog-content-information-number">{{$blog->ngay_cap_nhap}}</p>
                                </div>
                                <p>Phim kinh dị gây ám ảnh nhất mọi thời đại đã trở lại với phần tiếp theo Quỷ Ám Tín Đồ
                                    (The Exorcist: Believer).</p>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="background-blog-content-2-header" style="border-radius: 15px 15px 0 0">
                    <p>Review</p>
                </div>
                <div class="background-blog-content-2" style="border-radius: 0 0 15px 15px">
                    <div class="background-blog-content-2-title container">

                        @foreach ($review->take(5) as $key => $rev)
                        <a href="{{route('blog-view',$blog->slug)}}" style="text-decoration: none; color: white">
                        <div class="blog-content-2-title row d-flex pt-4">
                            <div class="blog-content-2-title-img col-md-3">
                                <img src="{{asset('uploads/video/trailer/'.$new->video)}}" width="110" height="110" alt="" style="margin-bottom: 20px; padding: 0;">
                            </div>
                            <div class="blog-content-2-title-text col-md-9">
                                <h5>{{$rev->title}}</h5>
                                <div class="blog-content-information d-flex">
                                    <p class="blog-content-information-text">Đánh giá phim</p>
                                    <p class="blog-content-information-text">levu2004</p>
                                    <p class="blog-content-information-number">14 giờ trước</p>
                                </div>
                            </div>
                        </div>
                    </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
