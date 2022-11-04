@php 
$total_volume = 0;
@endphp
<table>
    <tr>
        <th>NO URUT</th>
        <th>TANGGAL</th>
        <th>SUPPLIER</th>
        <th>GUDANG</th>
        <th>JENIS KAYU</th>
        <th>NOPOL</th>
        <th>TOTAL VOLUME</th>
    </tr>
    @foreach($data as $item)
    <tr>
        <td>{{ $item->serial_number }}</td>
        <td>{{ App\Helpers\Human::datetimeFormat($item->date) }}</td>
        <td>{{ $item->supplier_name }}</td>
        <td>{{ $item->warehouse_name }}</td>
        <td>{{ $item->wood_type_name }}</td>
        <td>{{ $item->number_vehicles }}</td>
        <td>{{ $item->total_volume }}</td>
    </tr>
    @php
    $total_volume += $item->total_volume;
    @endphp
    @endforeach
    <tr>
        <td colspan="6"><b>Jumlah</b></td>
        <td><b>{{ $total_volume }}</b></td>
    </tr>
</table>