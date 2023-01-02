@extends('layouts.app')
@section('title', 'Edit Template Kayu Masuk')
@section('content')

        <div class="card">

            {!! Form::model($templateWood, ['route' => ['templateWoods.update', $templateWood->id], 'method' => 'patch']) !!}

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
        
        @include('flash::message')
        <div class="card">
            @include('master::wood_categories.table')
        </div>
 
@endsection
