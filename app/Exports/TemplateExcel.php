<?php 

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TemplateExcel implements FromView, ShouldAutoSize, WithColumnFormatting, WithStyles
{

    public $data;
    public $theme;

    public function __construct($data = [], $theme)
    {
        $this->data = $data;
        $this->theme = $theme;
    }

    public function view(): View
    {
        return $this->theme->setView($this->data);
    }

    // optional
    public function columnFormats(): array
    {
        if (method_exists($this->theme, 'setColumnFormats')) {
            return $this->theme->setColumnFormats();
        }

        return [];
    }

    // optional
    public function styles(Worksheet $sheet)
    {
        if (method_exists($this->theme, 'setStyles')) {
            $this->theme->setStyles($sheet,$this->data);
        }
    }
}