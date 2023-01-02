@extends('layouts.app')
@section('title', 'Tambah Ukuran Kayu')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'woodSizes.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::wood_sizes.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('woodSizes.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
