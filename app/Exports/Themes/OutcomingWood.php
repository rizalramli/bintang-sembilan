<?php

namespace App\Exports\Themes;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class OutcomingWood
{
    public function setView($data)
    {
        return view('report::outcoming_woods.excel',[
            'data' => $data['data'],
            'company' => $data['company'],
            'month' => $data['month'],
        ]);
    }

    public function setStyles($sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle('1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }
}
