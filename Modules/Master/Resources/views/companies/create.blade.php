@extends('layouts.app')
@section('title', 'Tambah Company')
@section('content')
    

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'companies.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('companies.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
