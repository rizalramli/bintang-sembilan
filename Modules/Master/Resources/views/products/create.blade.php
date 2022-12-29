@extends('layouts.app')
@section('title', 'Tambah Product')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'products.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::products.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
