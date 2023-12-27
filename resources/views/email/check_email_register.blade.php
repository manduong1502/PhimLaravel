<div style="width:100%;">
    <div style="text-align:center;">
        <h1>Xin chao: {{$customer->name}}</h1>
        <p style="font-size:25px;">Kích hoạt tài khoản </p>
        <p>Để thực hiện Kích hoạt tài khoản  vui lòng bạn ấn vào link phía dưới</p>
        <p>
            <a href="{{route('getPassRegister',['customer'=>$customer->id,'token'=>$customer->remember_token])}}" style="display: inline-block; background:green;color: #fff; font-weight:bold;font-size:25px;">Kích hoạt tài khoản</a>
        </p>
    </div>
</div>