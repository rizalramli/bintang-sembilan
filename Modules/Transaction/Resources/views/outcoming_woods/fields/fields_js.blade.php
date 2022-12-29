@push('third_party_scripts')
<script>
    $(document).ready(function() {
        @if(!isset($outcomingWood))

        var id = $('#template_wood_out_id').val();

        loadTemplate(id);

        $(document).on('change', '#template_wood_out_id', function() {
            var id = $(this).val();
            loadTemplate(id);
        });


        function loadTemplate(id){
            $.ajax({
                url: "{{ url('transaction/outcomingWood/getTemplate') }}",
                method: 'GET',
                data: {
                    id: id
                },
                success: function(result) {
                    $('#table-detail tbody').empty();
                    if(result.status == true){
                        var content = '';
                        $no = 1;
                        $.each(result.data, function(key, value) {
                            var sub_total_volume = 0;
                            content += '<tr>';
                            content += '<th>'+ $no++ +'</th>';
                            content += '<th>'+value.product_name+'</th>';
                            content += '<th>'+value.wood_type_name+'</th>';
                            content += '<th class="text-center">P</th>';
                            content += '<th class="text-center">L</th>';
                            content += '<th class="text-center">T</th>';
                            content += '<th class="text-center">PCS</th>';
                            content += '<th class="text-center">M3</th>';
                            content += '</tr>';
                            $.each(value.detail, function(key2, value2) {
                                content += '<tr>';
                                content += '<td></td>';
                                content += '<td></td>';
                                content += '<td></td>';
                                content += '<td><input style="border: none;width:100%" type="text" id="item2_length'+key+key2+'" name="item2_length['+key+']['+key2+']" value="'+value2.length+'" readonly></td>';
                                content += '<td><input style="border: none;width:100%" type="text" id="item2_width'+key+key2+'" name="item2_width['+key+']['+key2+']" value="'+value2.width+'" readonly></td>';
                                content += '<td><input style="border: none;width:100%" type="text" id="item2_height'+key+key2+'" name="item2_height['+key+']['+key2+']" value="'+value2.height+'" readonly></td>';
                                content += '<td><input style="border: none;width:100%" type="text" class="item2_qty" index="'+key+key2+'" id="item2_qty'+key2+'" name="item2_qty['+key+']['+key2+']"></td>';
                                content += '<td><input style="border: none;width:100%" type="text" id="item2_volume'+key+key2+'" name="item2_volume['+key+']['+key2+']" value="" readonly></td>';
                                content += '</tr>';
                                sub_total_volume += parseFloat(value2.volume);
                            });
                            content += '<td><input style="border: none;width:100%" type="hidden" id="item_product_id'+key+'" name="item_product_id['+key+']" value="'+value.product_id+'" readonly></td>';
                            content += '<td><input style="border: none;width:100%" type="hidden" id="item_wood_type_id'+key+'" name="item_wood_type_id['+key+']" value="'+value.wood_type_id+'" readonly></td>';
                            content += '<tr>';
                            content += '<td class="text-end" colspan="7">JML</td>';
                            content += '<td class="text-end"><input style="border: none;width:100%" type="text" id="item_sub_total_volume'+key+'" name="item_sub_total_volume[]" value="0" readonly></td>';
                            content += '</tr>';
                        });
                        content += '<tr>';
                        content += '<td class="text-start" colspan="7">Total Batang / Total Volume :</td>';
                        content += '<td class="text-end"><input style="text-align:right;border: none;width:100%" type="text" id="total_qty_volume" name="total_qty_volume" value="0" readonly></td>';
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
        @endif

        $(document).on('keyup', '.item2_qty', function() {
            var index = $(this).attr('index');
            var value = parseInt($(this).val());
            var length = parseInt($('#item2_length'+index).val());
            var width = parseInt($('#item2_width'+index).val());
            var height = parseInt($('#item2_height'+index).val());
            var volume = (length * width * height * value) / 1000000 ? (length * width * height * value) / 1000000 : 0;
            $('#item2_volume'+index).val(volume);
            update_total();
        });

        function update_total() {
            var form_data = $('#formOutcomingWood').serialize()

            $.ajax({
                url: "{{ url('transaction/outcomingWood/getTotal') }}",
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