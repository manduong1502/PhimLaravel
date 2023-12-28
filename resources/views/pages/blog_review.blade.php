@extends('index')

@section('content')
<div class="blog-review container">
    <div class="row ">
        <div class="col-md-12 blog-review-content">
            <div class="blog-review-content-1 container">
                <h2>{{$blog->title}}</h2>

                <div class="blog-content-information d-flex">
                    <p class="blog-content-information-text">{{$blog->genre->title}}</p>
                    <p class="blog-content-information-text">Đánh giá phim</p>
                    <p class="blog-content-information-text">levu2004</p>
                    <p class="blog-content-information-number">14 giờ trước</p>
                </div>

                {!!$blog->description!!}

            </div>
        </div>
    </div>
  </div>
@endsection