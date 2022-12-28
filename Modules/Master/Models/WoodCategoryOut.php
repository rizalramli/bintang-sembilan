<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
