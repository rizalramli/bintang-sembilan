<!-- Warehouse Id Field -->
<div class="col-sm-12">
    {!! Form::label('warehouse_id', 'Warehouse Id:') !!}
    <p>{{ $expense->warehouse_id }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $expense->date }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $expense->description }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $expense->type }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $expense->amount }}</p>
</div>

<!-- Ref Id Field -->
<div class="col-sm-12">
    {!! Form::label('ref_id', 'Ref Id:') !!}
    <p>{{ $expense->ref_id }}</p>
</div>

<!-- Ref Table Field -->
<div class="col-sm-12">
    {!! Form::label('ref_table', 'Ref Table:') !!}
    <p>{{ $expense->ref_table }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $expense->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $expense->updated_at }}</p>
</div>

