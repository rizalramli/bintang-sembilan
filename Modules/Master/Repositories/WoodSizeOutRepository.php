<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\WoodSizeOut;
use App\Repositories\BaseRepository;

/**
 * Class WoodSizeOutRepository
 * @package App\Repositories
 * @version January 2, 2023, 11:22 am WIB
*/

class WoodSizeOutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'wood_category_out_id',
        'length',
        'width',
        'height',
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
        return WoodSizeOut::class;
    }
}
