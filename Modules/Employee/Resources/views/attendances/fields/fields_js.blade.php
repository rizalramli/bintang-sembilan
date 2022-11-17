@push('third_party_scripts')
<script>
    $(document).ready(function() {
        
        var warehouse_id = $('#warehouse_id').val();
        var type = "{{ request()->get('type') }}";

        loadTemplate(warehouse_id,type);

        $(document).on('change', '#warehouse_id', function() {
            var warehouse_id = $(this).val();
            var type = "{{ request()->get('type') }}";
            loadTemplate(warehouse_id,type);
        });

        function loadTemplate(warehouse_id,type){
            $.ajax({
                url: "{{ url('employee/attendance/getTemplate') }}",
                method: 'GET',
                data: {
                    warehouse_id: warehouse_id,
                    type: type
                },
                success: function(result) {
                    $('#table-detail tbody').empty();
                    if(result.status == false){
                    } else {
                        var content = '';
                        $.each(result.data, function(key, value) {
                            content += '<tr>';
                            content += '<td class="text-center"><input class="form-check-input" type="checkbox" id="administrator_access" value="checked" /></td>';
                            content += '<td><input style="border: none;width:100%" type="text" class="name" id="name'+key+'" name="name[]" value="'+value.name+'" readonly></td>';
                        });
                        $("#table-detail tbody").append(content);
                    }
                },
                error: function(request, msg, error) {
                    Swal.fire('Informasi',
                        'terjadi kesalahan.',
                        'error');
                }
            });
        }
    });
</script>
@endpush