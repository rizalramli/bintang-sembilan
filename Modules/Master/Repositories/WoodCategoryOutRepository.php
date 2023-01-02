<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\WoodCategoryOut;
use App\Repositories\BaseRepository;

/**
 * Class WoodCategoryOutRepository
 * @package App\Repositories
 * @version January 2, 2023, 11:22 am WIB
*/

class WoodCategoryOutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'template_wood_out_id',
        'product_id',
        'wood_type_id',
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
        return WoodCategoryOut::class;
    }
}
