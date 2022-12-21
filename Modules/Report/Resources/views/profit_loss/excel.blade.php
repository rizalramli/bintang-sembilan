@php 
$sum_profit = 0;
$sum_expense = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="4">
            LABA RUGI DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="4">
            {{$month}} - {{$year}}
       </th> 
    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-size:10px">Pemasukan</td>
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($profit as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $sum_profit += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Total</td>
        <td>{{$sum_profit}}</td>
    </tr>

    <tr>
        <td colspan="4" style="text-align:center;font-size:10px">Pengeluaran</td>
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($loss as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $sum_expense += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Total</td>
        <td>{{$sum_expense}}</td>
    </tr>

    <tr>
        <td colspan="4"></td>
    </tr>

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