<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Repositories\BaseRepository;

/**
 * Class BankRepository
 * @package App\Repositories
 * @version November 1, 2022, 5:59 am UTC
*/

class BankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bank',
        'address',
        'phone',
        'cp',
        'hp',
        'mdr_debit_card',
        'mdr_credit_card'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bank::class;
    }
}
