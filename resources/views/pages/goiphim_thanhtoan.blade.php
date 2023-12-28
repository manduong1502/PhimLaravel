@extends('index')
@section('content')
<div class="container text-center">
    <img src="{{asset('/public/image/logo/logopro_trắng.png')}}" class="img-fluid logovip" alt="Cosmic Cinema" height="400">
    <h1>Chọn một gói phù hợp với bạn</h1>
    <h3>Bằng việc đăng ký gói Cosmic Vip, bạn đồng ý với Điều khoản dịch vụ của Cosmic. Lưu ý: Chính sách quyền riêng tư của Cosmic mô tả cách dữ liệu được xử lý trong dịch vụ này.</h3>

    <div class="container">
        <div class="row goiphim">
          <div class="col-md-4">
            <div class="goiphim_detail">
                <div class="tieude">
                    <h4>Cơ bản</h4>
                </div>
                <div class="detail">
                    <div class="price">
                        <p class="gia">70,000đ</p>
                        <p>tháng</p>
                    </div>
                    <div class="quantity">
                        <p class="chatluong">Chất lượng video</p>
                        <p>Tốt</p>
                    </div>
                    <div class="resolution">
                        <p class="phangiai">Độ phân giải</p>
                        <p>720p</p>
                    </div>
                    <div class="device">
                        <p class="thietbi">Thiết bị</p>
                        <div>
                            <p>Điện thoại</p>
                            <p>Máy tính</p>
                        </div>
                    </div>
                </div>
                <div class="pay">
                    <form action="{{route('vnpay_payment')}}" method="POST">
                        @csrf 
                        <input type="hidden" name="amount" value="70000">
                        <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><p>MUA</p></button>
                    </form>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="goiphim_detail">
                <div class="tieude">
                    <h4>Cơ bản</h4>
                </div>
                <div class="detail">
                    <div class="price">
                        <p class="gia">108,000đ</p>
                        <p>tháng</p>
                    </div>
                    <div class="quantity">
                        <p class="chatluong">Chất lượng video</p>
                        <p>Tốt</p>
                    </div>
                    <div class="resolution">
                        <p class="phangiai">Độ phân giải</p>
                        <p>1080p</p>
                    </div>
                    <div class="device">
                        <p class="thietbi">Thiết bị</p>
                        <div>
                            <p>Điện thoại</p>
                            <p>Máy tính</p>
                        </div>
                    </div>
                </div>
                <div class="pay">
                    <form action="{{route('vnpay_payment')}}" method="POST">
                        @csrf 
                        <input type="hidden" name="amount" value="108000">
                        <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><p>MUA</p></button>
                    </form>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="goiphim_detail">
                <div class="tieude">
                    <h4>Cơ bản</h4>
                </div>
                <div class="detail">
                    <div class="price">
                        <p class="gia">220,000đ</p>
                        <p>tháng</p>
                    </div>
                    <div class="quantity">
                        <p class="chatluong">Chất lượng video</p>
                        <p>Tốt</p>
                    </div>
                    <div class="resolution">
                        <p class="phangiai">Độ phân giải</p>
                        <p>4K + HDR</p>
                    </div>
                    <div class="device">
                        <p class="thietbi">Thiết bị</p>
                        <div>
                            <p>Điện thoại</p>
                            <p>Máy tính</p>
                        </div>
                    </div>
                </div>
                <div class="pay">
                    <form action="{{route('vnpay_payment')}}" method="POST">
                        @csrf 
                        <input type="hidden" name="amount" value="220000">
                        <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><p>MUA</p></button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>    
</div>
@endsection