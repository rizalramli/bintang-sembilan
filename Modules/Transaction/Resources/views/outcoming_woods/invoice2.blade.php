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
        <td></td>
        <td></td>
        <td class="text-left font-12">Dok-5/J</td>
    </tr>
    <tr>
        <td width="10%" rowspan="3">
            <div class="text-left">
                <img src="{{ asset('images/logo/' . $company->logo) }}" width="50px" height="50px">
            </div>
        </td>
        <td width="60%" class="bold text-left font-15">{{$company->name}}</td>
        <td width="30%" class="text-left font-12">1 : Accounting</td>
    </tr>
    <tr>
        <td rowspan="2" class="bold font-15 text-left">WOOD WORKING FACTORY</td>
        <td class="font-12 text-left">2 : Pembeli</td>
    </tr>
    <tr>
        <td class="font-12 text-left">3 : Arsip</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="10%"></td>
        <td width="60%" class="text-left font-12">
            {{$company->address}}
            <br>
            {{strtoupper($company->district)}} - {{strtoupper($company->city)}} - {{strtoupper($company->province)}} 
            <br>
            Telp : {{$company->phone}}
        </td>
        <td width="30%" class="text-12 font-12">
            No : {{$outcomingWood->serial_number}}
            <br>
            Kepada : Yth {{$outcomingWood->customer_name}} / {{$outcomingWood->customer_address}}
        </td>
    </tr>
</table>
<br>
<p class="bold font-12 text-center">SURAT JALAN</p>
<p class="font-12">Tanggal : {{date('d/m/Y')}}</p>
<p class="font-12">Bersama ini kami kirimkan barang dengan dimuat kendarann Truk No Polisi : <b>{{$outcomingWood->serial_number}}</b>. Dengan rincian sebagai berikut : </p>
<table border="1" width="100%" class="border-collapse">
    <tr>
        <td colspan="9" class="bold font-12 text-center">REKAPITULASI KAYU YANG DI ANGKUT</td>
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
<p class="font-12">Barang-barang tersebut telah diterima dalam keaadaan baik dan benar</p>

<br>
<table width="100%">
    <tr>
        <td width="33%" class="font-12 text-center">Satpam,</td>
        <td width="33%" class="font-12 text-center">Sopir,</td>
        <td width="33%" class="font-12 text-center">Penerima,</td>
    </tr>
    <br><br>
    <br><br>
    <tr>
        <td width="33%" class="font-12 text-center">
            (
            @for($i = 0; $i < 20; $i++)
                &nbsp;
            @endfor
            )
        </td>
        <td width="33%" class="font-12 text-center">
            (
            @for($i = 0; $i < 20; $i++)
                &nbsp;
            @endfor
            )
        </td>
        <td width="33%" class="font-12 text-center">
            (
            @for($i = 0; $i < 20; $i++)
                &nbsp;
            @endfor
            )
        </td>
    </tr>
</table>