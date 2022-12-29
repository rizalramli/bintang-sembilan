@extends('layouts.app')
@section('title', 'Kayu Keluar')
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
        var filter = '?filter_month=' + filter_month + 
        '&filter_year=' + filter_year;
        var url = "{{ url('report/outcomingWoods/excel') }}" + filter;
        window.open(
            url,
            '_blank'
        );
    });
</script>
@endpush

