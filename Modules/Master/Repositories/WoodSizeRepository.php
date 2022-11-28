<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\WoodSize;
use App\Repositories\BaseRepository;

/**
 * Class WoodSizeRepository
 * @package App\Repositories
 * @version November 28, 2022, 8:42 pm WIB
*/

class WoodSizeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'wood_category_id',
        'name',
        'volume',
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
        return WoodSize::class;
    }
}
