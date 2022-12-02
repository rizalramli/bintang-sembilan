@php 
$total_qty = 0;
$total_volume = 0;
@endphp
<table>
    <tr>
       <th colspan="13">
            DAFTAR PENERIMAAN KAYU BULAT BERDASARKAN SAKR 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center" colspan="13">
            UD BINTANG SEMBILAN 
       </th> 
    </tr>

    <tr>
    </tr>

    <tr>
        <td rowspan="5" colspan="2">LOGO</td>
        <td>BULAN</td>
    </tr>
    <tr>
        <td>ALAMAT</td>
    </tr>
    <tr>
        <td>KECAMATAN</td>
    </tr>
    <tr>
        <td>KABUPATEN</td>
    </tr>
    <tr>
        <td>PROVINSI</td>
    </tr>

    <tr>
    </tr>

    <tr>
        <td colspan="4">
            PENERBITAN
        </td>
        <td colspan="4">
            ASAL HASIL HUTAN
        </td>
        <td colspan="5">
            TUJUAN ANGKUTAN
        </td>
    </tr>
    <tr>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">No</td>
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
        <td>{{$loop->iteration}}</td>
        <td>{{$item->serial_number}}</td>
        <td>{{$item->proof_ownership}}</td>
        <td>{{App\Helpers\Human::dateFormat($item->date)}}</td>
        <td>{{$item->supplier_name}}</td>
        <td></td>
        <td>LMJ</td>
        <td>Sengon</td>
        <td>{{$item->total_qty}}</td>
        <td>{{$item->total_volume}}</td>
        <td>UD Bintang Sembilan</td>
        <td>Grobogan Kd jajang</td>
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
        <td>UD. Bintang Sembilan</td>
    </tr>

    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="2">Muhammad Arif Munandar</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Fresty Nur Hidayati</td>
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