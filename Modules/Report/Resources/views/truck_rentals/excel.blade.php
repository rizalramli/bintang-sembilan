@php 
$sum_truck_cost = 0;
$sum_driver_cost = 0;
$sum_solar_cost = 0;
$sum_damage_cost = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="11">
            DAFTAR PENYEWAAN TRUK DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="11">
            {{$month}} - {{$year}}
       </th> 
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Nopol</td>
        <td>Sopir</td>
        <td>Tempat Muat</td>
        <td>Tujuan</td>
        <td>Ongkos Truck</td>
        <td>Gaji Sopir</td>
        <td>Biaya Solar</td>
        <td>Biaya Kerusakan</td>
        <td>Keterangan</td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->number_vehicles}}</td>
        <td>{{$value->driver_name}}</td>
        <td>{{$value->loading_place}}</td>
        <td>{{$value->purpose}}</td>
        <td>{{$value->truck_cost}}</td>
        <td>{{$value->driver_cost}}</td>
        <td>{{$value->solar_cost}}</td>
        <td>{{$value->damage_cost}}</td>
        <td>{{$value->description}}</td>
    </tr>
    @php
        $sum_truck_cost += $value->truck_cost;
        $sum_driver_cost += $value->driver_cost;
        $sum_solar_cost += $value->solar_cost;
        $sum_damage_cost += $value->damage_cost;
    @endphp
    @endforeach
    <tr>
        <td colspan="6" style="text-align:right"><b>Jumlah</b></td>
        <td>{{$sum_truck_cost}}</td>
        <td>{{$sum_driver_cost}}</td>
        <td>{{$sum_solar_cost}}</td>
        <td>{{$sum_damage_cost}}</td>
        <td></td>
    </tr>
    <tr></tr>
    @php 
    $sum_profit = $sum_truck_cost;
    $sum_expense = $sum_driver_cost + $sum_solar_cost + $sum_damage_cost;
    @endphp 
    @if($sum_profit > $sum_expense)
    <tr>
        <td colspan="9" style="text-align:right"><b>Laba</b></td>
        <td>{{$sum_profit - $sum_expense}}</td>
    </tr>
    @else
    <tr>
        <td colspan="9" style="text-align:right"><b>Rugi</b></td>
        <td>{{$sum_expense - $sum_profit}}</td>
    </tr>
    @endif
</table>