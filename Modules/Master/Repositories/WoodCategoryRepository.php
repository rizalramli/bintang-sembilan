<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\WoodCategory;
use App\Repositories\BaseRepository;

/**
 * Class WoodCategoryRepository
 * @package App\Repositories
 * @version November 28, 2022, 8:41 pm WIB
*/

class WoodCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'template_wood_id',
        'name',
        'price',
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
        return WoodCategory::class;
    }
}
