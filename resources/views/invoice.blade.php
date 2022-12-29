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
        padding: 2.5px;
    }
</style>
@php
$company = \Modules\Master\Models\Company::find(1)->first();
@endphp
<table width="100%">
    <tr>
        <td width="20%" rowspan="3">
            <div class="text-right">
                <img src="{{ asset('images/logo/' . $company->logo) }}" width="50px" height="50px">
            </div>
        </td>
        <td width="60%" class="bold text-center font-15">UD. Bintang Sembilan</td>
        <td width="20%" rowspan="3"></td>
    </tr>
    <tr>
        <td class="font-12 text-center">Dusun Krajan RT.03 RW.01 Kelurahan Grobogan</td>
    </tr>
    <tr>
        <td class="font-12 text-center">Kecamatan Kedungjajang, Kabupaten Lumajang Jawa Timur 67358</td>
    </tr>
    <tr>
        <td colspan="3"><hr></td>
    </tr>
    <tr>
        <td colspan="3" class="bold text-center font-12">Nota Perusahaan</td>
    </tr>
    <tr>
        <td colspan="3" class="text-center font-12">Nomor : 121212/BSP/2022</td>
    </tr>
</table>
<br>
<table width="100%">
    <tr>
        <td width="5%">&nbsp;</td>
        <td width="14%" class="font-12">PROVINSI</td>
        <td width="1%" class="font-12">:</td>
        <td width="36%" class="font-12">Jawa Timur</td>
        <td width="15%" class="font-12">MASA BERLAKU</td>
        <td width="1%" class="font-12">:</td>
        <td width="25%" class="font-12">3 Hari</td>
        <td width="5%"></td>
    </tr>
    <tr>
        <td width="5%">&nbsp;</td>
        <td width="10%" class="font-12">KABUPATEN</td>
        <td width="1%" class="font-12">:</td>
        <td width="20%" class="font-12">Lumajang</td>
        <td width="10%" class="font-12">DARI TANGGAL</td>
        <td width="1%" class="font-12">:</td>
        <td width="20%" class="font-12">12/10/22 sd 10/12/22</td>
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
        <td width="15%" class="font-12 text-left">NAMA</td>
        <td width="30%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">NAMA</td>
        <td width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">ALAMAT</td>
        <td width="30%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">ALAMAT</td>
        <td width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">TELP FAX NO</td>
        <td width="30%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">TELP FAX NO</td>
        <td width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">LOKASI MUAT</td>
        <td width="30%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td rowspan="2" width="15%" class="font-12 text-left">LOKASI BONGKAR</td>
        <td rowspan="2" width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">UNIT MUAT</td>
        <td width="30%" class="font-12 text-left">Truck : </td>
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
    <tr>
        <td class="font-12 text-center">1</td>
        <td class="font-12 text-center">Kayu Gergajian</td>
        <td class="font-12 text-center">Sengon</td>
        <td class="font-12 text-center">P</td>
        <td class="font-12 text-center">L</td>
        <td class="font-12 text-center">T</td>
        <td class="font-12 text-center">PCS</td>
        <td class="font-12 text-center">M3</td>
    </tr>
    @for($i=1;$i<=20;$i++)
    <tr>
        <td class="font-12 text-center"></td>
        <td class="font-12 text-center"></td>
        <td class="font-12 text-center"></td>
        <td class="font-12 text-center">1</td>
        <td class="font-12 text-center">2</td>
        <td class="font-12 text-center">3</td>
        <td class="font-12 text-right">10</td>
        <td class="font-12 text-right">0.123</td>
        <td class="font-12 text-right"></td>
    </tr>
    @endfor
    <tr>
        <td></td>
        <td colspan="5" class="font-12 text-center bold">TOTAL</td>
        <td class="font-12 text-right">10</td>
        <td class="font-12 text-right">0.123</td>
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
        <td width="25%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Nama Penerima</td>
        <td width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="25%" class="font-12 text-left">Nomor Register</td>
        <td width="15%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Tanggal Penerima</td>
        <td width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="25%" class="font-12 text-left">Tanggal Penerbit</td>
        <td width="15%" class="font-12 text-left">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td rowspan="2" width="15%" class="font-12 text-left">Tanda Tangan Penerima</td>
        <td rowspan="2" width="30%" class="font-12 text-left">PT Nankai Indonesia</td>
    </tr>
    <tr>
        <td width="25%" class="font-12 text-left py-23">Tanda Tangan Penerbit</td>
        <td width="15%" class="font-12 text-left py-23">Ud Bintang Sembilan</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
    </tr>
</table>
