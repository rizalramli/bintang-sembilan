@php 
$total_qty = 0;
$total_volume = 0;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="13">
            DAFTAR PENERIMAAN KAYU BULAT BERDASARKAN {{$type}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:15px" colspan="13">
            <b>{{strtoupper($company->name)}}</b>
       </th> 
    </tr>

    <tr>
    </tr>

    <tr>
        <td rowspan="5" colspan="2"></td>
        <td>BULAN</td>
        <td colspan="2">{{$month}}</td>
    </tr>
    <tr>
        <td>ALAMAT</td>
        <td colspan="2">{{$company->address}}</td>
    </tr>
    <tr>
        <td>KECAMATAN</td>
        <td colspan="2">{{$company->district}}</td>
    </tr>
    <tr>
        <td>KABUPATEN</td>
        <td colspan="2">{{$company->city}}</td>
    </tr>
    <tr>
        <td>PROVINSI</td>
        <td colspan="2">{{$company->province}}</td>
    </tr>

    <tr>
    </tr>

    <tr>
        <td style="text-align:center;" colspan="4">
            PENERBITAN
        </td>
        <td style="text-align:center;" colspan="4">
            ASAL HASIL HUTAN
        </td>
        <td style="text-align:center;" colspan="5">
            TUJUAN ANGKUTAN
        </td>
    </tr>
    <tr>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">NO</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">No. Seri SAKR</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Bukti Kepemilikan</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Tanggal</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Nama Pengirim</td>
            <td colspan="2" style="text-align:center">Alamat Lengkap</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Jenis HH</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Batang</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Volume (M3/SM)</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Nama Perusahaan</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Alamat Lengkap</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">NOPOL</td>
    </tr>
    <tr>
        <td style="text-align:center">Desa dan Kecamatan</td>
        <td style="text-align:center">Kota</td>
    </tr>
    @foreach($data as $item)
    <tr>
        <td style="text-align: center;">{{$loop->iteration}}</td>
        <td>{{$item->serial_number}}</td>
        <td>{{$item->proof_ownership}}</td>
        <td>{{App\Helpers\Human::dateFormat($item->date)}}</td>
        <td>{{$item->supplier_name}}</td>
        <td>{{$item->supplier_address}}</td>
        <td>{{$item->supplier_city}}</td>
        <td>{{$item->wood_type_name}}</td>
        <td>{{$item->total_qty}}</td>
        <td>{{$item->total_volume}}</td>
        <td>{{$company->name}}</td>
        <td>{{$company->address}}</td>
        <td>{{$item->number_vehicles}}</td>
    </tr>
    @php
        $total_qty += $item->total_qty;
        $total_volume += $item->total_volume;
    @endphp
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" style="text-align:center">Jumlah</td>
        <td>{{$total_qty}}</td>
        <td>{{$total_volume}}</td>
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
        <td></td>
        <td></td>
        <td></td>
        <td>Lumajang, </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Mengetahui</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$company->name}}</td>
    </tr>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="2">{{$company->owner}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ Auth::user()->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Direktur</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>STAF TUK</td>
    </tr>
</table>