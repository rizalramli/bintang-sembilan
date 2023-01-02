@extends('layouts.app')
@section('title', 'Edit Template Kayu Keluar')
@section('content')

        <div class="card">

            {!! Form::model($templateWoodOut, ['route' => ['templateWoodOuts.update', $templateWoodOut->id], 'method' => 'patch']) !!}

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

        @include('flash::message')
        <div class="card">
            @include('master::wood_category_outs.table')
        </div>
 
@endsection
