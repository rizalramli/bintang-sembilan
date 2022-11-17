@extends('layouts.app')
@section('title', 'Tambah Attendance')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'attendances.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('employee::attendances.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('employee::attendances.fields.fields_js')
@include('layouts.library.script')
