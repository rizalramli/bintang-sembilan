@push('third_party_stylesheets')
@include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-bordered']) !!}

@push('third_party_scripts')
@include('layouts.datatables_js')
{!! $dataTable->scripts() !!}
<script>
    $('#filter_supplier').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_warehouse').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_wood_type').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_date').on('change', function() {
        $('#filter_date_start').val('');
        $('#filter_date_end').val('');
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_date_start').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_date_end').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#export-excel').on('click', function() {
        var filter_supplier = $('#filter_supplier').val();
        var filter_warehouse = $('#filter_warehouse').val();
        var filter_wood_type = $('#filter_wood_type').val();
        var filter_date = $('#filter_date').val();
        var filter_date_start = $('#filter_date_start').val();
        var filter_date_end = $('#filter_date_end').val();
        var filter = '?filter_supplier=' + filter_supplier + 
        '&filter_warehouse=' + filter_warehouse + 
        '&filter_wood_type=' + filter_wood_type + 
        '&filter_date=' + filter_date + 
        '&filter_date_start=' + filter_date_start + 
        '&filter_date_end=' + filter_date_end;
        var url = "{{ url('transaction/incomingWoods/excel') }}" + filter;
        window.open(
            url,
            '_blank'
        );
    });
</script>
@endpush