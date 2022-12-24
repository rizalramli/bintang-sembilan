<div class="form-group col-sm-6 mb-1">
    {!! Form::label('date', 'Tanggal') !!}
    @php $is_invalid = ''; $errors->has('date') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::text('date', isset($salary) ? $salary->date : date('Y-m-d'), ['class' => "form-control date-custom $is_invalid"]) !!}
    @error('date')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse_id', 'Gudang') !!}
    {!! Form::select('warehouse_id', $warehouse, isset($salary) ? $salary->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse_id']) !!}
    @error('warehouse_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('employee_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('employee_id', 'Mandor') !!}
    {!! Form::select('employee_id', $employee, isset($salary) ? $salary->employee_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'employee_id']) !!}
    @error('employee_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('price') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('price', 'Harga / m3') !!}
    {!! Form::text('price', isset($salary) ? \App\Helpers\Human::CreateFormatRupiah($salary->price) : '0', ['id' => 'price','class' => "rupiah form-control $is_invalid"]) !!}
    @error('price')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('volume', 'Volume') !!}
    {!! Form::text('volume', isset($salary) ? $salary->volume : '0', ['id' => 'volume','class' => "form-control $is_invalid"]) !!}
    @error('volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('total') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('total', 'Total Gaji') !!}
    {!! Form::text('total', isset($salary) ? \App\Helpers\Human::CreateFormatRupiah($salary->total) : '0', ['id' => 'total','class' => "rupiah form-control $is_invalid",'readonly']) !!}
    @error('total')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('description', 'Keterangan') !!}
    {!! Form::text('description', isset($salary) ? $salary->description : null, ['id' => 'description','class' => "form-control"]) !!}
</div>

@push('third_party_scripts')
<script>
    $(document).ready(function () {
        $('#price').on('keyup', function () {
            var price = $(this).val();
            price = price.replace(/\./g, '');
            var volume = $('#volume').val();
            var total = price * volume;
            total = parseInt(total);
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#total').val(total);
        });

        $('#volume').on('keyup', function () {
            var price = $('#price').val();
            price = price.replace(/\./g, '');
            var volume = $(this).val();
            var total = price * volume;
            total = parseInt(total);
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#total').val(total);
        });
    });
</script>
@endpush
