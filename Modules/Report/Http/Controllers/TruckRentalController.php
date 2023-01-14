<?php

namespace Modules\Report\Http\Controllers;

use App\Helpers\Human;
use App\Http\Controllers\AppBaseController;
use Excel;
use App\Exports\TemplateExcel;
use App\Exports\Themes\TruckRental;
use Modules\Master\Models\Warehouse;
use Modules\Transaction\Repositories\TruckRentalRepository;

class TruckRentalController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        $data['number_vehicle'] = Human::getVehicleNumberTruckRental();
        return view('report::truck_rentals.index', $data);
    }

    public function excel()
    {
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;

        $query = TruckRentalRepository::getReport($param);
        
        if(request()->filter_warehouse == null){
            $warehouse_name = 'Semua Gudang';
        } else {
            $warehouse = Warehouse::find(request()->filter_warehouse);
            $warehouse_name = $warehouse->name; 
        }

        $query['month'] = Human::monthIndonesia()[request()->filter_month];

        $query['year'] = $param['get_by_year'];

        $query['warehouse'] = $warehouse_name;

        $title = 'Laporan Penyewaan Truk di '.$warehouse_name. '-'. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new TruckRental), $title.'.xlsx');
    }
}
