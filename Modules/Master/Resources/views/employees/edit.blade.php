@extends('layouts.app')
@section('title', 'Edit Karyawan')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::employees.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')

