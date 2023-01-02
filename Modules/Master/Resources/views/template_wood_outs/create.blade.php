@extends('layouts.app')
@section('title', 'Tambah Template Kayu Keluar')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'templateWoodOuts.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::template_wood_outs.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('templateWoodOuts.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
