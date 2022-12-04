@extends('layouts.app')
@section('title', 'Edit Kayu Masuk Dagang')
@include('layouts.library.style')
@section('content')
        <div class="card">

            {!! Form::open(['route' => 'incomingWoodTrades.update','id' => 'formIncomingWood']) !!}

            <div class="card-body">
                <div class="row">
                    @include('transaction::incoming_wood_trades.fields')
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    @include('transaction::incoming_wood_trades.fields.table_detail')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('incomingWoodTrades.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('transaction::incoming_wood_trades.fields.fields_js')
@include('layouts.library.script')
