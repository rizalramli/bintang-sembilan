<!-- Wood Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('wood_category_id', 'Wood Category Id:') !!}
    <p>{{ $woodSize->wood_category_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $woodSize->name }}</p>
</div>

<!-- Volume Field -->
<div class="col-sm-12">
    {!! Form::label('volume', 'Volume:') !!}
    <p>{{ $woodSize->volume }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $woodSize->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $woodSize->updated_at }}</p>
</div>

