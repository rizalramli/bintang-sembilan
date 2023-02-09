@php 
$sum = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="4">
            DAFTAR OPERASIONAL DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="4">
            {{$month}} - {{$year}}
       </th> 
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Deskripsi</td>
        <td>Jumlah</td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->amount}}</td>
    </tr>
    @php
        $sum += $value->amount;
    @endphp
    @endforeach
    <tr>
        <td colspan="3" style="text-align:right">Jumlah</td>
        <td>{{$sum}}</td>
    </tr>
</table>