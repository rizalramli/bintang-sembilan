@extends('layouts.app')
@section('title', 'Tambah Kategori Kayu Keluar')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'woodCategoryOuts.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::wood_category_outs.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('master/templateWoodOuts/'.$_GET['template_wood_out_id'].'/edit') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')
