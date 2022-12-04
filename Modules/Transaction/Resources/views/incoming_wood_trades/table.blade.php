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
</script>
@endpush