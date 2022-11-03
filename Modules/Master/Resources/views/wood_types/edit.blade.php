@extends('layouts.app')
@section('title', 'Edit Jenis Kayu')
@section('content')

        <div class="card">

            {!! Form::model($woodType, ['route' => ['woodTypes.update', $woodType->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::wood_types.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('woodTypes.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
