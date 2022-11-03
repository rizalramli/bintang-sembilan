@extends('layouts.app')
@section('title', 'Tambah Pemasok')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'suppliers.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::suppliers.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
