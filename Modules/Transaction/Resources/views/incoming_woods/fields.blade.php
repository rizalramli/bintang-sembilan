@if(isset($incomingWood))
<!-- Serial Number Field -->
<div class="form-group col-sm-6 mb-1">
    {!! Form::label('serial_number', 'No Urut') !!}
    {!! Form::number('serial_number', isset($incomingWood) ? $incomingWood->serial_number : null, ['class' => 'form-control','readonly']) !!}
</div>
@endif

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal:') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($incomingWood) ? $incomingWood->date : null, ['class' => "form-control datetime-custom $is_invalid"]) !!}
    @error('date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('supplier_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('supplier_id', 'Supplier') !!}
    {!! Form::select('supplier_id', $supplier, isset($incomingWood) ? $incomingWood->supplier_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'supplier_id']) !!}
    @error('supplier_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse_id', 'Gudang') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($incomingWood) ? $incomingWood->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse_id']) !!}
    @error('warehouse_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('wood_type_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('wood_type_id', 'Jenis Kayu') !!}
    {!! Form::select('wood_type_id', $wood_type, isset($incomingWood) ? $incomingWood->wood_type_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'wood_type_id']) !!}
    @error('wood_type_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('number_vehicles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('number_vehicles', 'Plat Kendaraan') !!}
    {!! Form::text('number_vehicles', isset($incomingWood) ? $incomingWood->number_vehicles : null, ['class' => "form-control $is_invalid"]) !!}
    @error('number_vehicles')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_volume', 'Total Volume') !!}
    {!! Form::text('total_volume', isset($incomingWood) ? $incomingWood->total_volume : null, ['class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>