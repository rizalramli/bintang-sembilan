@if(!isset($woodCategoryOut))
<input type="hidden" name="template_wood_out_id" value="{{$_GET['template_wood_out_id']}}">
@endif
<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('product_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('product_id', 'Produk') !!}
    {!! Form::select('product_id', $product, null, ['class' => "select2 form-control $is_invalid",'id' => 'product_id']) !!}
    @error('product_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('wood_type_id') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('wood_type_id', 'Jenis Kayu') !!}
    {!! Form::select('wood_type_id', $wood_type, null, ['class' => "select2 form-control $is_invalid",'id' => 'wood_type_id']) !!}
    @error('wood_type_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>