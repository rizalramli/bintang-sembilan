@push('third_party_scripts')
<script>
    $(document).ready(function() {
        @if(!isset($incomingWood))

        var id = $('#template_wood_id').val();
        var supplier_id = $('#supplier_id').val();

        loadTemplate(id);
        loadNumberVehicle(supplier_id);

        $(document).on('change', '#template_wood_id', function() {
            var id = $(this).val();
            loadTemplate(id);
        });

        $(document).on('change', '#supplier_id', function() {
            var supplier_id = $(this).val();
            loadNumberVehicle(supplier_id);
        });


        function loadTemplate(id){
            $.ajax({
                url: "{{ url('transaction/incomingWood/getTemplate') }}",
                method: 'GET',
                data: {
                    id: id
                },
                success: function(result) {
                    $('#table-detail tbody').empty();
                    if(result.status == true){
                        var content = '';
                        $.each(result.data, function(key, value) {
                            var sub_total_volume = 0;
                            content += '<tr>';
                            $.each(value.detail, function(key2, value2) {
                                content += '<tr>';
                                content += '<td><input style="border: none;width:100%" type="text" id="item2_diameter'+key+key2+'" name="item2_diameter['+key+']['+key2+']" value="'+value2.name+'" readonly></td>';
                                content += '<td><span id="turus'+key+key2+'"></span></td>';
                                content += '<td><input style="border: none;width:100%" type="text" class="item2_qty" index="'+key+key2+'" id="item2_qty'+key2+'" name="item2_qty['+key+']['+key2+']"></td>';
                                content += '<td><input style="border: none;width:100%" type="text" id="item2_volume'+key2+'" name="item2_volume['+key+']['+key2+']" value="'+value2.volume+'" readonly></td>';
                                content += '</tr>';
                                sub_total_volume += parseFloat(value2.volume);
                            });
                            content += '<tr>';
                            content += '<td class="text-end" colspan="4">JML</td>';
                            content += '<td class="text-end"><input style="border: none;width:100%" type="text" id="item_sub_total_volume'+key+'" name="item_sub_total_volume[]" value="0" readonly></td>';
                            content += '</tr>';
                        });
                        content += '<tr>';
                        content += '<td class="text-start" colspan="2">Total Batang / Total Volume :</td>';
                        content += '<td class="text-end" colspan="3"><input style="text-align:right;border: none;width:100%" type="text" id="total_qty_volume" name="total_qty_volume" value="0" readonly></td>';
                        content += '</tr>';
                        $("#table-detail tbody").append(content);
                        $("form :input").attr("autocomplete", "off");
                    }
                },
                error: function(request, msg, error) {
                    Swal.fire('Informasi',
                        'terjadi kesalahan.',
                        'error');
                }
            });
        }

        function loadNumberVehicle(id){
            $.ajax({
                url: "{{ url('transaction/incomingWood/getNumberVehicle') }}",
                method: 'GET',
                data: {
                    id: id
                },
                success: function(result) {
                    if(result.status == true){
                        $('#number_vehicles').val(result.data);
                    } else {
                        $('#number_vehicles').val('');
                    }
                },
                error: function(request, msg, error) {
                    Swal.fire('Informasi',
                        'terjadi kesalahan.',
                        'error');
                }
            });
        }
        @endif

        $(document).on('keyup', '.item2_qty', function() {
            var index = $(this).attr('index');
            var value = parseInt($(this).val());
            var content = '';
            for (let i = 1; i <= value; i++) {
                content += '|';
                if(i % 5 == 0)
                {
                    content += '&nbsp;&nbsp;&nbsp;';
                }
                if(i % 70 == 0)
                {
                    content += '<br>';
                }
            }
            $('#turus'+index).html(content);
            update_total();
        });

        function update_total() {
            var form_data = $('#formIncomingWood').serialize()

            $.ajax({
                url: "{{ url('transaction/incomingWood/getTotal') }}",
                method: "POST",
                data: form_data,
                success: function(result) {
                    if(result.status == true){
                        $.each(result.sub_total_volume, function(key, value) {
                            $('#item_sub_total_volume'+key).val(value);
                        });
                        $('#total_qty').val(result.total_qty);
                        $('#total_volume').val(result.total_volume);
                        $('#total_qty_volume').val(result.total_qty + ' / ' + result.total_volume);
                    }
                },
                error: function(request, msg, error) {
                }
            });
        }
    });
</script>
@endpush