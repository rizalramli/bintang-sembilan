<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WoodCategory
 * @package App\Models
 * @version November 28, 2022, 8:41 pm WIB
 *
 * @property integer $template_wood_id
 * @property string $name
 * @property integer $price
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class WoodCategory extends Model
{

    use HasFactory;

    public $table = 'wood_category';
    
    public $timestamps = true;

    public $fillable = [
        'template_wood_id',
        'name',
        'price',
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
        'template_wood_id' => 'integer',
        'name' => 'string',
        'price' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'template_wood_id' => 'nullable|integer',
        'name' => 'nullable|string|max:125',
        'price' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
