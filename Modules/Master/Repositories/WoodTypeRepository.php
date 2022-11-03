<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\WoodType;
use App\Repositories\BaseRepository;

/**
 * Class WoodTypeRepository
 * @package App\Repositories
 * @version November 3, 2022, 8:55 pm WIB
*/

class WoodTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'created_at',
        'updated_at'
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
        return WoodType::class;
    }
}
