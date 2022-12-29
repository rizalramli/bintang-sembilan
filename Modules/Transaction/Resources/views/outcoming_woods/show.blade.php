@extends('layouts.app')
@section('title', 'Detail Kayu Keluar')
@include('layouts.library.style')
@section('content')    
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('transaction::outcoming_woods.fields')
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    @include('transaction::outcoming_woods.fields.table_detail')
                </div>
            </div>
        </div>
 
    <div class="row mb-2">
    <div class="col-sm-6">
        <a class="btn btn-secondary " href="{{ route('outcomingWoods.index') }}">
            <i data-feather="arrow-left">
            </i>
            Kembali
        </a>
    </div>
</div>
@endsection
@include('transaction::outcoming_woods.fields.fields_js')
@include('layouts.library.script')
