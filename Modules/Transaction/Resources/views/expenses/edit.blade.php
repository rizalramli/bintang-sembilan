@extends('layouts.app')
@section('title', 'Edit Pengeluaran')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::model($expense, ['route' => ['expenses.update', $expense->id], 'method' => 'patch']) !!}

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
