@extends('layouts.app')
@section('title', 'Tambah Kayu Keluar')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'outcomingWoods.store','id' => 'formOutcomingWood']) !!}

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

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('outcomingWoods.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('transaction::outcoming_woods.fields.fields_js')
@include('layouts.library.script')