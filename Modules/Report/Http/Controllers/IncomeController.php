<?php

namespace Modules\Report\Http\Controllers;

use App\Helpers\Human;
use App\Http\Controllers\AppBaseController;
use Excel;
use App\Exports\TemplateExcel;
use App\Exports\Themes\Income;
use Modules\Master\Models\Warehouse;
use Modules\Transaction\Repositories\IncomeRepository;

class IncomeController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::income.index', $data);
    }

    public function excel()
    {
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;

        $query = IncomeRepository::getReport($param);
        
        if(request()->filter_warehouse == null){
            $warehouse_name = 'Semua Gudang';
        } else {
            $warehouse = Warehouse::find(request()->filter_warehouse);
            $warehouse_name = $warehouse->name; 
        }

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        $query['year'] = $param['get_by_year'];

        $query['warehouse'] = $warehouse_name;

        $title = 'Laporan Pemasukan di '.$warehouse_name. '-'. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new Income), $title.'.xlsx');
    }
}
