<?php

namespace App\Exports\Themes;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ProfitLoss
{
    public function setView($data)
    {
        return view('report::profit_loss.excel',[
            'outcoming_wood_balken' => $data['outcoming_wood_balken'],
            'outcoming_wood_all' => $data['outcoming_wood_all'],
            'incoming_wood' => $data['incoming_wood'],
            'operasional' => $data['operasional'],
            'warehouse' => $data['warehouse'],
            'month' => $data['month'],
            'year' => $data['year'],
        ]);
    }

    public function setColumnFormats()
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
