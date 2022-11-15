@if(isset($employee))
{!! Form::hidden('user_id', null) !!}
@endif
<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('name') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('name', 'Nama') !!}
    {!! Form::text('name', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('email') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('address') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('address', 'Alamat') !!}
    {!! Form::text('address', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('address')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('phone') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('phone', 'No Hp') !!}
    {!! Form::text('phone', null, ['class' => "form-control $is_invalid",'maxlength' => 15,'maxlength' => 15]) !!}
    @error('phone')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('warehouse') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('warehouse', 'Gudang') !!}
    {!! Form::select('warehouse', $warehouse, isset($employee) ? $employee->warehouse_id : null, ['class' => "select2 form-control $is_invalid",'id' => 'warehouse']) !!}
    @error('warehouse')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>