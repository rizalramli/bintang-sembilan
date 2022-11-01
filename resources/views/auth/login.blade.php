@php
$configData = Helper::applClasses();
 

@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

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
                @if($configData['theme'] == 'dark')
                <img class="img-fluid" id="bg-login" src="{{ asset('images/pages/bg2.png') }}" alt="Login V2" />
                @else
                <img class="img-fluid" id="bg-login" src="{{ asset('images/pages/bg1.png') }}" alt="Login V2" />
                @endif
            </div>
        </div>
        <!-- /Left Text-->



        <!-- Login-->
        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">

            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <div class="float-end"><a   class="btn btn-icon btn-icon rounded-circle btn-flat-primary nav-link-style" id="weather">
                            <i class="ficon" data-feather="{{ $configData['theme'] === 'dark' ? 'sun' : 'moon' }}"></i>
                    </a>
                </div>

                <h2 class="card-title fw-bold mb-1">Selamat Datang di Rumah Kumbang!  </h2>
                <p class="card-text mb-2">Silakan masuk ke akun Anda dan mulai menjelajahi</p>

                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{--  <h4 class="alert-heading">Danger</h4>  --}}
                        <div class="alert-body">
                            {{ session()->get('error') }}
                        </div>
                    </div>
                @endif

                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-1">
                        {!! Form::label('email', 'Email', ['class' => "form-label"]) !!}
                        @php $is_invalid = ''; $errors->has('email') ? $is_invalid = 'is-invalid' : ''; @endphp
                        {!! Form::text('email', null, ['class' => "form-control $is_invalid" ,'tabindex'=>'1']) !!}
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            {!! Form::label('password', 'Password', ['class' => "form-label"]) !!}
                            <a href="{{ route('password.request') }}">
                                <small>Lupa Password?</small>
                            </a>
                        </div>
                        @php $is_invalid = ''; $errors->has('password') ? $is_invalid = 'is-invalid' : ''; @endphp
                        <div class="input-group input-group-merge form-password-toggle {{ $is_invalid }}">
                            {!! Form::password('password', ['class'=>"form-control form-control-merge $is_invalid", 'placeholder'=>"....." ,'tabindex'=>'2']) !!}
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <input class="form-check-input" id="remember" name="remember" type="checkbox" tabindex="4"/>
                            {!! Form::label('remember', 'Remember Me', ['class' => "form-check-label"]) !!}
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" tabindex="3">Masuk</button>

                   

                </form>

                {{--  <p class="text-center mt-2">
                    <span>Tidak punya akun?</span>
                    <a href="{{ url('auth/register-cover') }}"><span>&nbsp;Daftar sekarang</span></a>
                </p>
                <div class="divider my-2">
                    <div class="divider-text">atau</div>
                </div>
                <div class="auth-footer-btn d-flex justify-content-center">
                    <a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a>
                    <a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a>
                    <a class="btn btn-google" href="#"><i data-feather="mail"></i></a>
                    <a class="btn btn-github" href="#"><i data-feather="github"></i></a>
                </div>  --}}
            </div>
        </div>
        <!-- /Login-->
    </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/pages/auth-login.js')) }}"></script>
<script type="text/javascript">
    $("#weather").click(function() {
         var data = $(this).find('svg').attr("class");
         if(data=="feather feather-moon ficon")
         { 
            $("#bg-login").attr('src','{{ asset('images/pages/bg1.png') }}');
         }else{ 
             $("#bg-login").attr('src','{{ asset('images/pages/bg2.png') }}');
         }
 
    });
</script>
@endsection