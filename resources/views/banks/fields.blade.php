<!-- Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank', 'Bank:') !!}
    {!! Form::text('bank', null, ['class' => 'form-control','maxlength' => 35,'maxlength' => 35]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>

<!-- Cp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cp', 'Cp:') !!}
    {!! Form::text('cp', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>

<!-- Hp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hp', 'Hp:') !!}
    {!! Form::text('hp', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Mdr Debit Card Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mdr_debit_card', 'Mdr Debit Card:') !!}
    {!! Form::number('mdr_debit_card', null, ['class' => 'form-control']) !!}
</div>

<!-- Mdr Credit Card Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mdr_credit_card', 'Mdr Credit Card:') !!}
    {!! Form::number('mdr_credit_card', null, ['class' => 'form-control']) !!}
</div>