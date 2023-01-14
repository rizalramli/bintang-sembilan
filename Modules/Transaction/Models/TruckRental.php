<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TruckRental
 * @package App\Models
 * @version January 14, 2023, 10:32 am WIB
 *
 * @property string $date
 * @property string $number_vehicles
 * @property string $driver_name
 * @property string $loading_place
 * @property string $purpose
 * @property integer $truck_cost
 * @property integer $driver_cost
 * @property integer $solar_cost
 * @property integer $damage_cost
 * @property string $description
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class TruckRental extends Model
{

    use HasFactory;

    public $table = 'truck_rental';
    
    public $timestamps = true;

    public $fillable = [
        'warehouse_id',
        'date',
        'number_vehicles',
        'driver_name',
        'loading_place',
        'purpose',
        'truck_cost',
        'driver_cost',
        'solar_cost',
        'damage_cost',
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
        'date' => 'date',
        'number_vehicles' => 'string',
        'driver_name' => 'string',
        'loading_place' => 'string',
        'purpose' => 'string',
        'truck_cost' => 'integer',
        'driver_cost' => 'integer',
        'solar_cost' => 'integer',
        'damage_cost' => 'integer',
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
        'warehouse_id' => 'required',
        'date' => 'required',
        'number_vehicles' => 'required',
        'driver_name' => 'required',
        'loading_place' => 'required',
        'purpose' => 'required',
        'truck_cost' => 'required',
        'driver_cost' => 'required',
        'solar_cost' => 'required',
        'damage_cost' => 'required',
        'description' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
