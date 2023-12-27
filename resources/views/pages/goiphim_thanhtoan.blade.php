@extends('index')
@section('content')
<div class="muagoiphim container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="user d-flex text-black">
                        <div>
                            <img src="public/image/image-13.png" alt="">
                        </div>
                        <div>
                            <p>USER</p>
                            <p style="color: #febf83;">Đăng kí vip để tận hưởng kho phim</p>
                        </div>
                    </div>
                    <div>
                        <button><p>nạp tiền số ngày vip</p></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="goiphim d-flex justify-content-around">
                        <button class="col-4 content-btn" id="btn1" data-price="19000" onclick="showContent(1)">
                            <p>Cơ bản</p>
                            <p>Gói gia hạn tháng</p>
                            <h5>19000</h5>
                            <p><del>49,000đ</del></p>
                            <input type="hidden" name="vnp_Amount" id="vnp_Amount_input" value="49,0000" />
                        </button>
                        <button class="col-4 content-btn" id="btn2" data-price="29000" onclick="showContent(2)">
                            <p>Cơ bản</p>
                            <p>Gói gia hạn tháng</p>
                            <h5>29000</h5>
                            <p><del>49,000đ</del></p>
                        </button>
                        <button class="col-4 content-btn" id="btn3" data-price="39000" onclick="showContent(3)">
                            <p>Cơ bản</p>
                            <p>Gói gia hạn tháng</p>
                            <h5>39000</h5>
                            <p><del>49,000đ</del></p>
                        </button>
                    </div>
                    <div class="detail">
                        <h4>Quyền lợi thành viên</h4>
                        <div id="content1" class="detail_goi">
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>720p</p>
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>phim bom tấn</p>
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>tải xuống nội dung thành viên</p>
                        </div>
                        <div id="content2" class="detail_goi" style="display: none;">
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>1080p</p>
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>phim chiếu rạp</p>
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>tải xuống nội dung thành viên</p>
                        </div>
                        <div id="content3" class="detail_goi" style="display: none;">
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>4k</p>
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>phim bản quyền</p>
                            <p><i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>tải xuống nội dung thành viên</p>
                        </div>
                    </div>
                    <div class="phuongthuc d-block">
                        <h4>Phương thức thanh toán</h4>
                        <div class="d-flex">
                            <button class="d-flex">
                                <i class="fa-regular fa-credit-card fa-xl" style="color: #000000;"></i>
                                <div>
                                    <p>Thẻ ngân hàng</p>
                                    <h6>MasterCard, Visa, JCB</h6>
                                </div>
                            </button>
                            {{-- <button class="d-flex">
                                <img src="{{ asset('public/image/logo/vnpay.png') }}" alt="" style="width: 27px">
                                <a class="btn btn-default phuongthuc" name="redirect" href="{{ url('/vnpay_payment') }}" style="margin: 0">Thanh toán VNPAY</a>
                            </button> --}}
                            <form action="{{route('momo_payment')}}" method="post">
                                <button class="btn btn-default phuongthuc" name="payUrl" type="submit" style="margin: 0"><img src="{{ asset('public/image/logo/vnpay.png') }}" alt="" style="width: 27px">Thanh toán Momo</button>
                            </form>
                            <form action="{{route('vnpay_payment')}}" method="POST">
                                @csrf 
                                <input type="text" name="amount" style="display: none">
                                <button class="btn btn-default phuongthuc" name="redirect" type="submit" style="margin: 0"><img src="{{ asset('public/image/logo/vnpay.png') }}" alt="" style="width: 27px">Thanh toán VNPAY</button>
                            </form>
                        </div>
                        <div class="thetindung container py-5">
                            <h2 class="text-center mb-4">Vui lòng nhập thông tin thẻ tín dụng của bạn</h2>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <form>
                                        <div class="mb-3">
                                            <label for="creditCardNumber" class="form-label">Số thẻ tín dụng</label>
                                            <input type="text" class="form-control" id="creditCardNumber" placeholder="Hãy nhập số thẻ tín dụng của bạn">
                                        </div>
                                        <div class="mb-3">
                                            <label for="expirationDate" class="form-label">Hạn sử dụng thẻ</label>
                                            <input type="text" class="form-control" id="expirationDate" placeholder="MM/YY">
                                        </div>
                                        <div class="mb-3">
                                            <label for="securityCode" class="form-label">Mã bảo mật</label>
                                            <input type="text" class="form-control" id="securityCode" placeholder="XXX">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tickButton">
                        <label class="form-check-label" for="tickButton">
                            <p>tôi đồng ý với <span>Thỏa thuận dịch vụ CosmicVip</span></p>
                        </label>
                    </div>
                    <div class="thanhtoan">
                        <div class="gia"><div id="gia"></div></div>
                        <div class="gianhap"><button>Gia nhập Cosmic Vip</button></div>
                    </div>
                    {{-- nháp --}}
                    <div style="width: 200px;
                    height: 100px;
                    background-color: lightblue;
                    border-bottom-left-radius:30%;
                    border-bottom-right-radius: 150%;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showContent(contentNumber) {
    var contents = document.getElementsByClassName("detail_goi");
    for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = 'none';
    }

    var contentToShow = document.getElementById("content" + contentNumber);
    contentToShow.style.display = 'block';

    var buttons = document.querySelectorAll('.content-btn');

    buttons.forEach(button => {
        button.classList.remove('active');
        button.style.backgroundColor = ""; // reset color of all buttons
    });

    var clickedButton = document.getElementById("btn" + contentNumber);
    clickedButton.classList.add('active');
    clickedButton.style.backgroundColor = "#fcf2e6"; // change color of clicked button

    var price = clickedButton.getAttribute('data-price');
    var amountInput = document.querySelector('input[name="amount"]');
    if (amountInput) {
        amountInput.value = price;
    } else {
        console.error('Input not found');
    }
}






    
    //hiển thị giá ở dưới
    const contentDiv = document.getElementById('gia');
    contentDiv.textContent = "19,000đ";

    // Lấy các button
    const btn1 = document.getElementById('btn1');
    const btn2 = document.getElementById('btn2');
    const btn3 = document.getElementById('btn3');

    // Gán sự kiện click cho từng button
    btn1.addEventListener('click', function() {
    contentDiv.textContent = "19,000đ";
    document.getElementById('vnp_Amount_input').value = "19000"; // Cập nhật giá trị cho vnp_Amount_input
    document.getElementById('submitButton').click(); // Tự động gửi form khi nút được nhấn
});

btn2.addEventListener('click', function() {
    contentDiv.textContent = "29,000đ";
    document.getElementById('vnp_Amount_input').value = "29000"; // Cập nhật giá trị cho vnp_Amount_input
    document.getElementById('submitButton').click(); // Tự động gửi form khi nút được nhấn
});

btn3.addEventListener('click', function() {
    contentDiv.textContent = "39,000đ";
    btn3.classList.add('clicked');
    });
</script>
@endsection