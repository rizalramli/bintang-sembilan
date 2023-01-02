@extends('layouts.app')
@section('title', 'Edit Kategori Kayu Keluar')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::model($woodCategoryOut, ['route' => ['woodCategoryOuts.update', $woodCategoryOut->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::wood_category_outs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('master/templateWoodOuts/'.$woodCategoryOut->template_wood_out_id.'/edit') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>

        @include('flash::message')
        <div class="card">
            @include('master::wood_size_outs.table')
        </div>
 
@endsection
@include('layouts.library.script')
