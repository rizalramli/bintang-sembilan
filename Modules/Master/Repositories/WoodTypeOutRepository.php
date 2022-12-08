<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\WoodTypeOut;
use App\Repositories\BaseRepository;

/**
 * Class WoodTypeOutRepository
 * @package App\Repositories
 * @version December 8, 2022, 5:07 pm WIB
*/

class WoodTypeOutRepository extends BaseRepository
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
        return WoodTypeOut::class;
    }
}
