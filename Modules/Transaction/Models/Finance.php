<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Income
 * @package App\Models
 * @version December 20, 2022, 7:33 pm WIB
 *
 * @property integer $warehouse_id
 * @property string $date
 * @property string $description
 * @property boolean $type
 * @property integer $amount
 * @property integer $ref_id
 * @property string $ref_table
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
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
        'ref_table',
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
        'warehouse_id' => 'integer',
        'date' => 'date',
        'description' => 'string',
        'type' => 'boolean',
        'amount' => 'integer',
        'ref_id' => 'integer',
        'ref_table' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'warehouse_id' => 'required|integer',
        'date' => 'required',
        'description' => 'required',
        'type' => 'nullable|boolean',
        'amount' => 'required',
        'ref_id' => 'nullable|integer',
        'ref_table' => 'nullable|string|max:125',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
