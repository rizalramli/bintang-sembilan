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
                                content += '<td><input style="text-align:right;border: none;width:100%" type="text" id="item2_volume'+key+key2+'" name="item2_volume['+key+']['+key2+']" value="" readonly></td>';
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

        var wood_type_id = $('#wood_type_out_id').val();

        hiddenDetail(wood_type_id);

        $(document).on('change', '#wood_type_out_id', function() {
            var wood_type_id = $(this).val();
            hiddenDetail(wood_type_id);
        });

        function hiddenDetail(wood_type_id){
            if(wood_type_id == '1'){
                $("#total_qty").attr("readonly", true); 
                $("#total_volume").attr("readonly", true); 
                $('#detailProduk').show();
            } else {
                $("#total_qty").attr("readonly", false); 
                $("#total_volume").attr("readonly", false); 
                $('#detailProduk').hide();
            }
        }

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

        $('#result').on('keyup', function () {
            var result = $(this).val();
            result = result.replace(/\./g, '');
            var fee = $('#fee').val();
            fee = fee.replace(/\./g, '');
            var fare_truck = $('#fare_truck').val();
            fare_truck = fare_truck.replace(/\./g, '');
            var total = parseInt(result) - parseInt(fee) - parseInt(fare_truck);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#nett').val(total);
        });

        $('#fee').on('keyup', function () {
            var result = $('#result').val();
            result = result.replace(/\./g, '');
            var fee = $(this).val();
            fee = fee.replace(/\./g, '');
            var fare_truck = $('#fare_truck').val();
            fare_truck = fare_truck.replace(/\./g, '');
            var total = parseInt(result) - parseInt(fee) - parseInt(fare_truck);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#nett').val(total);
        });

        $('#fare_truck').on('keyup', function () {
            var result = $('#result').val();
            result = result.replace(/\./g, '');
            var fee = $('#fee').val();
            fee = fee.replace(/\./g, '');
            var fare_truck = $(this).val();
            fare_truck = fare_truck.replace(/\./g, '');
            var total = parseInt(result) - parseInt(fee) - parseInt(fare_truck);
            total = parseInt(total);
            if(total < 0)
            {
                total = 0;
            }
            total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            $('#nett').val(total);
        });
    });
</script>
@endpush