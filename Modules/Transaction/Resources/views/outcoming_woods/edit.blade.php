@extends('layouts.app')
@section('title', 'Edit Kayu Keluar')
@section('content')
        <div class="card">

            {!! Form::model($outcomingWood, ['route' => ['outcomingWoods.update', $outcomingWood->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('transaction::outcoming_woods.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('outcomingWoods.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
