<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($expense) ? $expense->date : date('Y-m-d'), ['class' => "form-control date-custom $is_invalid"]) !!}
    @error('date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse_id', 'Gudang') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($expense) ? $expense->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse_id']) !!}
    @error('warehouse_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('description') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($expense) ? $expense->description : null, ['id' => 'description','class' => "form-control $is_invalid"]) !!}
    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('amount') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('amount', 'Jumlah') !!}
    {!! Form::text('amount', isset($expense) ? \App\Helpers\Human::CreateFormatRupiah($expense->amount) : '', ['id' => 'amount','class' => "rupiah form-control $is_invalid"]) !!}
    @error('amount')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>