@extends('index')

@section('content')
    <div class="container thong-tin-user " style="margin-top: 150px">
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('public/image/image-13.png') }}" width="250" height="300" alt="">
            </div>
            <div class="col-9">
                <div class="col-md-12">
                        <div class="card-header mb-3" style="font-size: 30px">Thông tin người dùng</div>
    
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {!! Form::open(['route' => ['thongtin_post', $user->id], 'method' => 'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('title', 'Tên người dùng', []) !!}
                                {!! Form::text('username', isset($user) ? $user->username : '', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nhập vào dữ liệu...',
                                ]) !!}
                                @if ($errors->has('title'))
                                    <span class="errors-message">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                {!! Form::label('title', 'email', []) !!}
                                {!! Form::text('email', isset($user) ? $user->email : '', [
                                    'id' => 'disabledTextInput',
                                    'class' => 'form-control',
                                    'placeholder' => 'Disabled input',
                                    'readonly' => 'readonly',
                                ]) !!}
                                @if ($errors->has('title'))
                                    <span class="errors-message">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                {!! Form::label('password', 'Mật khẩu', []) !!}
                                <div class="input-group">
                                    {!! Form::text('password', isset($user) ? $user->password : '', [
                                        'id' => 'passwordInput',
                                        'class' => 'form-control',
                                        'placeholder' => 'Nhập vào dữ liệu...',
                                    ]) !!}
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="showPasswordButton">Hiện</button>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="errors-message">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            
                            @if (!isset($user))
                                {!! Form::submit('Thêm dữ liêu', ['class' => 'btn btn-success mt-2']) !!}
                            @else
                                {!! Form::submit('Cập Nhập', ['class' => 'btn btn-success mt-2']) !!}
                            @endif
    
                            {!! Form::close() !!}
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
