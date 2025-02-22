<?php

namespace App\Exports\Themes;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TruckRental
{
    public function setView($data)
    {
        return view('report::truck_rentals.excel',[
            'data' => $data['data'],
            'warehouse' => $data['warehouse'],
            'month' => $data['month'],
            'year' => $data['year'],
        ]);
    }

    public function setStyles($sheet)
    {
        $sheet->getStyle('3')->getFont()->setBold(true);
        $sheet->getStyle('3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    public function setColumnFormats()
    {
        return [
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
