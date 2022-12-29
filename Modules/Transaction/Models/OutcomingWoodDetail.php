<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

class OutcomingWoodDetail extends Model
{

    public $table = 'outcoming_wood_detail';
    
    public $timestamps = true;

    public $fillable = [
        'outcoming_wood_id',
        'product_id',
        'wood_type_id',
        'sub_total_volume',
        'created_at',
        'updated_at'
    ];
}
