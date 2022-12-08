<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Customer
 * @package App\Models
 * @version December 8, 2022, 4:47 pm WIB
 *
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $phone
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class Customer extends Model
{

    use HasFactory;

    public $table = 'customer';
    
    public $timestamps = true;

    public $fillable = [
        'name',
        'address',
        'city',
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
        'name' => 'string',
        'address' => 'string',
        'city' => 'string',
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
        'name' => 'nullable|string|max:125',
        'address' => 'nullable|string|max:125',
        'city' => 'nullable|string|max:125',
        'phone' => 'nullable|string|max:15',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
