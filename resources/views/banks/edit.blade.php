@extends('layouts.app')
@section('title', 'Edit Bank')
@section('content')
    
 
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($bank, ['route' => ['banks.update', $bank->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('banks.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('banks.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
