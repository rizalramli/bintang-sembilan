<style>
    .bold{
        font-weight: bold;
    }
    .font-10{
        font-size: 10px;
    }
    .font-12{
        font-size: 12px;
    }
    .font-50{
        font-size: 50px;
    }
    .text-center{
        text-align: center;
    }
    .text-left{
        text-align: left;
    }
    .text-right{
        text-align: right;
    }
    .bg-brown{
        background-color: #948A54;
    }
    .py-23{
        padding-top: 23px;
        padding-bottom: 23px;
    }
    .border-collapse{
        border-collapse: collapse;
    }
    .border-none{
        border: none !important;
    }
    table tr td{
        padding: 1.5px 2.5px;
    }
</style>
<table width="100%">
    <tr>
        <td width="20%" rowspan="3">
            <div class="text-right">
                <img src="{{ asset('images/logo/' . $company->logo) }}" width="50px" height="50px">
            </div>
        </td>
        <td width="60%" class="bold text-center font-15">{{$company->name}}</td>
        <td width="20%" rowspan="3"></td>
    </tr>
    <tr>
        <td class="font-12 text-center">{{$company->address}}</td>
    </tr>
    <tr>
        <td class="font-12 text-center">Kecamatan {{$company->district}}, Kabupaten {{$company->city}} {{$company->province}} 67358</td>
    </tr>
    <tr>
        <td colspan="3"><hr></td>
    </tr>
    <tr>
        <td colspan="3" class="bold text-center font-12">Nota Perusahaan</td>
    </tr>
    <tr>
        <td colspan="3" class="text-center font-12">Nomor : {{$outcomingWood->serial_number}}</td>
    </tr>
</table>
<br>
<table width="100%">
    <tr>
        <td width="5%">&nbsp;</td>
        <td width="14%" class="font-12">PROVINSI</td>
        <td width="1%" class="font-12">:</td>
        <td width="36%" class="font-12">{{$company->province}}</td>
        <td width="15%" class="font-12">MASA BERLAKU</td>
        <td width="1%" class="font-12">:</td>
        <td width="25%" class="font-12">{{$diff}} Hari</td>
        <td width="5%"></td>
    </tr>
    <tr>
        <td width="5%">&nbsp;</td>
        <td width="10%" class="font-12">KABUPATEN</td>
        <td width="1%" class="font-12">:</td>
        <td width="20%" class="font-12">{{$company->city}}</td>
        <td width="10%" class="font-12">DARI TANGGAL</td>
        <td width="1%" class="font-12">:</td>
        <td width="20%" class="font-12">{{\App\Helpers\Human::dateFormat($date_start)}} sd {{\App\Helpers\Human::dateFormat($date_end)}}</td>
        <td width="5%"></td>
    </tr>
</table>
<br>
<table width="100%" border="1" class="border-collapse">
    <tr>
        <td width="45%" colspan="2" class="font-12 bold text-center bg-brown">PENGIRIM</td>
        <td width="10%" style="border-top-style: hidden;border-bottom-style: hidden;"></td>
        <td width="45%" colspan="2" class="font-12 bold text-center bg-brown">PENERIMA</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Nama</td>
        <td width="30%" class="font-12 text-left">{{$company->name}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Nama</td>
        <td width="30%" class="font-12 text-left">{{$outcomingWood->customer_name}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Alamat</td>
        <td width="30%" class="font-12 text-left">{{$company->address}} Kecamatan {{$company->district}} Kabupaten {{$company->city}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Alamat</td>
        <td width="30%" class="font-12 text-left">{{$outcomingWood->customer_address}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Telp Fax No</td>
        <td width="30%" class="font-12 text-left">{{$company->phone}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Telp Fax No</td>
        <td width="30%" class="font-12 text-left">{{$outcomingWood->customer_phone}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Lokasi Muat</td>
        <td width="30%" class="font-12 text-left">{{$company->address}} Kecamatan {{$company->district}} Kabupaten {{$company->city}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td rowspan="2" width="15%" class="font-12 text-left">Lokasi Bongkar</td>
        <td rowspan="2" width="30%" class="font-12 text-left">{{$outcomingWood->customer_address}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Unit Muat</td>
        <td width="30%" class="font-12 text-left">Truck : {{$outcomingWood->number_vehicles}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
    </tr>
</table>
<br>
<table border="1" width="100%" class="border-collapse">
    <tr>
        <td colspan="9" class="bold font-12 text-center bg-brown">REKAPITULASI KAYU YANG DI ANGKUT</td>
    </tr>
    <tr>
        <td class="font-12 bold text-center">NO</td>
        <td class="font-12 bold text-center">PRODUK</td>
        <td class="font-12 bold text-center">JENIS KAYU</td>
        <td colspan="3" class="font-12 bold text-center">UKURAN</td>
        <td colspan="2" class="font-12 bold text-center">VOLUME</td>
        <td rowspan="2" class="font-12 bold text-center">KETERANGAN</td>
    </tr>
    @foreach($outcomingWoodDetail as $detail)
    <tr>
        <td class="font-12 text-center">{{$loop->iteration}}</td>
        <td class="font-12 text-center">{{$detail->product_name}}</td>
        <td class="font-12 text-center">{{$detail->wood_type_name}}</td>
        <td class="font-12 text-center">P</td>
        <td class="font-12 text-center">L</td>
        <td class="font-12 text-center">T</td>
        <td class="font-12 text-center">PCS</td>
        <td class="font-12 text-center">M3</td>
    </tr>
        @foreach($detail->detail as $item)
        <tr>
            <td class="font-12 text-center"></td>
            <td class="font-12 text-center"></td>
            <td class="font-12 text-center"></td>
            <td class="font-12 text-center">{{$item->length}}</td>
            <td class="font-12 text-center">{{$item->width}}</td>
            <td class="font-12 text-center">{{$item->height}}</td>
            <td class="font-12 text-right">{{$item->qty}}</td>
            <td class="font-12 text-right">{{$item->volume}}</td>
            @if($loop->iteration == 1)
            <td class="font-12 text-left">{{$outcomingWood->description}}</td>
            @else
            <td class="font-12 text-left"></td>
            @endif
        </tr>
        @endforeach
    @endforeach
    <tr>
        <td></td>
        <td colspan="5" class="font-12 text-center bold">TOTAL</td>
        <td class="font-12 text-right">{{$outcomingWood->total_qty}}</td>
        <td class="font-12 text-right">{{$outcomingWood->total_volume}}</td>
        <td></td>
    </tr>
</table>
<br>
<table width="100%" border="1" class="border-collapse">
    <tr>
        <td width="45%" colspan="2" class="font-12 bold text-center bg-brown">PENERBIT</td>
        <td width="10%" style="border-top-style: hidden;border-bottom-style: hidden;"></td>
        <td width="45%" colspan="2" class="font-12 bold text-center bg-brown">PENERIMA</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Nama Penerbit / Pemilik Kayu</td>
        <td width="30%" class="font-12 text-left">{{$company->owner}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Nama Penerima</td>
        <td width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Nomor Register</td>
        <td width="30%" class="font-12 text-left"></td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Tanggal Penerima</td>
        <td width="30%" class="font-12 text-left"></td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Tanggal Penerbit</td>
        <td width="30%" class="font-12 text-left">{{\App\Helpers\Human::dateFormat(date('Y-m-d'))}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td rowspan="2" width="15%" class="font-12 text-left">Tanda Tangan Penerima</td>
        <td rowspan="2" width="30%" class="font-12 text-left"></td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left py-23">Tanda Tangan Penerbit</td>
        <td width="30%" class="font-12 text-left py-23"></td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
    </tr>
</table>
