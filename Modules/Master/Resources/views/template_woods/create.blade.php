@extends('layouts.app')
@section('title', 'Tambah Template Wood')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'templateWoods.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::template_woods.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('templateWoods.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
