<?php

namespace Modules\Employee\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Salary
 * @package App\Models
 * @version December 24, 2022, 10:29 am WIB
 *
 * @property integer $warehouse_id
 * @property integer $employee_id
 * @property string $date
 * @property integer $price
 * @property number $volume
 * @property integer $total
 * @property string $description
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class Salary extends Model
{

    use HasFactory;

    public $table = 'salary';
    
    public $timestamps = true;

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'warehouse_id' => 'integer',
        'employee_id' => 'integer',
        'date' => 'date',
        'price' => 'integer',
        'volume' => 'float',
        'total' => 'integer',
        'description' => 'string',
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
        'employee_id' => 'required',
        'date' => 'required',
        'price' => 'required',
        'volume' => 'required',
        'total' => 'required',
        'description' => 'nullable|string|max:125',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
