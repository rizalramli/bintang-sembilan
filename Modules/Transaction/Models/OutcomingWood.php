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
        'employee_id',
        'warehouse_id',
        'wood_type_out_id',
        'serial_number',
        'serial_number_factory',
        'date',
        'number_vehicles',
        'total_qty',
        'total_volume',
        'total_qty_tally',
        'total_volume_tally',
        'total_qty_afkir',
        'total_volume_afkir',
        'nett',
        'fare_truck',
        'fee',
        'result',
        'description',
        'created_at',
        'updated_at'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required',
        'employee_id' => 'required',
        'warehouse_id' => 'required',
        'wood_type_out_id' => 'required',
        'serial_number' => 'required',
        'date' => 'required',
        'number_vehicles' => 'required|string|max:15',
        'total_qty' => 'required',
        'total_volume' => 'required',
        'nett' => 'required',
        'description' => 'nullable|string|max:125',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
