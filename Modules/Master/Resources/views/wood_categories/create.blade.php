@extends('layouts.app')
@section('title', 'Tambah Kategori Kayu')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'woodCategories.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::wood_categories.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('woodCategories.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
