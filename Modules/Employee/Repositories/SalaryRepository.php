<?php

namespace Modules\Employee\Repositories;

use Modules\Employee\Models\Salary;
use App\Repositories\BaseRepository;

/**
 * Class SalaryRepository
 * @package App\Repositories
 * @version December 24, 2022, 10:29 am WIB
*/

class SalaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'warehouse_id',
        'employee_id',
        'date',
        'price',
        'volume',
        'total',
        'description',
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
        return Salary::class;
    }

    public static function getData($param = [])
    {
        $result = Salary::query();
        
        $result->select(
            'salary.*',
            'users.name as user_name'
        );

        $result->join('employee', 'employee.id', '=', 'salary.employee_id');
        $result->join('users', 'users.id', '=', 'employee.user_id');

        if(isset($param['get_by_employee']) && !is_null($param['get_by_employee'])){
            $result->where('salary.employee_id', '=', $param['get_by_employee']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('salary.warehouse_id', '=', $param['get_by_warehouse']);
        }

        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('salary.date', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('salary.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('salary.date', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('salary.date', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        $result->orderBy('salary.date', 'desc');

        return $result;
    }
}
