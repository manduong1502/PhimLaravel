@extends('index')

@section('content')
    <div class="container contents">
        <div class="content-title">
            <div class="content-title-big">
                <h2>ĐỀ XUẤT HOT</h2>
            </div>
        </div>
        <div class="row slider">
            @foreach ($movie_related as $key => $mov)
                <a href="{{ route('pages.chitiet', $mov->slug) }}" style="text-decoration: none;">
                    <div class="slider-card">
                        <div class="card"style="border-radius: 15px; border: 2px solid black">
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
            @endforeach
        </div>
    </div>
    
    <div class="blog-content container">
        <div class="row d-flex" >
            <div class="col-md-7">
                <a href="{{route('blog-view',$blog->slug)}}" style="text-decoration: none; color: white">
                <img src="{{asset('uploads/video/trailer/'.$blog->video)}}" width="100%" alt="">
                <h4>{{$blog->title}}</h4>
                <div class="blog-content-information d-flex">
                    <p class="blog-content-information-text">Đánh giá phim</p>
                    <p class="blog-content-information-text">levu2004</p>
                    <p class="blog-content-information-number">{{$blog->ngay_cap_nhap}}</p>
                </div>
                </a>
            </div>
            <div class="col-md-5">
              @foreach($list_blog->take(4) as $key => $blog)
              <a href="{{route('blog-view',$blog->slug)}}" style="text-decoration: none;">
                <div class="background-blog-content">
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
                <div class="background-blog-content-2-header">
                    <p>Mới cập nhập</p>
                </div>
                <div class="background-blog-content-2">
                    <div class="background-blog-content-2-title container">
                      @foreach($blog_news->take(5) as $key=> $new)
                      <a href="{{route('blog-view',$blog->slug)}}">
                        <div class="blog-content-2-title row d-flex pt-4">
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
                <div class="background-blog-content-2-header mt-4">
                    <p>Xem thêm </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="background-blog-content-2-header">
                    <p>Review</p>
                </div>
                <div class="background-blog-content-2">
                    <div class="background-blog-content-2-title container">

                        @foreach ($review->take(5) as $key => $rev)
                        <div class="blog-content-2-title row d-flex pt-4">
                            <div class="blog-content-2-title-img col-md-3">
                                <img src="{{asset('uploads/video/trailer/'.$new->video)}}" width="90" height="110" alt="">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
