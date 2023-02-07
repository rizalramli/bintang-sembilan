<?php

namespace App\Exports\Themes;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class IncomingWood
{
    public function setView($data)
    {
        return view('report::incoming_woods.excel',[
            'data' => $data['data'],
            'company' => $data['company'],
            'type' => $data['type'],
            'month' => $data['month'],
        ]);
    }

    public function setStyles($sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle('1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    public function setColumnFormats()
    {
        return [
            'N' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function setDrawings($data){
        $company = $data['company'];
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo/'.$company->logo));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B4');
    
        return $drawing;
    }
}
