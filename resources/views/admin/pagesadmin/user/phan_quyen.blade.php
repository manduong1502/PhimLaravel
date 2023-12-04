@extends('admin.index')

@section('admin.content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cấp quyền user: {{ $user->username }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => ['insert_quyen', $user->id], 'method' => 'POST']) !!}
                        @if (isset($name_roles))
                            Vai trò hiện tại : {{ $name_roles }}
                        @endif
                        @foreach ($permisstion as $key => $value)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                @foreach ($get_permisstion_via_role as $key => $get)
                                    @if($get->id == $value->id)
                                    checked
                                    @endif
                                @endforeach
                                
                                name="permission[]" multiple
                                    id="{{ $value->id }}" value="{{ $value->name }}">
                                <label class="form-check-label" for="{{ $value->id }}">{{ $value->name }}</label>
                            </div>
                        @endforeach

                        {!! Form::submit('Cấp quyền cho user', ['class' => 'btn btn-success mt-2']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Thêm quyên</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => 'add_permissions', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Tên quyền', []) !!}
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
