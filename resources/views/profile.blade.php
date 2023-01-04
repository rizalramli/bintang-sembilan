@extends('layouts.app')
@section('title', 'Profile')
@include('layouts.library.style')
@section('content')

<div class="row">
<div class="col-12">
  @include('flash::message')
</div>
</div>

<div class="card">

{!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'patch']) !!}

<div class="card-body">
    <h3>Biodata</h3>
    <div class="row">
        <div class="form-group col-sm-6 mb-1">
            {!! Form::label('name', 'Nama') !!}
            {!! Form::text('name', null, ['class' => "form-control",'maxlength' => 125,'maxlength' => 125,'readonly']) !!}
        </div>
        <div class="form-group col-sm-6 mb-1">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => "form-control",'maxlength' => 125,'maxlength' => 125,'readonly']) !!}
        </div>
    </div>
</div>

<div class="card-body">
    <h3>Ganti Password</h3>
    <div class="row">
        <!-- old -->
        <div class="form-group col-sm-4 mb-1">
            @php $is_invalid = ''; $errors->has('old_password') ? $is_invalid = 'is-invalid' : ''; @endphp
            {!! Form::label('old_password', 'Password Lama') !!}
            <input type="password" name="old_password" class="form-control {{$is_invalid}}" id="old_password" maxlength="125" maxlength="125">
            @error('old_password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!-- new -->
        <div class="form-group col-sm-4 mb-1">
            @php $is_invalid = ''; $errors->has('password') ? $is_invalid = 'is-invalid' : ''; @endphp
            {!! Form::label('password', 'Password Baru') !!}
            <input type="password" name="password" class="form-control {{$is_invalid}}" id="password" maxlength="125" maxlength="125">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!-- confirm -->
        <div class="form-group col-sm-4 mb-1">
            @php $is_invalid = ''; $errors->has('password_confirmation') ? $is_invalid = 'is-invalid' : ''; @endphp
            {!! Form::label('password_confirmation', 'Konfirmasi Password Baru') !!}
            <input type="password" name="password_confirmation" class="form-control {{$is_invalid}}" id="password_confirmation" maxlength="125" maxlength="125">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

</div>
@endsection