<?php

namespace Modules\Employee\Repositories;

use Modules\Employee\Models\Attendance;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Modules\Master\Models\Employee;

/**
 * Class AttendanceRepository
 * @package App\Repositories
 * @version November 17, 2022, 8:20 pm WIB
*/

class AttendanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'check_in',
        'check_out',
        'status_check_in',
        'status_check_out',
        'created_check_in',
        'created_check_out',
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
        return Attendance::class;
    }

    public static function getTemplate($warehouse_id,$type)
    {
        $attendance = Attendance::query();

        if($type == 'check_in') {
            $attendance->whereNotNull('check_in');
            $attendance->whereDate('check_in', Carbon::now()->format('Y-m-d'));
        } else {
            $attendance->whereNotNull('check_out');
            $attendance->whereDate('check_out', Carbon::now()->format('Y-m-d'));
        }

        $employee = Employee::query();

        $employee->join('users', 'users.id', '=', 'employee.user_id');

        $employee->whereJsonContains('users.warehouse_id', $warehouse_id);

        $employee->whereNotIn('employee.id', $attendance->pluck('employee_id'));

        return $employee->get();
    }
}
