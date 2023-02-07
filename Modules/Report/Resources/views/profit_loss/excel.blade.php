@php 
$balken_keluar = $outcoming_wood_balken->sum('amount');
$kayu_keluar = $outcoming_wood_all->sum('amount');
$log_sengon_masuk = $incoming_wood->sum('amount');
$operasional = $operasional->sum('amount');
$sum_profit = 0;
$sum_expense = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="3">
            HASIL DAN LABA DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="3">
            {{$month}} - {{$year}}
       </th> 
    </tr>
    <tr>
        <td>No</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Balken Keluar</td>
        <td>{{$balken_keluar}}</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Kayu Keluar</td>
        <td>{{$kayu_keluar}}</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Log Sengon Masuk</td>
        <td>{{$log_sengon_masuk}}</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Operasional</td>
        <td>{{$operasional}}</td>
    </tr>
    @php 
    $sum_profit = $balken_keluar + $kayu_keluar;
    $sum_expense = $log_sengon_masuk + $operasional;
    $sum_laba = $sum_profit - $sum_expense;
    @endphp 

    @if($sum_profit > $sum_expense)
    <tr>
        <td>5</td>
        <td>Laba</td>
        <td>{{$sum_laba}}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Zakat Mal</td>
        <td>{{ $sum_laba * 0.025  }}</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Bersih</td>
        <td>{{ $sum_laba * 0.975  }}</td>
    </tr>
    @else
    <tr>
        <td>5</td>
        <td>Rugi</td>
        <td>{{$sum_expense - $sum_profit}}</td>
    </tr>
    @endif
</table>