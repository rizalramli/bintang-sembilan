@php 
$total_qty = 0;
$total_volume = 0;
$total_qty_tally = 0;
$total_volume_tally = 0;
$total_qty_afkir = 0;
$total_volume_afkir = 0;
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
        <td colspan="12" style="font-weight:bold;text-align:center;">Penerbitan NOTA PERUSAHAAN</td>
        <td rowspan="3" style="vertical-align : middle;text-align:center;">Ket</td>
        <td rowspan="3" style="vertical-align : middle;text-align:center;">Uang</td>
    </tr>

    <tr>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">NO. Seri</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">NO. Seri Pabrik</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Tanggal</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Jenis HH</td>
        <td colspan="6" style="text-align:center;">Satuan</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Tujuan Pengangkutan</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;">Jenis Alat Angkut</td>
    </tr>

    <tr>
        <td style="text-align:center;">Btg SJ</td>
        <td style="text-align:center;">M3 SJ</td>
        <td style="text-align:center;">Btg Tally</td>
        <td style="text-align:center;">M3 Tally</td>
        <td style="text-align:center;">Btg Afkir</td>
        <td style="text-align:center;">M3 Afkir</td>
    </tr>

    @foreach($data as $item)
    <tr>
        <td style="text-align: center;">{{$loop->iteration}}</td>
        <td>{{$item->serial_number}}</td>
        <td>{{$item->serial_number_factory}}</td>
        <td>{{App\Helpers\Human::dateFormat($item->date)}}</td>
        <td>GERGAJIAN SENGON</td>
        <td style="text-align: right;">{{$item->total_qty}}</td>
        <td style="text-align: right;">{{$item->total_volume}}</td>
        <td style="text-align: right;">{{$item->total_qty_tally}}</td>
        <td style="text-align: right;">{{$item->total_volume_tally}}</td>
        <td style="text-align: right;">{{$item->total_qty_afkir}}</td>
        <td style="text-align: right;">{{$item->total_volume_afkir}}</td>
        <td>{{$item->customer_name}}</td>
        <td>{{$item->number_vehicles}}</td>
        <td>{{$item->description}}</td>
        <td>{{$item->amount ?? 0}}</td>
    </tr>
    @php
        $total_qty += $item->total_qty;
        $total_volume += $item->total_volume;
        $total_qty_tally += $item->total_qty_tally;
        $total_volume_tally += $item->total_volume_tally;
        $total_qty_afkir += $item->total_qty_afkir;
        $total_volume_afkir += $item->total_volume_afkir;
        $total += $item->amount;
    @endphp
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:right">Jumlah</td>
        <td style="text-align: right;">{{$total_qty}}</td>
        <td style="text-align: right;">{{$total_volume}}</td>
        <td style="text-align: right;">{{$total_qty_tally}}</td>
        <td style="text-align: right;">{{$total_volume_tally}}</td>
        <td style="text-align: right;">{{$total_qty_afkir}}</td>
        <td style="text-align: right;">{{$total_volume_afkir}}</td>
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