<?php

namespace Modules\Transaction\Repositories;

use Modules\Transaction\Models\IncomingWood;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Modules\Master\Models\Supplier;
use Modules\Master\Models\WoodCategory;
use Modules\Master\Models\WoodSize;
use Modules\Transaction\Models\IncomingWoodDetail;
use Modules\Transaction\Models\IncomingWoodDetailItem;

/**
 * Class IncomingWoodRepository
 * @package App\Repositories
 * @version November 4, 2022, 7:10 pm WIB
*/

class IncomingWoodTradeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'template_wood_id',
        'supplier_id',
        'warehouse_id',
        'wood_type_id',
        'serial_number',
        'date',
        'number_vehicles',
        'type',
        'total_volume',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return IncomingWood::class;
    }

    public static function getData($param = [])
    {
        $result = IncomingWood::query();
        
        $result->select(
            'incoming_wood.*',
            'supplier.name as supplier_name',
            'warehouse.name as warehouse_name',
            'wood_type.name as wood_type_name',
        );

        $result->leftJoin('supplier', 'supplier.id', '=', 'incoming_wood.supplier_id');
        $result->leftJoin('warehouse', 'warehouse.id', '=', 'incoming_wood.warehouse_id');
        $result->leftJoin('wood_type', 'wood_type.id', '=', 'incoming_wood.wood_type_id');
        $result->where('incoming_wood.type',2);

        if(isset($param['get_by_supplier']) && !is_null($param['get_by_supplier'])){
            $result->where('incoming_wood.supplier_id', '=', $param['get_by_supplier']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('incoming_wood.warehouse_id', '=', $param['get_by_warehouse']);
        }

        if(isset($param['get_by_wood_type']) && !is_null($param['get_by_wood_type'])){
            $result->where('incoming_wood.wood_type_id', '=', $param['get_by_wood_type']);
        }

        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('incoming_wood.date', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('incoming_wood.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('incoming_wood.date', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('incoming_wood.date', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        return $result;
    }

    public static function getDetail($param = [])
    {
        $result = IncomingWoodDetail::query();

        $result->select('incoming_wood_detail.*');

        if(isset($param['get_by_incoming_wood_id']) && !is_null($param['get_by_incoming_wood_id'])){
            $result->where('incoming_wood_detail.incoming_wood_id', '=', $param['get_by_incoming_wood_id']);
        }

        $result->orderBy('incoming_wood_detail.id', 'asc');

        $item = null;
        if($result->count() > 0){
            $item = $result->get()->map(function($data){
                $detail = IncomingWoodDetailItem::
                where('incoming_wood_detail_id', $data->id)
                ->orderBy('id','asc')
                ->get();
                $data->detail = $detail;
                return $data;
            });
        }

        return $item;
    }

    public static function getTemplate($id)
    {
        $wood_category = WoodCategory::where('template_wood_id',$id);
        $data = null;
        if($wood_category->count() > 0){
            $data = $wood_category->get()->map(function($item){
                $detail = WoodSize::
                where('wood_category_id', $item->id)
                ->get();
                $item->detail = $detail;
                return $item;
            });
        }

        return $data;
    }
    
    public static function getNumberVehicle($id)
    {
        $data = Supplier::find($id);
        if($data){
            return $data->number_vehicles;
        } else {
            return null;
        }
    }

    public static function generateSerialNumber($date)
    {
        $check = IncomingWood::whereMonth('date', Carbon::parse($date)->format('m'))->orderBy('id','desc')->first();
        
        if($check){
            $serial_number = $check->serial_number + 1;
        } else {
            $serial_number = 1;
        }

        return $serial_number;
    }
}
