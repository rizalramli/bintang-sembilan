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
    @php $is_invalid = ''; $errors->has('number_vehicles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('number_vehicles', 'Nopol') !!}
    {!! Form::text('number_vehicles', isset($incomingWood) ? $incomingWood->number_vehicles : null, ['class' => "form-control $is_invalid"]) !!}
    @error('number_vehicles')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('address') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('address', 'Desa dan Kecamatan') !!}
    {!! Form::text('address', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('address')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('city') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('city', 'Kota') !!}
    {!! Form::text('city', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('city')
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