<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bank
 * @package App\Models
 * @version November 1, 2022, 5:59 am UTC
 *
 * @property string $bank
 * @property string $address
 * @property string $phone
 * @property string $cp
 * @property string $hp
 * @property number $mdr_debit_card
 * @property number $mdr_credit_card
 */
class Bank extends Model
{

    use HasFactory;

    public $table = 'bank';
    
    public $timestamps = false;




    public $fillable = [
        'bank',
        'address',
        'phone',
        'cp',
        'hp',
        'mdr_debit_card',
        'mdr_credit_card'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bank' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'cp' => 'string',
        'hp' => 'string',
        'mdr_debit_card' => 'float',
        'mdr_credit_card' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bank' => 'nullable|string|max:35',
        'address' => 'nullable|string|max:100',
        'phone' => 'nullable|string|max:30',
        'cp' => 'nullable|string|max:30',
        'hp' => 'nullable|string|max:20',
        'mdr_debit_card' => 'nullable|numeric',
        'mdr_credit_card' => 'nullable|numeric'
    ];

    
}
