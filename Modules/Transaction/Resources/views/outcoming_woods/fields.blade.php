{!! Form::hidden('id', isset($outcomingWood) ? $outcomingWood->id : null) !!}

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('template_wood_out_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('template_wood_out_id', 'Template Kayu') !!}
    {!! Form::select('template_wood_out_id', $template_wood, isset($outcomingWood) ? $outcomingWood->template_wood_out_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'template_wood_out_id']) !!}
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
    @php $is_invalid = ''; $errors->has('customer_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('customer_id', 'Customer') !!}
    {!! Form::select('customer_id', $customer, isset($incomingWood) ? $incomingWood->customer_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'customer_id']) !!}
    @error('customer_id')
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
    @php $is_invalid = ''; $errors->has('wood_type_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('wood_type_id', 'Jenis Kayu') !!}
    {!! Form::select('wood_type_id', $wood_type, isset($outcomingWood) ? $outcomingWood->wood_type_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'wood_type_id']) !!}
    @error('wood_type_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_qty') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_qty', 'Total Batang') !!}
    {!! Form::text('total_qty', isset($outcomingWood) ? $outcomingWood->total_qty : 0, ['id' => 'total_qty','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_qty')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_volume', 'Total Volume') !!}
    {!! Form::text('total_volume', isset($outcomingWood) ? $outcomingWood->total_volume : 0, ['id' => 'total_volume','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($outcomingWood) ? $outcomingWood->description : null, ['id' => 'description','class' => "form-control"]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('cost') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('cost', 'Biaya') !!}
    {!! Form::text('cost', isset($outcomingWood) ? \App\Helpers\Human::CreateFormatRupiah($outcomingWood->cost) : 0, ['id' => 'cost','class' => "rupiah form-control $is_invalid"]) !!}
    @error('cost')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>