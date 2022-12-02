@extends('layouts.app')
@section('title', 'Edit Supplier')
@section('content')

        <div class="card">

            {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'method' => 'patch']) !!}

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
