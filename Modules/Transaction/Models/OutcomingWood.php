<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OutcomingWood
 * @package App\Models
 * @version December 27, 2022, 8:43 pm WIB
 *
 * @property integer $customer_id
 * @property integer $warehouse_id
 * @property integer $wood_type_id
 * @property integer $serial_number
 * @property string|\Carbon\Carbon $date
 * @property string $number_vehicles
 * @property integer $total_qty
 * @property number $total_volume
 * @property integer $cost
 * @property string $description
 * @property boolean $type
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class OutcomingWood extends Model
{

    use HasFactory;

    public $table = 'outcoming_wood';
    
    public $timestamps = true;

    public $fillable = [
        'customer_id',
        'warehouse_id',
        'wood_type_out_id',
        'serial_number',
        'date',
        'number_vehicles',
        'total_qty',
        'total_volume',
        'cost',
        'description',
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
        'customer_id' => 'integer',
        'warehouse_id' => 'integer',
        'wood_type_out_id' => 'integer',
        'serial_number' => 'string',
        'date' => 'date',
        'number_vehicles' => 'string',
        'total_qty' => 'integer',
        'total_volume' => 'float',
        'cost' => 'integer',
        'description' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required',
        'warehouse_id' => 'required',
        'wood_type_out_id' => 'required',
        'serial_number' => 'required',
        'date' => 'required',
        'number_vehicles' => 'required|string|max:15',
        'total_qty' => 'required',
        'total_volume' => 'required',
        'cost' => 'required',
        'description' => 'nullable|string|max:125',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
