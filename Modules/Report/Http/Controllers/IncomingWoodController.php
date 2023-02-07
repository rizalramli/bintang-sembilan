<?php

namespace Modules\Report\Http\Controllers;

use App\Helpers\Human;
use App\Http\Controllers\AppBaseController;
use Modules\Transaction\Models\IncomingWood;
use Excel;
use App\Exports\TemplateExcel;
use App\Exports\Themes\IncomingWood as IncomingWoodTheme;
use Modules\Transaction\Repositories\IncomingWoodRepository;
use Modules\Master\Models\Warehouse;

class IncomingWoodController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['status'] = IncomingWood::$status;
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::incoming_woods.index', $data);
    }

    public function excel()
    {
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_status'] = request()->filter_status;
        $param['get_by_warehouse'] = request()->filter_warehouse;

        $query = IncomingWoodRepository::getReport($param);
        
        if(request()->filter_status == '1'){
            $type = 'SAKR';
        } else {
            $type = 'Dagang'; 
        }

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        $query['type'] = $type;

        $title = 'Laporan Log Sengon Masuk '.$type. '-'. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new IncomingWoodTheme), $title.'.xlsx');
    }
}
