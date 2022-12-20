<!-- Warehouse Id Field -->
<div class="col-sm-12">
    {!! Form::label('warehouse_id', 'Warehouse Id:') !!}
    <p>{{ $income->warehouse_id }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $income->date }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $income->description }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $income->type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $income->amount }}</p>
</div>

<!-- Ref Id Field -->
<div class="col-sm-12">
    {!! Form::label('ref_id', 'Ref Id:') !!}
    <p>{{ $income->ref_id }}</p>
</div>

<!-- Ref Table Field -->
<div class="col-sm-12">
    {!! Form::label('ref_table', 'Ref Table:') !!}
    <p>{{ $income->ref_table }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $income->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $income->updated_at }}</p>
</div>

