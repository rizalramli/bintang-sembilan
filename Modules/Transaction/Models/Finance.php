<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Finance extends Model
{
    use HasFactory;

    public $table = 'finance';
    
    public $timestamps = true;

    public $fillable = [
        'warehouse_id',
        'date',
        'description',
        'type',
        'amount',
        'ref_id',
        'ref_table'
    ];
}
