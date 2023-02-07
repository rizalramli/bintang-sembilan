@php 
$total_qty = 0;
$total_volume = 0;
$total = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="9">
            LAPORAN PENERBITAN NOTA PERUSAHAAN 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:15px" colspan="9">
            <b>Bulan : {{strtoupper($month)}}</b>
       </th> 
    </tr>

    <tr>
    </tr>

    <tr>
        <td></td>
        <td>Nama Perusahan</td>
        <td colspan="2">{{strtoupper($company->name)}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Provinsi</td>
        <td>{{strtoupper($company->province)}}</td>
    </tr>

    <tr>
        <td></td>
        <td>Alamat Perusahan</td>
        <td colspan="2">{{strtoupper($company->address)}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Kabupaten/Kota</td>
        <td>{{strtoupper($company->city)}}</td>
    </tr>

    <tr>
        <td></td>
        <td>Nomor Telepon Perusahan</td>
        <td colspan="2">{{strtoupper($company->phone)}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Lokasi Penerbitan</td>
        <td>{{strtoupper($company->city)}}</td>
    </tr>

    <tr>
    </tr>

    <tr>
        <td rowspan="3" style="vertical-align : middle;text-align:center;">NO</td>
        <td colspan="7" style="font-weight:bold;text-align:center;">Penerbitan NOTA PERUSAHAAN</td>
        <td rowspan="3" style="vertical-align : middle;text-align:center;">Ket</td>
        <td rowspan="3" style="vertical-align : middle;text-align:center;">Uang</td>
    </tr>

    <tr>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">NO. Seri</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Tanggal</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Jenis HH</td>
        <td colspan="2" style="text-align:center;">Satuan</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Tujuan Pengangkutan</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Jenis Alat Angkut</td>
    </tr>

    <tr>
        <td style="text-align:center;">Btg</td>
        <td style="text-align:center;">M3</td>
    </tr>

    <tr>
        <td style="text-align:center;">1</td>
        <td style="text-align:center;">2</td>
        <td style="text-align:center;">3</td>
        <td style="text-align:center;">4</td>
        <td style="text-align:center;">5</td>
        <td style="text-align:center;">6</td>
        <td style="text-align:center;">7</td>
        <td style="text-align:center;">8</td>
        <td style="text-align:center;">9</td>
        <td style="text-align:center;">10</td>
    </tr>
    @foreach($data as $item)
    <tr>
        <td style="text-align: center;">{{$loop->iteration}}</td>
        <td>{{$item->serial_number}}</td>
        <td>{{App\Helpers\Human::dateFormat($item->date)}}</td>
        <td>GERGAJIAN SENGON</td>
        <td style="text-align: right;">{{$item->total_qty}}</td>
        <td style="text-align: right;">{{$item->total_volume}}</td>
        <td>{{$item->customer_name}}</td>
        <td>{{$item->number_vehicles}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->amount ?? 0}}</td>
    </tr>
    @php
        $total_qty += $item->total_qty;
        $total_volume += $item->total_volume;
        $total += $item->amount;
    @endphp
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:center">Jumlah</td>
        <td style="text-align: center;">{{$total_qty}}</td>
        <td style="text-align: center;">{{$total_volume}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$total}}</td>
    </tr>

    <tr>
    </tr>
    <tr>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2">Lumajang, </td>
    </tr>
    <tr>
        <td></td>
        <td>Mengetahui</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2">{{$company->name}}</td>
    </tr>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="2">{{$company->owner}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2">{{ Auth::user()->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2">Direktur</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2">STAF TUK</td>
    </tr>
</table>