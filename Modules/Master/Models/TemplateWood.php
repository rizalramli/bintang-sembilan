<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TemplateWood
 * @package App\Models
 * @version November 28, 2022, 8:37 pm WIB
 *
 * @property string $name
 * @property boolean $is_active
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class TemplateWood extends Model
{

    use HasFactory;

    public $table = 'template_wood';
    
    public $timestamps = true;

    public $fillable = [
        'name',
        'is_active',
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
        'is_active' => 'boolean',
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
        'is_active' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
