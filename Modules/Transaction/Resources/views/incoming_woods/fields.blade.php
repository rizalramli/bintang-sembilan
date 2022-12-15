{!! Form::hidden('id', isset($incomingWood) ? $incomingWood->id : null) !!}

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('template_wood_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('template_wood_id', 'Template Kayu') !!}
    {!! Form::select('template_wood_id', $template_wood, isset($incomingWood) ? $incomingWood->template_wood_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'template_wood_id']) !!}
    @error('template_wood_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($incomingWood) ? $incomingWood->date : date('Y-m-d'), ['class' => "form-control date-custom $is_invalid"]) !!}
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
    @php $is_invalid = ''; $errors->has('number_vehicles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('number_vehicles', 'Nopol') !!}
    {!! Form::text('number_vehicles', isset($incomingWood) ? $incomingWood->number_vehicles : null, ['id' => 'number_vehicles','class' => "form-control $is_invalid"]) !!}
    @error('number_vehicles')
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
    @php $is_invalid = ''; $errors->has('serial_number') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('serial_number', 'No. Seri SAKR') !!}
    {!! Form::text('serial_number', isset($incomingWood) ? $incomingWood->serial_number : '/SAKR/'.date('m').'/'.date('Y'), ['class' => "form-control $is_invalid"]) !!}
    @error('serial_number')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('proof_ownership') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('proof_ownership', 'Bukti Kepemilikan') !!}
    {!! Form::text('proof_ownership', isset($incomingWood) ? $incomingWood->proof_ownership : 'SPPT', ['class' => "form-control $is_invalid"]) !!}
    @error('proof_ownership')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_qty') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_qty', 'Total Batang') !!}
    {!! Form::text('total_qty', isset($incomingWood) ? $incomingWood->total_qty : 0, ['id' => 'total_qty','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_qty')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total_volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total_volume', 'Total Volume') !!}
    {!! Form::text('total_volume', isset($incomingWood) ? $incomingWood->total_volume : 0, ['id' => 'total_volume','class' => "form-control $is_invalid",'readonly']) !!}
    @error('total_volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($incomingWood) ? $incomingWood->description : null, ['id' => 'description','class' => "form-control"]) !!}
</div>