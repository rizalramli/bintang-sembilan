<?php

namespace Modules\Transaction\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class IncomingWood
 * @package App\Models
 * @version November 4, 2022, 7:10 pm WIB
 *
 * @property integer $template_wood_id
 * @property integer $supplier_id
 * @property integer $warehouse_id
 * @property integer $wood_type_id
 * @property integer $serial_number
 * @property string|\Carbon\Carbon $date
 * @property string $number_vehicles
 * @property boolean $type
 * @property number $total_volume
 * @property integer $created_by
 * @property integer $updated_by
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class IncomingWoodDetailItem extends Model
{

    public $table = 'incoming_wood_detail_item';
    
    public $timestamps = true;

    public $fillable = [
        'incoming_wood_detail_id',
        'diameter',
        'qty',
        'volume',
        'created_at',
        'updated_at'
    ];
}
