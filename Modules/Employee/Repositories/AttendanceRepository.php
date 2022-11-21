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

    public static function getData($param = [])
    {
        $result = Attendance::query();
        
        $result->select(
            'attendance.*',
            'users.name as user_name'
        );

        $result->join('employee', 'employee.id', '=', 'attendance.employee_id');
        $result->join('users', 'users.id', '=', 'employee.user_id');

        if(isset($param['get_by_employee']) && !is_null($param['get_by_employee'])){
            $result->where('attendance.employee_id', '=', $param['get_by_employee']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('attendance.warehouse_id', '=', $param['get_by_warehouse']);
        }

        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('attendance.check_in', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('attendance.check_in', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('attendance.check_in', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('attendance.check_in', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        $result->orderBy('attendance.id', 'desc');

        return $result;
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

        $employee->select('employee.id', 'users.name');

        return $employee->get();
    }

    public static function submit($input)
    {
        $attendance = Attendance::query();

        $attendance->where('employee_id', $input['employee_id']);
        $attendance->whereDate('created_at', Carbon::now()->format('Y-m-d'));

        $attendance = $attendance->first();

        if($attendance) {
            $attendance->update($input);
        } else {
            $attendance = Attendance::create($input);
        }

        return $attendance;
    }
}
