@push('third_party_scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '#checklist_all', function() {
            $('.checkbox_employee').not(this).prop('checked', this.checked);
        });

        $('#submit').on('click', function() {
            var data = $('.checkbox_employee:checked').map((_, el) => el.value).get();
            if (data.length < 1) {
                Swal.fire('Informasi',
                'pilih karyawan terlebih dahulu.',
                'warning');
                return false;
            } else {
                $('#form').submit();
            }
        });
        
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
                        Swal.fire('Informasi',
                        'data tidak ditemukan.',
                        'error');
                    } else if(result.data.length == 0) {
                        $('#warning_done').show();
                        $('#list_employee').hide();
                        $('#submit').hide();
                    } else {
                        $('#warning_done').hide();
                        $('#list_employee').show();
                        $('#submit').show();
                        var content = '';
                        $.each(result.data, function(key, value) {
                            content += '<tr>';
                            content += '<input type="hidden" name="employees_id[]" value="'+value.id+'" />';
                            content += '<td class="text-center"><input class="form-check-input checkbox_employee" name="checklist_employee[]" type="checkbox" id="checkbox_employee" value="checked" /></td>';
                            content += '<td><input style="border: none;width:100%" type="text" class="name" id="name'+key+'" name="name[]" value="'+value.name+'" readonly></td>';
                            content += '</tr>';
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