@extends('layouts.app')
@section('title', 'Edit Gudang')
@section('content')

        <div class="card">

            {!! Form::model($warehouse, ['route' => ['warehouses.update', $warehouse->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::warehouses.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('warehouses.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
