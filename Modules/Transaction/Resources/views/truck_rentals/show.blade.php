@extends('layouts.app')
@section('title', 'Detail Truck Rental')
@section('content')    
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('truck_rentals.show_fields')
                </div>
            </div>
        </div>
 
    <div class="row mb-2">
    <div class="col-sm-6">
        <a class="btn btn-secondary " href="{{ route('truckRentals.index') }}">
            <i data-feather="arrow-left">
            </i>
            Kembali
        </a>
    </div>
</div>
@endsection
