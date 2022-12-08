<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WoodTypeOut
 * @package App\Models
 * @version December 8, 2022, 5:07 pm WIB
 *
 * @property string $name
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class WoodTypeOut extends Model
{

    use HasFactory;

    public $table = 'wood_type_out';
    
    public $timestamps = true;

    public $fillable = [
        'name',
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
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
