<?php

namespace Modules\Transaction\Repositories;

use Modules\Transaction\Models\OutcomingWood;
use App\Repositories\BaseRepository;
use Modules\Master\Models\Company;
use Modules\Master\Models\WoodCategoryOut;
use Modules\Master\Models\WoodSizeOut;
use Modules\Transaction\Models\OutcomingWoodDetail;
use Modules\Transaction\Models\OutcomingWoodDetailItem;

/**
 * Class OutcomingWoodRepository
 * @package App\Repositories
 * @version December 27, 2022, 8:43 pm WIB
*/

class OutcomingWoodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'warehouse_id',
        'wood_type_id',
        'serial_number',
        'date',
        'number_vehicles',
        'total_qty',
        'total_volume',
        'cost',
        'description',
        'type',
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
        return OutcomingWood::class;
    }

    public static function getData($param = [])
    {
        $result = OutcomingWood::query();
        
        $result->select(
            'outcoming_wood.*',
            'customer.name as customer_name',
            'customer.address as customer_address',
            'customer.phone as customer_phone',
            'warehouse.name as warehouse_name',
            'wood_type_out.name as wood_type_out_name',
        );

        $result->leftJoin('customer', 'customer.id', '=', 'outcoming_wood.customer_id');
        $result->leftJoin('warehouse', 'warehouse.id', '=', 'outcoming_wood.warehouse_id');
        $result->leftJoin('wood_type_out', 'wood_type_out.id', '=', 'outcoming_wood.wood_type_out_id');

        if(isset($param['get_by_customer']) && !is_null($param['get_by_customer'])){
            $result->where('outcoming_wood.customer_id', '=', $param['get_by_customer']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('outcoming_wood.warehouse_id', '=', $param['get_by_warehouse']);
        }

        if(isset($param['get_by_wood_type']) && !is_null($param['get_by_wood_type'])){
            $result->where('outcoming_wood.wood_type_out_id', '=', $param['get_by_wood_type']);
        }

        if(isset($param['get_by_outcoming_wood_id']) && !is_null($param['get_by_outcoming_wood_id'])){
            $result->where('outcoming_wood.id', '=', $param['get_by_outcoming_wood_id']);
        }

        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('outcoming_wood.date', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('outcoming_wood.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('outcoming_wood.date', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('outcoming_wood.date', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        return $result;
    }

    public static function getDetail($param = [])
    {
        $result = OutcomingWoodDetail::query();

        $result->select(
            'outcoming_wood_detail.*',
            'product.name as product_name',
            'wood_type.name as wood_type_name'
        );
        $result->leftJoin('product', 'product.id', '=', 'outcoming_wood_detail.product_id');
        $result->leftJoin('wood_type', 'wood_type.id', '=', 'outcoming_wood_detail.wood_type_id');

        if(isset($param['get_by_outcoming_wood_id']) && !is_null($param['get_by_outcoming_wood_id'])){
            $result->where('outcoming_wood_detail.outcoming_wood_id', '=', $param['get_by_outcoming_wood_id']);
        }

        $result->orderBy('outcoming_wood_detail.id', 'asc');

        $item = null;
        if($result->count() > 0){
            $item = $result->get()->map(function($data){
                $detail = OutcomingWoodDetailItem::
                where('outcoming_wood_detail_id', $data->id)
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
        $wood_category = WoodCategoryOut::select(
            'wood_category_out.*',
            'product.name as product_name',
            'wood_type.name as wood_type_name'
        )
        ->join('product', 'product.id', '=', 'wood_category_out.product_id')
        ->join('wood_type', 'wood_type.id', '=', 'wood_category_out.wood_type_id')
        ->where('template_wood_out_id',$id);
        $data = null;
        if($wood_category->count() > 0){
            $data = $wood_category->get()->map(function($item){
                $detail = WoodSizeOut::
                where('wood_category_out_id', $item->id)
                ->get();
                $item->detail = $detail;
                return $item;
            });
        }

        return $data;
    }

    public static function getReport($param = [])
    {
        $result = OutcomingWood::query();
        
        $result->select(
            'outcoming_wood.*',
            'customer.name as customer_name',
        );

        $result->leftJoin('customer', 'customer.id', '=', 'outcoming_wood.customer_id');

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('outcoming_wood.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('outcoming_wood.date', $param['get_by_year']);
        }

        $result->orderBy('outcoming_wood.date', 'asc');

        $company = Company::find(1);

        $data['data'] = $result->get();
        $data['company'] = $company;

        return $data;
    }
}
