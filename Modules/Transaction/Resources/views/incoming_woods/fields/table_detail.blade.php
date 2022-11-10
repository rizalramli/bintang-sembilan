<div class="form-group col-sm-12 mb-1">
    <h4>Detail Kayu</h4>
    <table width="100%" class="table table-bordered" id="table-detail">
        <thead>
            <tr>
                <th width="5%" class="text-center">DM</th>
                <th width="65%" class="text-center">BATANG</th>
                <th width="10%" class="text-center">JML BTG</th>
                <th width="5%" class="text-center">VOLUME</th>
                <th width="15%" class="text-center">JML VLM</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($incomingWood))
            @php 
            $sum_sub_total_volume = 0;
            $sum_qty = 0;
            @endphp 
            @foreach($incomingWoodDetail as $key => $item)
                @foreach($item->detail as $key2 => $item2)
                    <tr>
                        <td>
                            <input style="border: none;width:100%" type="text" id="item2_diameter{{$key.$key2}}" name="item2_diameter[{{$key}}][{{$key2}}]" value="{{ $item2->diameter }}" readonly>
                        </td>
                        <td>||||| |||||</td>
                        <td class="text-end">
                            <input class="item2_qty" style="border: none;width:100%" type="text" id="item2_qty{{$key.$key2}}" name="item2_qty[{{$key}}][{{$key2}}]" value="{{ $item2->qty }}">
                        </td>
                        <td class="text-end">
                            <input style="border: none;width:100%" type="text" id="item2_volume{{$key.$key2}}" name="item2_volume[{{$key}}][{{$key2}}]" value="{{ $item2->volume }}" readonly>
                        </td>
                    </tr>
                    @php 
                    $sum_qty += $item2->qty;
                    @endphp
                @endforeach
            <tr>
                <td class="text-end" colspan="4">JML</td>
                <td class="text-end">
                    <input style="border: none;width:100%" type="text" id="item_sub_total_volume{{$key}}" name="item_sub_total_volume[]" value="{{ $item->sub_total_volume }}" readonly>
                </td>
            </tr>
            @php 
            $sum_sub_total_volume += $item->sub_total_volume;
            @endphp
            @endforeach
            <tr>
                <td class="text-start" colspan="4">JUMLAH :</td>
                <td class="text-start">{{$sum_qty.' / '.$sum_sub_total_volume}}</td>
            </tr>
            @endif
        </tbody>
    </table>   
</div>