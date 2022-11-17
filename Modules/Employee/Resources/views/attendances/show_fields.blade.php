<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $attendance->employee_id }}</p>
</div>

<!-- Check In Field -->
<div class="col-sm-12">
    {!! Form::label('check_in', 'Check In:') !!}
    <p>{{ $attendance->check_in }}</p>
</div>

<!-- Check Out Field -->
<div class="col-sm-12">
    {!! Form::label('check_out', 'Check Out:') !!}
    <p>{{ $attendance->check_out }}</p>
</div>

<!-- Status Check In Field -->
<div class="col-sm-12">
    {!! Form::label('status_check_in', 'Status Check In:') !!}
    <p>{{ $attendance->status_check_in }}</p>
</div>

<!-- Status Check Out Field -->
<div class="col-sm-12">
    {!! Form::label('status_check_out', 'Status Check Out:') !!}
    <p>{{ $attendance->status_check_out }}</p>
</div>

<!-- Created Check In Field -->
<div class="col-sm-12">
    {!! Form::label('created_check_in', 'Created Check In:') !!}
    <p>{{ $attendance->created_check_in }}</p>
</div>

<!-- Created Check Out Field -->
<div class="col-sm-12">
    {!! Form::label('created_check_out', 'Created Check Out:') !!}
    <p>{{ $attendance->created_check_out }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $attendance->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $attendance->updated_at }}</p>
</div>

