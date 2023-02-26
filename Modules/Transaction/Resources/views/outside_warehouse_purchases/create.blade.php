@extends('layouts.app')
@section('title', 'Tambah Pembelian Gudang Luar')
@include('layouts.library.style')
@section('content')

        <div class="card">

            {!! Form::open(['route' => 'outsideWarehousePurchases.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('transaction::outside_warehouse_purchases.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('outsideWarehousePurchases.index') }}" class="btn btn-secondary">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
 
@endsection
@include('layouts.library.script')
