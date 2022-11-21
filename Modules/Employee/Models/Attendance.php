<?php

namespace Modules\Employee\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Attendance
 * @package App\Models
 * @version November 17, 2022, 8:20 pm WIB
 *
 * @property integer $employee_id
 * @property string|\Carbon\Carbon $check_in
 * @property string|\Carbon\Carbon $check_out
 * @property boolean $status_check_in
 * @property boolean $status_check_out
 * @property boolean $created_check_in
 * @property boolean $created_check_out
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class Attendance extends Model
{

    use HasFactory;

    public $table = 'attendance';
    
    public $timestamps = true;

    public $fillable = [
        'warehouse_id',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'check_in' => 'datetime',
        'check_out' => 'datetime',
        'status_check_in' => 'integer',
        'status_check_out' => 'integer',
        'created_check_in' => 'integer',
        'created_check_out' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'warehouse_id' => 'required',
        'employee_id' => 'nullable|integer',
        'check_in' => 'nullable',
        'check_out' => 'nullable',
        'status_check_in' => 'nullable',
        'status_check_out' => 'nullable',
        'created_check_in' => 'nullable',
        'created_check_out' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public static $statusCheckIn =[
        1=>'Tepat Waktu',
        2=>'Terlambat Dengan Toleransi',
        3=>'Terlambat Tanpa Toleransi',
    ];

    public static $statusCheckOut =[
        1=>'Tepat Waktu',
        2=>'Pulang Lebih Cepat',
        3=>'Belum Pulang',
    ];

    
}
