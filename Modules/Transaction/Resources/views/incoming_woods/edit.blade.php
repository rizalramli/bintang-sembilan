@extends('layouts.app')
@section('title', 'Edit Kayu Masuk')
@include('layouts.library.style')
@section('content')
        <div class="card">

            {!! Form::model($incomingWood, ['route' => ['incomingWoods.update', $incomingWood->id], 'method' => 'patch']) !!}

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

@include('layouts.library.script')
