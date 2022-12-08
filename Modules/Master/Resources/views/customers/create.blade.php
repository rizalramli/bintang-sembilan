@extends('layouts.app')
@section('title', 'Tambah Customer')
@section('content')
    

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'customers.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::customers.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
