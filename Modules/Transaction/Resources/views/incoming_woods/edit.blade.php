@extends('layouts.app')
@section('title', 'Edit Kayu Masuk SNI')
@include('layouts.library.style')
@section('content')
        <div class="card">

            {!! Form::open(['route' => 'incomingWoods.update','id' => 'formIncomingWood']) !!}

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
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('incomingWoods.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('transaction::incoming_woods.fields.fields_js')
@include('layouts.library.script')
