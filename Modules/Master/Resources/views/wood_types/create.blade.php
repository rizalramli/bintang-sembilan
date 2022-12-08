@extends('layouts.app')
@section('title', 'Tambah Jenis Kayu Masuk')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'woodTypes.store']) !!}

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
