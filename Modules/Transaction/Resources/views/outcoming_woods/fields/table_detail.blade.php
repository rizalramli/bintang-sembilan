<div class="form-group col-sm-12 mb-1">
    <h4>Detail Kayu</h4>
    <table width="100%" class="table table-bordered" id="table-detail">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="5%" class="text-center">Produk</th>
                <th width="5%" class="text-center">Jenis Kayu</th>
                <th width="30%" class="text-center" colspan="3">Ukuran</th>
                <th width="30%" class="text-center" colspan="2">Volume</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($outcomingWood))
            @php 
            $sum_sub_total_volume = 0;
            $sum_qty = 0;
            @endphp 
            @foreach($outcomingWoodDetail as $key => $item)
                <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td>
                        {{ $item->product_name }}
                        <input type="hidden" id="item_product_id{{$key}}" name="item_product_id[{{$key}}]" value="{{ $item->product_id }}">
                    </td>
                    <td>
                        {{ $item->wood_type_name }}
                        <input type="hidden" id="item_wood_type_id{{$key}}" name="item_wood_type_id[{{$key}}]" value="{{ $item->wood_type_id }}">
                    </td>
                    <td class="text-center">P</td>
                    <td class="text-center">L</td>
                    <td class="text-center">T</td>
                    <td class="text-center">PCS</td>
                    <td class="text-center">M3</td>
                </tr>
                @foreach($item->detail as $key2 => $item2)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input style="border: none;width:100%" type="text" id="item2_length{{$key.$key2}}" name="item2_length[{{$key}}][{{$key2}}]" value="{{ $item2->length }}" readonly>
                        </td>
                        <td>
                            <input style="border: none;width:100%" type="text" id="item2_width{{$key.$key2}}" name="item2_width[{{$key}}][{{$key2}}]" value="{{ $item2->width }}" readonly>
                        </td>
                        <td>
                            <input style="border: none;width:100%" type="text" id="item2_height{{$key.$key2}}" name="item2_height[{{$key}}][{{$key2}}]" value="{{ $item2->height }}" readonly>
                        </td>
                        <td>
                            <input class="item2_qty" index="{{$key.$key2}}" style="border: none;width:100%" type="text" id="item2_qty{{$key.$key2}}" name="item2_qty[{{$key}}][{{$key2}}]" value="{{ $item2->qty }}">
                        </td>
                        <td>
                            <input style="text-align:right;border: none;width:100%" type="text" id="item2_volume{{$key.$key2}}" name="item2_volume[{{$key}}][{{$key2}}]" value="{{ $item2->volume }}" readonly>
                        </td>
                    </tr>
                    @php 
                    $sum_qty += $item2->qty;
                    @endphp
                @endforeach
            <tr>
                <td class="text-end" colspan="7">JML</td>
                <td class="text-end">
                    <input style="text-align:right;border: none;width:100%" type="text" id="item_sub_total_volume{{$key}}" name="item_sub_total_volume[]" value="{{ $item->sub_total_volume }}" readonly>
                </td>
            </tr>
            @php 
            $sum_sub_total_volume += $item->sub_total_volume;
            @endphp
            @endforeach
            <tr>
                <td class="text-end" colspan="7">Total Batang / Total Volume</td>
                <td class="text-end">
                    <input style="text-align:right;border: none;width:100%" type="text" id="total_qty_volume" name="total_qty_volume" value="{{$sum_qty}} / {{$sum_sub_total_volume}}" readonly>
                </td>
            </tr>
            @endif
        </tbody>
    </table>   
</div>