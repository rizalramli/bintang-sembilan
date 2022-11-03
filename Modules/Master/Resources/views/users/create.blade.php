@extends('layouts.app')
@section('title', 'Tambah Pengguna')
@include('layouts.library.select2_css')
@section('content')
    
        <div class="card">

            {!! Form::open(['route' => 'users.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::users.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection

@include('layouts.library.select2_js')
