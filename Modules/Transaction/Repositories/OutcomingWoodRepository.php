<?php

namespace Modules\Transaction\Repositories;

use Modules\Transaction\Models\OutcomingWood;
use App\Repositories\BaseRepository;

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
            'warehouse.name as warehouse_name',
            'wood_type.name as wood_type_name',
        );

        $result->leftJoin('customer', 'customer.id', '=', 'outcoming_wood.customer_id');
        $result->leftJoin('warehouse', 'warehouse.id', '=', 'outcoming_wood.warehouse_id');
        $result->leftJoin('wood_type', 'wood_type.id', '=', 'outcoming_wood.wood_type_id');

        if(isset($param['get_by_customer']) && !is_null($param['get_by_customer'])){
            $result->where('outcoming_wood.customer_id', '=', $param['get_by_customer']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('outcoming_wood.warehouse_id', '=', $param['get_by_warehouse']);
        }

        if(isset($param['get_by_wood_type']) && !is_null($param['get_by_wood_type'])){
            $result->where('outcoming_wood.wood_type_id', '=', $param['get_by_wood_type']);
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
}
