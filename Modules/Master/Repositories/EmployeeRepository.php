<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version November 15, 2022, 8:48 pm WIB
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'address',
        'phone',
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
        return Employee::class;
    }

    public static function getData($param = [])
    {
        $result = Employee::query();

        $result->select(
            'employee.*',
            'users.name',
            'users.email'
        );

        $result->join('users', 'users.id', '=', 'employee.user_id');

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->whereJsonContains('users.warehouse_id', $param['get_by_warehouse']);
        }

        return $result;

    }
}
