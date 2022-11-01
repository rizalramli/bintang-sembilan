@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Reset Password')

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

        <!-- Reset password-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Setel Ulang Kata Sandi 🔒</h2>
                <p class="card-text mb-2">Kata sandi baru Anda harus berbeda dari kata sandi yang digunakan sebelumnya</p>
                <form class="auth-reset-password-form mt-2" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-1">
                        {!! Form::label('email', 'Email', ['class' => "form-label"]) !!}
                        @php $is_invalid = ''; $errors->has('email') ? $is_invalid = 'is-invalid' : ''; @endphp
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            {!! Form::label('password', 'Password Baru', ['class' => "form-label"]) !!}
                        </div>
                        @php $is_invalid = ''; $errors->has('password') ? $is_invalid = 'is-invalid' : ''; @endphp
                        <div class="input-group input-group-merge form-password-toggle {{ $is_invalid }}">
                            {!! Form::password('password', ['class'=>"form-control form-control-merge $is_invalid", 'placeholder'=>"············"]) !!}
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class' => "form-label"]) !!}
                        </div>
                        @php $is_invalid = ''; $errors->has('password_confirmation') ? $is_invalid = 'is-invalid' : ''; @endphp
                        <div class="input-group input-group-merge form-password-toggle {{ $is_invalid }}">
                            {!! Form::password('password_confirmation', ['class'=>"form-control form-control-merge $is_invalid", 'placeholder'=>"············"]) !!}
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100" tabindex="3">Setel Kata Sandi Baru</button>
                </form>
                <p class="text-center mt-2">
                    <a href="{{ route('login') }}">
                        <i data-feather="chevron-left"></i> Kembali ke login
                    </a>
                </p>
            </div>
        </div>
        <!-- /Reset password-->
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/pages/auth-reset-password.js')) }}"></script>
@endsection