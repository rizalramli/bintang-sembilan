@extends('layouts.app')
@section('title', 'Edit Penggajian')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::model($salary, ['route' => ['salaries.update', $salary->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('employee::salaries.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')
