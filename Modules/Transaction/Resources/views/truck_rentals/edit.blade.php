@extends('layouts.app')
@section('title', 'Edit Penyewaan Truk')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::model($truckRental, ['route' => ['truckRentals.update', $truckRental->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('transaction::truck_rentals.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('truckRentals.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')
