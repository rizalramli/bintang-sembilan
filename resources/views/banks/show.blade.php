@extends('layouts.app')
@section('title', 'Detail Bank')
@section('content')    
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('banks.show_fields')
                </div>
            </div>
        </div>
 
    <div class="row mb-2">
    <div class="col-sm-6">
        <a class="btn btn-secondary " href="{{ route('banks.index') }}">
            <i data-feather="arrow-left">
            </i>
            Kembali
        </a>
    </div>
</div>
@endsection
