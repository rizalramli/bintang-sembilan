<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\TemplateWoodOut;
use App\Repositories\BaseRepository;

/**
 * Class TemplateWoodOutRepository
 * @package App\Repositories
 * @version January 2, 2023, 11:21 am WIB
*/

class TemplateWoodOutRepository extends BaseRepository
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
        return TemplateWoodOut::class;
    }
}
