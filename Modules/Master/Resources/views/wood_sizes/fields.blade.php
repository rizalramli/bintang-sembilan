<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('name') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('name', 'Diameter') !!}
    {!! Form::text('name', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('volume') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('volume', 'Volume') !!}
    {!! Form::text('volume', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('volume')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>