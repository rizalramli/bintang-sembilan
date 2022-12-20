@extends('layouts.app')
@section('title', 'Pengeluaran')
@include('layouts.library.style')
@section('content')
<div class="row">
<div class="col-12">
  @include('flash::message')
</div>
</div>

    <div class="row">
        <div class="col-12">

        @include('flash::message')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-3 mb-1">   
                        {!! Form::label('filter_warehouse', 'Filter Gudang') !!}
                        {!! Form::select('filter_warehouse', $warehouse, null, ['class' => 'select2 form-control','id' => 'filter_warehouse']) !!}
                    </div>
                    <div class="form-group col-sm-3 mb-1">
                        {!! Form::label('filter_date', 'Filter Berdasarkan') !!}
                        {!! Form::select('filter_date', ['day' => 'Hari ini','week' => '7 Hari Terakhir','month' => 'Bulan Ini','year' => 'Tahun Ini'], 'day', ['class' => 'select2 form-control','id' => 'filter_date']) !!}
                    </div>
                    <div class="form-group col-sm-3 mb-1">
                        {!! Form::label('date', 'Filter Dari Tanggal') !!}
                        {!! Form::text('filter_date_start', null, ['class' => 'form-control date-custom','id' => 'filter_date_start']) !!}
                    </div>
                    <div class="form-group col-sm-3 mb-1">
                        {!! Form::label('date', 'Filter Sampai Tanggal') !!}
                        {!! Form::text('filter_date_end', null, ['class' => 'form-control date-custom','id' => 'filter_date_end']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('transaction::expenses.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection
@include('layouts.library.script')

