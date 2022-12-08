@extends('layouts.app')
@section('title', 'Edit Jenis Kayu Keluar')
@section('content')
    
 
        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($woodTypeOut, ['route' => ['woodTypeOuts.update', $woodTypeOut->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::wood_type_outs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('woodTypeOuts.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
