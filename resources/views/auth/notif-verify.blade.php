@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                {{--  <div class="col-lg-5 d-none d-lg-block">
                    <img width="285" height="400" src="{{ url('stisla/img/logo.png') }}" alt="">
                </div>  --}}
                <div class="col-lg-12">
                    <div class="card-header">
                        <h4>Verifikasi Akun HRIS</h4>
                    </div>
                    <div class="card-body">
                        @include('flash::message')
                    </div>
                </div>
            </div>

        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
</div>
<!-- end row -->
@endsection
