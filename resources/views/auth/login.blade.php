@extends('layouts/fullLayoutMaster')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@php
$company = \Modules\Master\Models\Company::find(1);
@endphp

@section('content')
<div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
        <!-- Login basic -->
        <div class="card mb-0">
            <div class="card-body">
                <a href="#" class="brand-logo">
                    <img height="50" width="50" class="img-thumbnail" src="{{ asset('images/logo/' . $company->logo) }}" />
                    <h2 class="brand-text text-primary ms-1 mt-1">{{$company->name}}</h2>
                </a>

                <h4 class="card-title mb-1">Selamat Datang! 👋</h4>
                <p class="card-text mb-2">Silakan masukan email & password untuk masuk ke akun anda</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="login-email" class="form-label">Email</label>
                        <input id="login-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="login-password">Password</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" tabindex="4">Masuk</button>
                </form>

                <p class="text-center mt-2">
                </p>
            </div>
        </div>
        <!-- /Login basic -->
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection