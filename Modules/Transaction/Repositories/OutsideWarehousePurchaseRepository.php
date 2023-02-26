<?php

namespace Modules\Transaction\Repositories;

use Modules\Transaction\Models\OutsideWarehousePurchase;
use App\Repositories\BaseRepository;

/**
 * Class OutsideWarehousePurchaseRepository
 * @package App\Repositories
 * @version February 26, 2023, 1:34 pm WIB
*/

class OutsideWarehousePurchaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'warehouse_id',
        'destination',
        'date',
        'number_vehicles',
        'total_qty_sj',
        'total_volume_sj',
        'total_qty_tally',
        'total_volume_tally',
        'total_qty_afkir',
        'total_volume_afkir',
        'payment_factory',
        'fare_down',
        'grand_total',
        'fee',
        'paid',
        'down_payment',
        'nett',
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
        return OutsideWarehousePurchase::class;
    }

    public static function getData($param = [])
    {
        $result = OutsideWarehousePurchase::query();

          
        $result->select(
            'outside_warehouse_purchase.*',
            'warehouse.name as warehouse_name',
        );

        $result->leftJoin('warehouse', 'warehouse.id', '=', 'outside_warehouse_purchase.warehouse_id');

        if(isset($param['get_by_number_vehicle']) && !is_null($param['get_by_number_vehicle'])){
            $result->whereRaw('LOWER(number_vehicles) LIKE ?', ['%'.strtolower($param['get_by_number_vehicle']).'%']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('warehouse_id', '=', $param['get_by_warehouse']);
        }

        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('date', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('date', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('date', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        return $result;
    }
}
