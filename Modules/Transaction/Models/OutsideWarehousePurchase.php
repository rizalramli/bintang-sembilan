<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OutsideWarehousePurchase
 * @package App\Models
 * @version February 26, 2023, 1:34 pm WIB
 *
 * @property integer $warehouse_id
 * @property string $destination
 * @property string $date
 * @property string $number_vehicles
 * @property integer $total_qty_sj
 * @property number $total_volume_sj
 * @property integer $total_qty_tally
 * @property number $total_volume_tally
 * @property integer $total_qty_afkir
 * @property number $total_volume_afkir
 * @property integer $payment_factory
 * @property integer $fare_down
 * @property integer $grand_total
 * @property integer $fee
 * @property integer $paid
 * @property integer $down_payment
 * @property integer $nett
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class OutsideWarehousePurchase extends Model
{

    use HasFactory;

    public $table = 'outside_warehouse_purchase';
    
    public $timestamps = true;

    public $fillable = [
        'warehouse_id',
        'destination',
        'date',
        'number_vehicles',
        'total_qty_sj',
        'total_volume_sj',
        'total_qty_tally',
        'total_volume_tally',
        'total_qty_afkir',
        'total_volume_afkir',
        'payment_factory',
        'fare_down',
        'fare_truck',
        'grand_total',
        'fee',
        'paid',
        'down_payment',
        'nett',
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
        'destination' => 'string',
        'date' => 'date',
        'number_vehicles' => 'string',
        'total_qty_sj' => 'integer',
        'total_volume_sj' => 'float',
        'total_qty_tally' => 'integer',
        'total_volume_tally' => 'float',
        'total_qty_afkir' => 'integer',
        'total_volume_afkir' => 'float',
        'payment_factory' => 'integer',
        'fare_down' => 'integer',
        'grand_total' => 'integer',
        'fee' => 'integer',
        'paid' => 'integer',
        'down_payment' => 'integer',
        'nett' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'warehouse_id' => 'nullable',
        'destination' => 'nullable',
        'date' => 'nullable',
        'number_vehicles' => 'nullable',
        'total_qty_sj' => 'nullable',
        'total_volume_sj' => 'nullable',
        'total_qty_tally' => 'nullable',
        'total_volume_tally' => 'nullable',
        'total_qty_afkir' => 'nullable',
        'total_volume_afkir' => 'nullable',
        'payment_factory' => 'nullable',
        'fare_down' => 'nullable',
        'grand_total' => 'nullable',
        'fee' => 'nullable',
        'paid' => 'nullable',
        'down_payment' => 'nullable',
        'nett' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
