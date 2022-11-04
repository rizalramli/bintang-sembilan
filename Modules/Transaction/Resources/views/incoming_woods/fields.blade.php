<!-- Template Wood Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('template_wood_id', 'Template Wood Id:') !!}
    {!! Form::number('template_wood_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Supplier Id:') !!}
    {!! Form::number('supplier_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Warehouse Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warehouse_id', 'Warehouse Id:') !!}
    {!! Form::number('warehouse_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Wood Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('wood_type_id', 'Wood Type Id:') !!}
    {!! Form::number('wood_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Serial Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serial_number', 'Serial Number:') !!}
    {!! Form::number('serial_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Number Vehicles Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_vehicles', 'Number Vehicles:') !!}
    {!! Form::text('number_vehicles', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('type', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('type', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('type', 'Type', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Total Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_volume', 'Total Volume:') !!}
    {!! Form::number('total_volume', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:') !!}
    {!! Form::number('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control','id'=>'created_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#created_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control','id'=>'updated_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#updated_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush