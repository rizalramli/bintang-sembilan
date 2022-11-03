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
    @php $is_invalid = ''; $errors->has('password') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => "form-control $is_invalid",'maxlength' => 255,'maxlength' => 255]) !!}
    @error('password')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group col-sm-6 mb-1">
    {!! Form::label('confirm-password', 'Konfirmasi Password') !!}
    {!! Form::password('confirm-password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('roles') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('roles', 'Hak Akses') !!}
    @if(isset($user))
    {!! Form::select('roles[]', $roles,$userRole, array('id' => 'roles','class' => "select2 form-select form-control $is_invalid",'multiple')) !!}
    @else
    {!! Form::select('roles[]', $roles,[], array('id' => 'roles','class' => "select2 form-select form-control $is_invalid",'multiple')) !!}
    @endif
    @error('roles')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>