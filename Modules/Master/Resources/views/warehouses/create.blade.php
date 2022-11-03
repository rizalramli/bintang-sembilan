@extends('layouts.app')
@section('title', 'Tambah Gudang')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'warehouses.store']) !!}

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
