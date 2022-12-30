@push('third_party_stylesheets')
    @include('layouts.datatables_css')
@endpush

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-bordered']) !!}

@push('third_party_scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
    <script>
    $('#filter_customer').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_warehouse').on('change', function() {
        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
    });
    $('#filter_wood_type_out').on('change', function() {
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

    $(document).on('click', '.print-invoice', function() {
        var id = $(this).data('id');
        var type = $(this).data('type');
        if(type == 1)
        {
            Swal.fire({
                title: 'Pilih tanggal masa berlaku',
                html: `<label>Dari Tanggal</label><input type="date" id="date_start" class="form-control" placeholder="Username">
                <br><label>Sampai Tanggal</label><input type="date" id="date_end" class="form-control" placeholder="date_end">`,
                confirmButtonText: 'Cetak',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                focusConfirm: false,
                preConfirm: () => {
                    const date_start = Swal.getPopup().querySelector('#date_start').value
                    const date_end = Swal.getPopup().querySelector('#date_end').value
                    if (!date_start || !date_end) {
                    Swal.showValidationMessage(`Silahkan isi tanggal`)
                    }
                    return { date_start: date_start, date_end: date_end }
                }
                }).then((result) => {
                    var date_start = result.value.date_start;
                    var date_end = result.value.date_end;
                    var url = "{{url('transaction/outcomingWood/invoice')}}" + "?id=" + id + "&type=" + type + "&date_start=" + date_start + "&date_end=" + date_end;
                    window.open(url, '_blank');
                })
        }
    });
</script>
@endpush