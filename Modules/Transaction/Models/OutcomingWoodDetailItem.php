<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

class OutcomingWoodDetailItem extends Model
{

    public $table = 'outcoming_wood_detail_item';
    
    public $timestamps = true;

    public $fillable = [
        'outcoming_wood_detail_id',
        'length',
        'width',
        'height',
        'qty',
        'volume',
        'created_at',
        'updated_at'
    ];
}
