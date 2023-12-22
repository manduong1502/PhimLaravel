<div style="width:100%;">
    <div style="text-align:center;">
        <h1>Xin chao: {{$customer->name}}</h1>
        <p style="font-size:25px;">Quên mật khẩu </p>
        <p>Để thực hiện đổi mật khẩu vui lòng bạn ấn vào link phía dưới</p>
        <p>
            <a href="{{route('getPass',['customer'=>$customer->id,'token'=>$customer->remember_token])}}" style="display: inline-block; background:green;color: #fff; font-weight:bold;font-size:25px;">Quên mật khẩu</a>
        </p>
    </div>
</div>