<?php

namespace App\Exports\Themes;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class IncomingWood
{
    public function setView($data)
    {
        return view('transaction::incoming_woods.report.excel',[
            'data' => $data
        ]);
    }

    public function setStyles($sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle('1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }
}
