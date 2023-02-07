<?php

namespace Modules\Transaction\Repositories;

use Modules\Transaction\Models\Finance;
use App\Repositories\BaseRepository;

/**
 * Class ExpenseRepository
 * @package App\Repositories
 * @version December 20, 2022, 9:06 pm WIB
*/

class ExpenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'warehouse_id',
        'date',
        'description',
        'type',
        'amount',
        'ref_id',
        'ref_table',
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
        return Finance::class;
    }

    public static function getData($param = [])
    {
        $result = Finance::query();

        $result->select('finance.*');

        $result->leftJoin('warehouse', 'warehouse.id', '=', 'finance.warehouse_id');
        $result->where('finance.type',1);

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('finance.warehouse_id', '=', $param['get_by_warehouse']);
        }
        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('finance.date', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('finance.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('finance.date', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('finance.date', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        $result->orderBy('finance.date', 'desc');

        return $result;
    }

    public static function getReport($param = [])
    {
        $result = Finance::query();
        
        $result->select('finance.*');

        $result->leftJoin('warehouse', 'warehouse.id', '=', 'finance.warehouse_id');
        // $result->where('finance.type',1);

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('finance.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('finance.date', $param['get_by_year']);
        }

        if (isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])) {
            $result->where('finance.warehouse_id', $param['get_by_warehouse']);
        }

        if (isset($param['get_by_flag']) && !is_null($param['get_by_flag'])) {
            $result->where('finance.flag', $param['get_by_flag']);
        }

        $result->orderBy('finance.date', 'asc');

        $data['data'] = $result->get();

        return $data;
    }
}
