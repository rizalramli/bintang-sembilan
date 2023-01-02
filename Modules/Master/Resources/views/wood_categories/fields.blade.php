@if(!isset($woodCategory))
<input type="hidden" name="template_wood_id" value="{{$_GET['template_wood_id']}}">
@endif
<div class="form-group col-sm-6 mb-1">
    @php $is_invalid = ''; $errors->has('name') ? $is_invalid = 'is-invalid' : ''; @endphp
    {!! Form::label('name', 'Nama Kategori') !!}
    {!! Form::text('name', null, ['class' => "form-control $is_invalid",'maxlength' => 125,'maxlength' => 125]) !!}
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>