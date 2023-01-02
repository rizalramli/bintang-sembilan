<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WoodSizeOut
 * @package App\Models
 * @version January 2, 2023, 11:22 am WIB
 *
 * @property integer $wood_category_out_id
 * @property number $length
 * @property number $width
 * @property number $height
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class WoodSizeOut extends Model
{

    use HasFactory;

    public $table = 'wood_size_out';
    
    public $timestamps = true;

    public $fillable = [
        'wood_category_out_id',
        'length',
        'width',
        'height',
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
        'wood_category_out_id' => 'integer',
        'length' => 'float',
        'width' => 'float',
        'height' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'wood_category_out_id' => 'nullable',
        'length' => 'required',
        'width' => 'required',
        'height' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
