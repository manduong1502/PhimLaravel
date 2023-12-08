@extends('admin.index')

@section('admin.content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cấp vai trò user: {{$user->username}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            {!! Form::open(['route' => ['insert_roles', $user->id], 'method' => 'POST']) !!}
                            

                            <div class="form-group">
                                @foreach ($role as $key => $value)
                            @if(isset($role_all))
                                <input class="form-check-input" {{$value->id == $role_all->id ? 'checked' : ''}}  type="radio" name="role" id ="{{$value->id}}" value = {{$value->name}}>
                                <label class="form-check-label" for="{{$value->id}}">{{$value->name}}</label>
                                @else 

                                <input class="form-check-input"   type="radio" name="role" id ="{{$value->id}}" value = {{$value->name}}>
                                <label class="form-check-label" for="{{$value->id}}">{{$value->name}}</label>
                            @endif
                            @endforeach
                            </div>
                        
                            {!! Form::submit('Cấp vai trò cho user', ['class' => 'btn btn-success mt-2']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Thêm vai trò</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => 'add_roles', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Tên vai trò', []) !!}
                            {!! Form::text('name','', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                            ]) !!}
                        </div>

                        {!! Form::submit('Thêm quyền', ['class' => 'btn btn-success mt-2']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection