<?php

namespace Modules\Master\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Company
 * @package App\Models
 * @version November 25, 2022, 9:46 pm WIB
 *
 * @property string $name
 * @property string $owner
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $district
 * @property string $city
 * @property string $province
 * @property string $logo
 * @property string|\Carbon\Carbon $created_at
 * @property string|\Carbon\Carbon $updated_at
 */
class Company extends Model
{

    use HasFactory;

    public $table = 'company';
    
    public $timestamps = true;

    public $fillable = [
        'name',
        'owner',
        'email',
        'phone',
        'address',
        'district',
        'city',
        'province',
        'logo',
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
        'name' => 'string',
        'owner' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'district' => 'string',
        'city' => 'string',
        'province' => 'string',
        'logo' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable',
        'owner' => 'nullable',
        'email' => 'nullable',
        'phone' => 'nullable',
        'address' => 'nullable',
        'district' => 'nullable',
        'city' => 'nullable',
        'province' => 'nullable',
        'logo' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
