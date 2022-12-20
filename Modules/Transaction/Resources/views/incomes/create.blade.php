@extends('layouts.app')
@section('title', 'Tambah Pemasukan')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'incomes.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('transaction::incomes.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')
