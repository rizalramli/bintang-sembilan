<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Supplier
 * @package App\Models
 * @version November 3, 2022, 9:09 pm WIB
 *
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class Supplier extends Model
{

    use HasFactory;

    public $table = 'supplier';
    
    public $timestamps = true;

    public $fillable = [
        'name',
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
        'name' => 'string',
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
        'address' => 'required|string|max:125',
        'phone' => 'required|string|max:15',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
