<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WoodCategoryOut
 * @package App\Models
 * @version January 2, 2023, 11:22 am WIB
 *
 * @property integer $template_wood_out_id
 * @property integer $product_id
 * @property integer $wood_type_id
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class WoodCategoryOut extends Model
{

    use HasFactory;

    public $table = 'wood_category_out';
    
    public $timestamps = true;

    public $fillable = [
        'template_wood_out_id',
        'product_id',
        'wood_type_id',
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
        'template_wood_out_id' => 'integer',
        'product_id' => 'integer',
        'wood_type_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'template_wood_out_id' => 'nullable',
        'product_id' => 'required',
        'wood_type_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
