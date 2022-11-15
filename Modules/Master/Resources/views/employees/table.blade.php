@push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-bordered']) !!}

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script>
        $('#filter_warehouse').on('change', function() {
            window.LaravelDataTables["dataTableBuilder"].ajax.reload();
        });
    </script>
@endpush