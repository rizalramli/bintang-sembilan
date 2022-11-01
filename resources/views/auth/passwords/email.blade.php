@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Forgot Password')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-cover">
    <div class="auth-inner row m-0">
        <!-- Brand logo-->
        <a class="brand-logo" href="#">
            <img src="{{ asset('images/logo/logo.svg') }}" width="100px" />
        </a>
        <!-- /Brand logo-->

        <!-- Left Text-->
        <div class="d-none d-lg-flex col-lg-8 align-items-end p-0">
            <div class="d-lg-flex align-items-center justify-content-center">
                @if($configData['theme'] === 'dark')
                <img class="img-fluid" src="{{ asset('images/pages/login-v2-dark.svg') }}" alt="Login V2" />
                @else
                <img class="img-fluid" src="{{ asset('images/pages/bg-1.png') }}" alt="Login V2" />
                @endif
            </div>
        </div>
        <!-- /Left Text-->

        <!-- Forgot password-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Lupa Password? 🔒</h2>
                <p class="card-text mb-2">Masukkan email Anda dan kami akan mengirimkan instruksi untuk mereset kata sandi Anda</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" aria-describedby="email" autofocus="" tabindex="1" value="{{ old('email') }}" autocomplete="email"/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100" tabindex="2">Kirim tautan reset password</button>
                </form>
                <p class="text-center mt-2">
                    <a href="{{ route('login') }}">
                        <i data-feather="chevron-left"></i> Kembali ke login
                    </a>
                </p>
            </div>
        </div>
        <!-- /Forgot password-->
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-forgot-password.js')) }}"></script>
@endsection