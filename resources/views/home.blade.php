@extends('layouts.app')
@section('title', 'Dashboard')
@include('layouts.library.style')
@section('content')
<div class="col-xl-12 col-md-12 col-12">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['id'=>'form-dashboard']) !!}
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
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="col-xl-12 col-md-12 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">Statistik</h4>
            <div class="d-flex align-items-center">
                <p class="card-text font-small-2 me-25 mb-0"></p>
            </div>
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('employee/attendances')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="clock" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Kehadiran</h4>
                                <p class="card-text font-small-3 mb-0" id="attendances"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('transaction/incomingWoods')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                                <div class="avatar-content">
                                    <i data-feather="layers" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Kayu Masuk Sakr</h4>
                                <p class="card-text font-small-3 mb-0" id="incomingWoods"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('transaction/incomingWoodTrades')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i data-feather="layers" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Kayu Masuk</h4>
                                <p class="card-text font-small-3 mb-0" id="incomingWoodTrades"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('transaction/outcomingWoods')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-danger me-2">
                                <div class="avatar-content">
                                    <i data-feather="layers" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Kayu Keluar</h4>
                                <p class="card-text font-small-3 mb-0" id="outcomingWoods"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('employee/salaries')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                                <div class="avatar-content">
                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Penggajian</h4>
                                <p class="card-text font-small-3 mb-0" id="salaries"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('transaction/incomes')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Pemasukan</h4>
                                <p class="card-text font-small-3 mb-0" id="incomes"></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-2">
                    <a href="{{url('transaction/expenses')}}" class="text-black">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-danger me-2">
                                <div class="avatar-content">
                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Pengeluaran</h4>
                                <p class="card-text font-small-3 mb-0" id="expenses"></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Statistics Card -->
@endsection
@include('layouts.library.script')

@push('third_party_scripts')
<script>
    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        var form_data = $('#form-dashboard').serialize();
        $.ajax({
            url: "{{ url('dashboard') }}",
            method: "GET",
            data: form_data,
            success: function(data) {
                var data = JSON.parse(data);
                $('#attendances').html(data.count_attendances);
                $('#incomingWoods').html(data.count_incomingWoods);
                $('#incomingWoodTrades').html(data.count_incomingWoodTrades);
                $('#outcomingWoods').html(data.count_outcomingWoods);
                $('#salaries').html(data.count_salaries);
                $('#incomes').html(data.count_incomes);
                $('#expenses').html(data.count_expenses);
            }
        });
    }

    $(document).on('change', '#filter_date', function() {
        $('#filter_date_start').val('');
        $('#filter_date_end').val('');
        loadData();
    });

    $(document).on('change', '#filter_date_start', function() {
        loadData();
    });

    $(document).on('change', '#filter_date_end', function() {
        loadData();
    });

    $(document).on('change', '#filter_warehouse', function() {
        loadData();
    });
</script>
@endpush