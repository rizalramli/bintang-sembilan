@extends('layouts.app')
@section('title', 'Edit Incoming Wood')
@section('content')
    
 
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($incomingWood, ['route' => ['incomingWoods.update', $incomingWood->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('incoming_woods.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('incomingWoods.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
