@extends('layouts.app')
@section('title', 'Tambah Pengeluaran')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'expenses.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('transaction::expenses.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')