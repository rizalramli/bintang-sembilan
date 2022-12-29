@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
        <div class="card">

            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('master::products.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
