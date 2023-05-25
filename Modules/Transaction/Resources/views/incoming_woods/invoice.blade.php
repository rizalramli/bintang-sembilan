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
        <td colspan="3" class="text-center font-12">Nomor : {{$incomingWood->serial_number}}</td>
    </tr>
    <tr>
        <td colspan="3" class="text-center font-12">Tanggal : {{\App\Helpers\Human::dateFormat($incomingWood->date)}}</td>
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
        <td width="30%" class="font-12 text-left">{{$supplier->name}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Nama</td>
        <td width="30%" class="font-12 text-left">{{$company->name}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Alamat</td>
        <td width="30%" class="font-12 text-left">{{$supplier->address}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Alamat</td>
        <td width="30%" class="font-12 text-left">{{$company->address}} Kecamatan {{$company->district}} Kabupaten {{$company->city}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Telp Fax No</td>
        <td width="30%" class="font-12 text-left">{{$supplier->phone}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td width="15%" class="font-12 text-left">Telp Fax No</td>
        <td width="30%" class="font-12 text-left">{{$company->phone}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Lokasi Muat</td>
        <td width="30%" class="font-12 text-left">-</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
        <td rowspan="2" width="15%" class="font-12 text-left">Lokasi Bongkar</td>
        <td rowspan="2" width="30%" class="font-12 text-left">{{$company->address}} Kecamatan {{$company->district}} Kabupaten {{$company->city}}</td>
    </tr>
    <tr>
        <td width="15%" class="font-12 text-left">Unit Muat</td>
        <td width="30%" class="font-12 text-left">Truck : {{$incomingWood->number_vehicles}}</td>
        <td width="10%" style="border-bottom-style: hidden;"></td>
    </tr>
</table>
<br>
<table border="1" width="100%" class="border-collapse">
    <tr>
        <td colspan="5" class="bold font-12 text-center bg-brown">REKAPITULASI KAYU</td>
    </tr>
    <tr>
        <th width="5%" class="font-12 bold text-center">DM</th>
        <th width="60%" class="font-12 bold text-center">BATANG</th>
        <th width="10%" class="font-12 bold text-center">JML BTG</th>
        <th width="10%" class="font-12 bold text-center">VOLUME</th>
        <th width="15%" class="font-12 bold text-center">JML VLM</th>
    </tr>
    @if(!empty($incomingWoodDetail))
    @php 
    $sum_sub_total_volume = 0;
    $sum_qty = 0;
    @endphp 
    @foreach($incomingWoodDetail as $key => $item)
        @foreach($item->detail as $key2 => $item2)
            <tr>
                <td class="font-12 text-center">
                    {{ $item2->diameter }}
                </td>
                <td class="font-12"><span id="turus{{$key.$key2}}">
                    @php 
                    $content = '';
                    @endphp
                    @for($i = 1; $i <= $item2->qty; $i++)
                        @php
                        $content .= '|';
                        @endphp
                        @if($i % 5 == 0)
                            @php
                            $content .= '&nbsp;&nbsp;&nbsp;';
                            @endphp
                        @endif
                        @if($i % 70 == 0)
                            @php
                            $content .= '<br>';
                            @endphp
                        @endif
                    @endfor
                    {!! $content !!}
                </span></td>
                <td class="font-12 text-right">
                    {{ $item2->qty }}
                </td>
                <td class="font-12 text-right">
                    {{ $item2->volume }}
                </td>
                <td class="font-12 text-right">
                </td>
            </tr>
            @php 
            $sum_qty += $item2->qty;
            @endphp
        @endforeach
    <tr>
        <td class="font-12 text-right" colspan="4">JML</td>
        <td class="font-12 text-right">
            {{ $item->sub_total_volume }}
        </td>
    </tr>
    @php 
    $sum_sub_total_volume += $item->sub_total_volume;
    @endphp
    @endforeach
    <tr>
        <td class="font-12 text-right" colspan="4">Total Batang / Total Volume</td>
        <td class="font-12 text-right">
            {{$sum_qty}} / {{$sum_sub_total_volume}}
        </td>
    </tr>
    @endif
</table>
<br>
<br>
<table width="100%" border="0" class="border-collapse">
    <tr>
        <td class="font-12 text-right">Mengetahui</td>
    </tr>
    <br>
    <br>
    <br>
    <tr>
        <td class="font-12 text-right">Fresty Nur Hidayati</td>
    </tr>
    <tr>
        <td class="font-12 text-right">STAF TUK</td>
    </tr>
</table>

