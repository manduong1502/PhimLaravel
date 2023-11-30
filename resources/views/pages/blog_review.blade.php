@extends('index')

@section('content')
<div class="blog-review container">
    <div class="row d-flex">
        <div class="col-md-7">
            <div class="blog-review-content-1">
                <h3>{{$blog->title}}</h3>

                <div class="blog-content-information d-flex">
                    <p class="blog-content-information-text">{{$blog->genre->title}}</p>
                    <p class="blog-content-information-text">Đánh giá phim</p>
                    <p class="blog-content-information-text">levu2004</p>
                    <p class="blog-content-information-number">14 giờ trước</p>
                </div>

                {!!$blog->description!!}

                <div class="blog-review-content-1-booking">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="public/image/image-37.png" width="100" height="130" alt="">
                        </div>
                        <div class="col-md-6 ms-3">
                            <h4>Quỷ ám tín đồ</h4>
                            <p>Thriller, Horror</p>
                            <p>Khởi chiếu 06/10/2023</p>
                        </div>
                        <div class="col-md-3 ">
                            <button class="btn-booking">Đặt vé Ngay</button>
                            <button class="btn-detail">Đặt vé Ngay</button>
                        </div>
                    </div>
                </div>

                <div class="keywords d-flex">
                    <div class="keywords-text">Từ khóa: </div>
                    <div class="keywords-block d-flex">
                        <div class="keywords-block-text">The exorcist</div>
                        <div class="keywords-block-text">The exorcist 2</div>
                        <div class="keywords-block-text">Phim kinh dị</div>
                        <div class="keywords-block-text">Quỷ ám tin đồ</div>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="col-md-5">
            <div class="blog-review-content-2">
                <div class="background-blog-review-content-2-header">
                    Bài viết liên quan
                </div>

                @foreach ($blog_related->take(5) as $val)
                <div class="blog-review-content-2 d-flex p-3">
                    <div class="blog-content-2-title-img pe-3">
                        <img src="{{asset('uploads/video/trailer/'. $val->video)}}" width="100" height="120" alt="">
                    </div>

                    <div class="blog-content-2-title-text">
                        <h6>{{$val->title}}</h6>
                        <div class="blog-content-information d-flex">
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
@endsection