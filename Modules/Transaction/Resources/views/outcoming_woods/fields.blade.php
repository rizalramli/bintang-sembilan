{!! Form::hidden('id', isset($outcomingWood) ? $outcomingWood->id : null) !!}

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('template_wood_out_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('template_wood_out_id', 'Template Kayu') !!}
    {!! Form::select('template_wood_out_id', $template_wood_out, isset($outcomingWood) ? $outcomingWood->template_wood_out_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'template_wood_out_id']) !!}
    @error('template_wood_out_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($outcomingWood) ? $outcomingWood->date : date('Y-m-d'), ['class' => "form-control date-custom $is_invalid"]) !!}
    @error('date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('serial_number') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('serial_number', 'No. Transaksi') !!}
    {!! Form::text('serial_number', isset($outcomingWood) ? $outcomingWood->serial_number : '', ['class' => "form-control $is_invalid"]) !!}
    @error('serial_number')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('serial_number_factory', 'No. Transaksi Pabrik') !!}
    {!! Form::text('serial_number_factory', isset($outcomingWood) ? $outcomingWood->serial_number_factory : null, ['id' => 'serial_number_factory','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('customer_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', $customer, isset($outcomingWood) ? $outcomingWood->customer_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'customer_id']) !!}
    @error('customer_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('employee_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('employee_id', 'Sopir') !!}
    {!! Form::select('employee_id', $employee, isset($outcomingWood) ? $outcomingWood->employee_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'employee_id']) !!}
    @error('employee_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('number_vehicles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('number_vehicles', 'Nopol') !!}
    {!! Form::text('number_vehicles', isset($outcomingWood) ? $outcomingWood->number_vehicles : null, ['id' => 'number_vehicles','class' => "form-control $is_invalid"]) !!}
    @error('number_vehicles')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse_id', 'Gudang') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($outcomingWood) ? $outcomingWood->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse_id']) !!}
    @error('warehouse_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('wood_type_out_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('wood_type_out_id', 'Jenis Kayu') !!}
    {!! Form::select('wood_type_out_id', $wood_type_out, isset($outcomingWood) ? $outcomingWood->wood_type_out_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'wood_type_out_id']) !!}
    @error('wood_type_out_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_qty') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_qty', 'Total Batang SJ') !!}
    {!! Form::text('total_qty', isset($outcomingWood) ? $outcomingWood->total_qty : 0, ['id' => 'total_qty','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_qty')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_volume', 'Total Volume SJ') !!}
    {!! Form::text('total_volume', isset($outcomingWood) ? $outcomingWood->total_volume : 0, ['id' => 'total_volume','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_qty_tally', 'Total Batang Tally') !!}
    {!! Form::text('total_qty_tally', isset($outcomingWood) ? $outcomingWood->total_qty_tally : null, ['id' => 'total_qty_tally','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_volume_tally', 'Total Volume Tally') !!}
    {!! Form::text('total_volume_tally', isset($outcomingWood) ? $outcomingWood->total_volume_tally : null, ['id' => 'total_volume_tally','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_qty_afkir', 'Total Batang Afkir') !!}
    {!! Form::text('total_qty_afkir', isset($outcomingWood) ? $outcomingWood->total_qty_afkir : null, ['id' => 'total_qty_afkir','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('total_volume_afkir', 'Total Volume Afkir') !!}
    {!! Form::text('total_volume_afkir', isset($outcomingWood) ? $outcomingWood->total_volume_afkir : null, ['id' => 'total_volume_afkir','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($outcomingWood) ? $outcomingWood->description : null, ['id' => 'description','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('result', 'Hasil') !!}
    {!! Form::text('result', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->result) : 0, ['id' => 'result','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('fee', 'Biaya') !!}
    {!! Form::text('fee', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->fee) : 0, ['id' => 'fee','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('fare_truck', 'Ongkos Truck') !!}
    {!! Form::text('fare_truck', isset($outsideWarehousePurchase) ? \App\Helpers\Human::CreateFormatRupiah($outsideWarehousePurchase->fare_truck) : 0, ['id' => 'fare_truck','class' => "rupiah form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('nett') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('nett', 'Bersih') !!}
    {!! Form::text('nett', isset($outcomingWood) ? \App\Helpers\Human::CreateFormatRupiah($outcomingWood->nett) : 0, ['id' => 'nett','class' => "rupiah form-control $is_invalid",'readonly']) !!}
    @error('nett')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>