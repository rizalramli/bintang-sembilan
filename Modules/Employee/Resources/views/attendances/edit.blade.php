@extends('layouts.app')
@section('title', 'Edit Kehadiran')
@section('content')

        <div class="card">

            {!! Form::model($attendance, ['route' => ['attendances.update', $attendance->id], 'method' => 'patch']) !!}

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
