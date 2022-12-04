@extends('layouts.app')
@section('title', 'Detail Kayu Masuk SAKR')
@include('layouts.library.style')
@section('content')    
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('transaction::incoming_woods.fields')
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('transaction::incoming_woods.fields.table_detail')
                </div>
            </div>
            
            <div class="card-footer">
                <a class="btn btn-secondary " href="{{ route('incomingWoods.index') }}">
                    <i data-feather="arrow-left">
                    </i>
                    Kembali
                </a>
            </div>
        </div>
@endsection
@include('layouts.library.script')
