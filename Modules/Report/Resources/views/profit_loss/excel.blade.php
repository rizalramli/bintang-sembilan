@php 
$balken_keluar = 0;
$kayu_keluar = 0;
$log_sengon_masuk = 0;
$sum_operasional = 0;
$sum_profit = 0;
$sum_expense = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="4">
            LABA DAN HASIL DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="4">
            {{$month}} - {{$year}}
       </th> 
    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-size:10px">Balken Keluar</td>
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($outcoming_wood_balken as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $balken_keluar += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Total</td>
        <td>{{$balken_keluar}}</td>
    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-size:10px">Kayu Keluar</td>
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($outcoming_wood_all as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $kayu_keluar += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Total</td>
        <td>{{$kayu_keluar}}</td>
    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-size:10px">Log Sengon Masuk</td>
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($incoming_wood as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $log_sengon_masuk += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Total</td>
        <td>{{$log_sengon_masuk}}</td>
    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-size:10px">Operasional</td>
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($operasional as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $sum_operasional += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Total</td>
        <td>{{$sum_operasional}}</td>
    </tr>

    <tr>
        <td colspan="4"></td>
    </tr>
    @php 
    $sum_profit = $balken_keluar + $kayu_keluar;
    $sum_expense = $log_sengon_masuk + $sum_operasional;
    @endphp 

    @if($sum_profit > $sum_expense)
    <tr>
        <td colspan="3" style="text-align:right">Laba</td>
        <td>{{$sum_profit - $sum_expense}}</td>
    </tr>
    @else
    <tr>
        <td colspan="3" style="text-align:right">Rugi</td>
        <td>{{$sum_expense - $sum_profit}}</td>
    </tr>
    @endif
</table>