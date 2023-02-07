@extends('layouts.app')
@section('title', 'Hasil Dan Laba')
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
                        {!! Form::label('filter_month', 'Filter Bulan') !!}
                        {!! Form::select('filter_month', $month, date('m'), ['class' => 'select2 form-control','id' => 'filter_month']) !!}
                    </div>
                    <div class="form-group col-sm-3 mb-1">
                        {!! Form::label('filter_year', 'Filter Tahun') !!}
                        {!! Form::select('filter_year', $year, date('Y'), ['class' => 'select2 form-control','id' => 'filter_year']) !!}
                    </div>
                    <div class="form-group col-sm-3 mb-1">   
                        {!! Form::label('filter_warehouse', 'Filter Gudang') !!}
                        {!! Form::select('filter_warehouse', $warehouse, null, ['class' => 'select2 form-control','id' => 'filter_warehouse']) !!}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" id="export-excel">Export Excel</button>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    </div>

@endsection
@include('layouts.library.script')
@push('third_party_scripts')
<script>
    $('#export-excel').on('click', function() {
        var filter_month = $('#filter_month').val();
        var filter_year = $('#filter_year').val();
        var filter_warehouse = $('#filter_warehouse').val();
        var filter = '?filter_month=' + filter_month + 
        '&filter_year=' + filter_year + 
        '&filter_warehouse=' + filter_warehouse;
        var url = "{{ url('report/profit_loss/excel') }}" + filter;
        window.open(
            url,
            '_blank'
        );
    });
</script>
@endpush

