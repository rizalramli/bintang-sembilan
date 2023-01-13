<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employee
 * @package App\Models
 * @version November 15, 2022, 8:48 pm WIB
 *
 * @property integer $user_id
 * @property string $address
 * @property string $phone
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class Employee extends Model
{

    use HasFactory;

    public $table = 'employee';
    
    public $timestamps = true;

    public $fillable = [
        'user_id',
        'address',
        'phone',
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
        'user_id' => 'integer',
        'address' => 'string',
        'phone' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:125',
        'user_id' => 'nullable|integer',
        'address' => 'required|string|max:125',
        'phone' => 'required|string|max:15',
        'warehouse' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
