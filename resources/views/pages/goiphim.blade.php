@extends('index')
@section('content')
    <img src="{{ asset('public/image/cảm ơn.png') }}" alt="">
    <div class="buttonhome">
        <a href="{{ route('pages.trangchu') }}" class="btn">Trở về trang chủ</a>
    </div>
@endsection