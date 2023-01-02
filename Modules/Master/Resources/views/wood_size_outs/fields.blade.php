@if(!isset($woodSizeOut))
<input type="hidden" name="wood_category_out_id" value="{{$_GET['wood_category_out_id']}}">
@endif
<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('length') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('length', 'Panjang') !!}
    {!! Form::text('length', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('length')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('width') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('width', 'Lebar') !!}
    {!! Form::text('width', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('width')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('height') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('height', 'Tinggi') !!}
    {!! Form::text('height', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('height')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>