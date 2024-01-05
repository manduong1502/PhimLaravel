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
                        <button class="col-4 content-btn" id="btn1" onclick="showContent(1)">
                            <p>Cơ bản</p>
                            <p>Gói gia hạn tháng</p>
                            <h5>19,000đ</h5>
                            <p><del>49,000đ</del></p>
                            <input type="hidden" name="vnp_Amount" id="vnp_Amount_input" value="49,0000" />
                        </button>
                        <button class="col-4 content-btn" id="btn2" onclick="showContent(2)">
                            <p>Cơ bản</p>
                            <p>Gói gia hạn tháng</p>
                            <h5>29,000đ</h5>
                            <p><del>49,000đ</del></p>
                        </button>
                        <button class="col-4 content-btn" id="btn3" onclick="showContent(3)">
                            <p>Cơ bản</p>
                            <p>Gói gia hạn tháng</p>
                            <h5>39,000đ</h5>
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
                            <form action="{{route('vnpay_payment')}}" method="POST">
                                @csrf 
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showContent(contentNumber, btnId) {
    var contents = document.getElementsByClassName("detail_goi");
    for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = 'none';
    }

    var contentToShow = document.getElementById("content" + contentNumber);
    contentToShow.style.display = 'block';

    //đổi màu button
    const buttons = document.querySelectorAll('.content-btn');

    // Lặp qua từng button để xử lý
    buttons.forEach(button => {
        // Kiểm tra nếu button được bấm trùng với ID được truyền vào
        if (button.id === `btn${btnId}`) {
            button.classList.add('active'); // Thêm class 'active' để thay đổi màu sắc
        } else {
            button.classList.remove('active'); // Loại bỏ class 'active' của các button khác
        }
    });
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
    document.getElementById('vnp_Amount_input').value = "39000"; // Cập nhật giá trị cho vnp_Amount_input
    document.getElementById('submitButton').click(); // Tự động gửi form khi nút được nhấn
});

</script>
@endsection