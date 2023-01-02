@extends('layouts.app')
@section('title', 'Edit Kategori Kayu')
@section('content')
        <div class="card">

            {!! Form::model($woodCategory, ['route' => ['woodCategories.update', $woodCategory->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::wood_categories.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('master/templateWoods/'.$woodCategory->template_wood_id.'/edit') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>

        @include('flash::message')
        <div class="card">
            @include('master::wood_sizes.table')
        </div>
 
@endsection
