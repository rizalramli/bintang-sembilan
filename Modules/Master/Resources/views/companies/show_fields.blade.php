<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $company->name }}</p>
</div>

<!-- Owner Field -->
<div class="col-sm-12">
    {!! Form::label('owner', 'Owner:') !!}
    <p>{{ $company->owner }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $company->email }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $company->phone }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $company->address }}</p>
</div>

<!-- District Field -->
<div class="col-sm-12">
    {!! Form::label('district', 'District:') !!}
    <p>{{ $company->district }}</p>
</div>

<!-- City Field -->
<div class="col-sm-12">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $company->city }}</p>
</div>

<!-- Province Field -->
<div class="col-sm-12">
    {!! Form::label('province', 'Province:') !!}
    <p>{{ $company->province }}</p>
</div>

<!-- Logo Field -->
<div class="col-sm-12">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{{ $company->logo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $company->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $company->updated_at }}</p>
</div>

