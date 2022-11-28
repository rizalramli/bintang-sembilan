@extends('layouts.app')
@section('title', 'Edit Wood Size')
@section('content')
    
 
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($woodSize, ['route' => ['woodSizes.update', $woodSize->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('wood_sizes.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('woodSizes.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
