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
use Modules\Master\Models\WoodTypeOut;

class OutcomingWoodController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['number_vehicle'] = Human::getVehicleNumber();
        $data['wood_type_out'] = Human::getWoodTypeOutNotBalken();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::outcoming_woods.index', $data);
    }

    public function excel()
    {
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;
        $param['get_by_wood_type_out'] = request()->filter_wood_type_out;
        $param['is_not_balken'] = true;

        $query = OutcomingWoodRepository::getReport($param);

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        if(request()->filter_wood_type_out != null){
            $wood = WoodTypeOut::find(request()->filter_wood_type_out);
            $wood_name = $wood->name;
        } else {
            $wood_name = 'Semua';
        }

        $title = 'Laporan Limbah Pabrik Dengan Jenis Kayu '.$wood_name.' '. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new OutcomingWoodTheme), $title.'.xlsx');
    }

    public function indexBalken()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['number_vehicle'] = Human::getVehicleNumber();
        $data['wood_type_out'] = Human::getWoodTypeOutBalken();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::outcoming_woods_balken.index', $data);
    }

    public function excelBalken()
    {
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;
        $param['get_by_wood_type_out'] = request()->filter_wood_type_out;
        $param['is_balken'] = true;

        $query = OutcomingWoodRepository::getReport($param);

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        if(request()->filter_wood_type_out != null){
            $wood = WoodTypeOut::find(request()->filter_wood_type_out);
            $wood_name = $wood->name;
        } else {
            $wood_name = 'Semua';
        }

        $title = 'Laporan Balken Keluar Dengan Jenis Kayu '.$wood_name.' '. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new OutcomingWoodTheme), $title.'.xlsx');
    }
}
