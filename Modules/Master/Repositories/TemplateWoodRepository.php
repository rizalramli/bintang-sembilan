<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\TemplateWood;
use App\Repositories\BaseRepository;

/**
 * Class TemplateWoodRepository
 * @package App\Repositories
 * @version November 28, 2022, 8:37 pm WIB
*/

class TemplateWoodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'is_active',
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
        return TemplateWood::class;
    }
}
