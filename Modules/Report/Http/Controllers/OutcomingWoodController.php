<?php

namespace Modules\Report\Http\Controllers;

use App\Helpers\Human;
use App\Http\Controllers\AppBaseController;
use Modules\Transaction\Models\OutcomingWood;
use Excel;
use App\Exports\TemplateExcel;
use App\Exports\Themes\OutcomingWood as OutcomingWoodTheme;
use Modules\Transaction\Repositories\OutcomingWoodRepository;

class OutcomingWoodController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['number_vehicle'] = Human::getVehicleNumber();
        return view('report::outcoming_woods.index', $data);
    }

    public function excel()
    {
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;

        $query = OutcomingWoodRepository::getReport($param);

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        $title = 'Laporan Pengeluaran Kayu '. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new OutcomingWoodTheme), $title.'.xlsx');
    }
}
