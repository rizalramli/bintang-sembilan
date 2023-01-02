@extends('layouts.app')
@section('title', 'Tambah Ukuran Kayu Keluar')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'woodSizeOuts.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('master::wood_size_outs.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ url('master/woodCategoryOuts/'.$_GET['wood_category_out_id'].'/edit') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
