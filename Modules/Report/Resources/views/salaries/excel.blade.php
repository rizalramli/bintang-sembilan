@php 
$sum = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="7">
            DAFTAR PENGGAJIAN DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="7">
            {{$month}} - {{$year}}
       </th> 
    </tr>
    <tr>
        <td>No</td>
        <td>Tanggal</td>
        <td>Mandor</td>
        <td>Deskripsi</td>
        <td>Harga / m3</td>
        <td>Volume</td>
        <td>Total Gaji</td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{App\Helpers\Human::dateFormat($value->date)}}</td>
        <td>{{$value->users_name}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->price}}</td>
        <td>{{$value->volume}}</td>
        <td>{{$value->total}}</td>
    </tr>
    @php
        $sum += $value->total;
    @endphp
    @endforeach
    <tr>
        <td colspan="6" style="text-align:right">Jumlah</td>
        <td>{{$sum}}</td>
    </tr>
</table>