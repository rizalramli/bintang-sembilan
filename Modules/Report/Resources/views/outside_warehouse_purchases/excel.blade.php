@php 
$sum_total_qty_sj = 0;
$sum_total_volume_sj = 0;
$sum_total_qty_tally = 0;
$sum_total_volume_tally = 0;
$sum_total_qty_afkir = 0;
$sum_total_volume_afkir = 0;
$sum_payment_factory = 0;
$sum_fare_down = 0;
$sum_grand_total = 0;
$sum_fee = 0;
$sum_paid = 0;
$sum_fare_truck = 0;
$sum_down_payment = 0;
$sum_nett = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="18">
            DAFTAR Pembelian Gudang Luar DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="18">
            {{$month}} - {{$year}}
       </th> 
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Nopol</td>
        <td>Gudang Asal</td>
        <td>Tujuan</td>
        <td>Btg SJ</td>
        <td>Volume SJ</td>
        <td>Btg Tally</td>
        <td>Volume Tally</td>
        <td>Btg Afkir</td>
        <td>Volume Afkir</td>
        <td>Uang Pabrik</td>
        <td>Ongkos Turun</td>
        <td>Grand Total</td>
        <td>Fee</td>
        <td>Yang Dibayar</td>
        <td>Ongkos Truck</td>
        <td>Bersih</td>
        <td>DP</td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->number_vehicles}}</td>
        <td>{{$value->warehouse_name}}</td>
        <td>{{$value->destination}}</td>
        <td>{{$value->total_qty_sj}}</td>
        <td>{{$value->total_volume_sj}}</td>
        <td>{{$value->total_qty_tally}}</td>
        <td>{{$value->total_volume_tally}}</td>
        <td>{{$value->total_qty_afkir}}</td>
        <td>{{$value->total_volume_afkir}}</td>
        <td>{{$value->payment_factory}}</td>
        <td>{{$value->fare_down}}</td>
        <td>{{$value->grand_total}}</td>
        <td>{{$value->fee}}</td>
        <td>{{$value->paid}}</td>
        <td>{{$value->fare_truck}}</td>
        <td>{{$value->nett}}</td>
        <td>{{$value->down_payment}}</td>
    </tr>
    @php
        $sum_total_qty_sj += $value->total_qty_sj;
        $sum_total_volume_sj += $value->total_volume_sj;
        $sum_total_qty_tally += $value->total_qty_tally;
        $sum_total_volume_tally += $value->total_volume_tally;
        $sum_total_qty_afkir += $value->total_qty_afkir;
        $sum_total_volume_afkir += $value->total_volume_afkir;
        $sum_payment_factory += $value->payment_factory;
        $sum_fare_down += $value->fare_down;
        $sum_grand_total += $value->grand_total;
        $sum_fee += $value->fee;
        $sum_paid += $value->paid;
        $sum_fare_truck += $value->fare_truck;
        $sum_nett += $value->nett;
        $sum_down_payment += $value->down_payment;
    @endphp
    @endforeach
    <tr>
        <td colspan="5" style="text-align:right">JUMLAH</td>
        <td>{{$sum_total_qty_sj}}</td>
        <td>{{$sum_total_volume_sj}}</td>
        <td>{{$sum_total_qty_tally}}</td>
        <td>{{$sum_total_volume_tally}}</td>
        <td>{{$sum_total_qty_afkir}}</td>
        <td>{{$sum_total_volume_afkir}}</td>
        <td>{{$sum_payment_factory}}</td>
        <td>{{$sum_fare_down}}</td>
        <td>{{$sum_grand_total}}</td>
        <td>{{$sum_fee}}</td>
        <td>{{$sum_paid}}</td>
        <td>{{$sum_fare_truck}}</td>
        <td>{{$sum_nett}}</td>
        <td>{{$sum_down_payment}}</td>
    </tr>
</table>