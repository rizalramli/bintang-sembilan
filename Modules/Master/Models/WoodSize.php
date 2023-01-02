<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WoodSize
 * @package App\Models
 * @version November 28, 2022, 8:42 pm WIB
 *
 * @property integer $wood_category_id
 * @property string $name
 * @property number $volume
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class WoodSize extends Model
{

    use HasFactory;

    public $table = 'wood_size';
    
    public $timestamps = true;

    public $fillable = [
        'wood_category_id',
        'name',
        'volume',
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
        'wood_category_id' => 'integer',
        'name' => 'string',
        'volume' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'wood_category_id' => 'nullable',
        'name' => 'required|string|max:125',
        'volume' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
