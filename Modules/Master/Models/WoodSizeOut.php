<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'wood_category_id' => 'nullable|integer',
        'name' => 'nullable|string|max:125',
        'volume' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
