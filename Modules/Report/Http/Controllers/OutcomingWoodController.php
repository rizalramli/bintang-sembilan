<?php

namespace Modules\Report\Http\Controllers;

use App\Helpers\Human;
use App\Http\Controllers\AppBaseController;
use Modules\Transaction\Models\OutcomingWood;
use Excel;
use App\Exports\TemplateExcel;
use App\Exports\Themes\OutcomingWood as OutcomingWoodTheme;
use Modules\Transaction\Repositories\OutcomingWoodRepository;
use Modules\Master\Models\Warehouse;

class OutcomingWoodController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['number_vehicle'] = Human::getVehicleNumber();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::outcoming_woods.index', $data);
    }

    public function excel()
    {
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;
        $param['is_not_balken'] = true;

        $query = OutcomingWoodRepository::getReport($param);

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        $title = 'Laporan Kayu Keluar '. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new OutcomingWoodTheme), $title.'.xlsx');
    }

    public function indexBalken()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['number_vehicle'] = Human::getVehicleNumber();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::outcoming_woods_balken.index', $data);
    }

    public function excelBalken()
    {
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;
        $param['is_balken'] = true;

        $query = OutcomingWoodRepository::getReport($param);

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        $title = 'Laporan Balken Keluar '. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new OutcomingWoodTheme), $title.'.xlsx');
    }
}
