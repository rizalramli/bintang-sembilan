@php 
$listDate = [];

for($d=1; $d<=31; $d++){
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $listDate[]=date('Y-m-d', $time);
}
$count = count($listDate) + 2;
@endphp
<table>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="{{$count}}">
            DAFTAR KEHADIRAN DI {{$warehouse}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="{{$count}}">
            {{$month_indo}} - {{$year}} 
       </th> 
    </tr>
    <tr>
       <th style="text-align:center;font-size:10px" colspan="{{$count}}">
            &nbsp; 
       </th> 
    </tr>
    <tr>
        <td style="vertical-align : middle;text-align:center;" rowspan="2">No</td>
        <td style="vertical-align : middle;text-align:center;" rowspan="2">Nama Karyawan</td>
        <td style="vertical-align : middle;text-align:center;" colspan="{{$count - 2}}">Tanggal</td>
        
        <td style="vertical-align : middle;text-align:center;" rowspan="2">Total Masuk</td>
    </tr>
    <tr>
        @foreach($listDate as $date)
            <td>{{date('d', strtotime($date))}}</td>
        @endforeach
    </tr>
    @foreach($data as $key => $value)

        @php
            $total = 0;
        @endphp
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->employee_name}}</td>
            @foreach($listDate as $date)
                @php
                    $check = false;
                @endphp
                @foreach($value->attendance as $key2 => $value2)
                @if(date('Y-m-d',strtotime($value2->check_in)) == $date)
                        @php
                            $check = true;
                        @endphp
                    @endif
                @endforeach
                @if($check)
                    <td>&#10004;</td>
                    @php
                        $total++;
                    @endphp
                @else
                    <td>-</td>
                @endif
            @endforeach
            <td>{{$total}}</td>
        </tr>
    @endforeach
</table>