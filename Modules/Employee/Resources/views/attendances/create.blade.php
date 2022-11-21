@extends('layouts.app')
@if(request()->get('type') == 'check_in')
    @section('title', 'Kehadiran Masuk')
@else
    @section('title', 'Kehadiran Keluar')
@endif
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
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary','id'=>'submit']) !!}
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('employee::attendances.fields.fields_js')
@include('layouts.library.script')
