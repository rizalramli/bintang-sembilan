<?php

namespace Modules\Report\Http\Controllers;

use App\Helpers\Human;
use App\Http\Controllers\AppBaseController;
use Excel;
use App\Exports\TemplateExcel;
use App\Exports\Themes\OutsideWarehousePurchases as OutsideWarehousePurchasesTheme;
use Modules\Master\Models\Warehouse;
use Modules\Transaction\Repositories\OutsideWarehousePurchaseRepository;

class OutsideWarehousePurchaseController extends AppBaseController
{
    public function index()
    {
        $data['month'] = Human::monthIndonesia();
        $data['year'] = Human::yearReport();
        $data['number_vehicle'] = Human::getVehicleNumberOutsideWarehousePurchases();
        $data['destination'] = Human::getDestinationOutsideWarehousePurchases();
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return view('report::outside_warehouse_purchases.index', $data);
    }

    public function excel()
    {
        $param['get_by_number_vehicle'] = request()->filter_number_vehicle;
        $param['get_by_destination'] = request()->filter_destination;
        $param['get_by_month'] = request()->filter_month;
        $param['get_by_year'] = request()->filter_year;
        $param['get_by_warehouse'] = request()->filter_warehouse;
        $param['order_by_date'] = true;

        $query['data'] = OutsideWarehousePurchaseRepository::getData($param)->get();

        $query['month'] = Human::monthIndonesia()[request()->filter_month];
        
        $query['year'] = request()->filter_year;

        if(request()->filter_warehouse == null){
            $warehouse_name = 'Semua Gudang';
        } else {
            $warehouse = Warehouse::find(request()->filter_warehouse);
            $warehouse_name = $warehouse->name; 
        }

        $query['warehouse'] = $warehouse_name;

        $title = 'Laporan Pembelian Gudang Luar '. $param['get_by_month'] . '-' . $param['get_by_year'];
        
        return Excel::download(new TemplateExcel($query, new OutsideWarehousePurchasesTheme), $title.'.xlsx');
    }
}
