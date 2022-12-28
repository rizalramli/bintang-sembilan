<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateWoodOut extends Model
{

    use HasFactory;

    public $table = 'template_wood_out';
    
    public $timestamps = true;

    public $fillable = [
        'name',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
