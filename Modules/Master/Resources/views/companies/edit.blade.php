@extends('layouts.app')
@section('title', 'Perusahaan')
@section('content')

        @include('flash::message')

        <div class="card">

            {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::companies.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
