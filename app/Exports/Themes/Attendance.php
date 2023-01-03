<?php

namespace App\Exports\Themes;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Attendance
{
    public function setView($data)
    {
        return view('report::attendance.excel',[
            'data' => $data['data'],
            'warehouse' => $data['warehouse'],
            'month_indo' => $data['month_indo'],
            'month' => $data['month'],
            'year' => $data['year'],
        ]);
    }

    public function setStyles($sheet)
    {
        $sheet->getStyle('4')->getFont()->setBold(true);
        $sheet->getStyle('4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('5')->getFont()->setBold(true);
        $sheet->getStyle('5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    public function setColumnFormats()
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
