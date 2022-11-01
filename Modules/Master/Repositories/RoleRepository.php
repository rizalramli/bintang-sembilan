<?php

namespace Modules\Master\Repositories;

use Modules\Master\Models\Role;
use App\Repositories\BaseRepository;
use Modules\Master\Models\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

/**
 * Class RoleRepository
 * @package App\Repositories
 * @version November 1, 2022, 12:45 pm UTC
*/

class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name',
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
        return Role::class;
    }

    public static function getDataGroup()
    {
        $return = [];

        // get data permissions
        $get_data_permissions = ModelsPermission::orderBy('id','asc')->get();

        // make grouping
        $groups = [];
        foreach ($get_data_permissions as $key => $value) {
            $permission_name  = $value->name;
            $names = explode("-", $permission_name);

            $groups[] = $names[0];
        }
        $groups = array_unique($groups);

        // insert array in the new grouping
        foreach ($groups as $key_group => $value_group) {

            $data = [];
            foreach ($get_data_permissions as $key_permission => $value_permission) {
                $permission_name  = $value_permission->name;
                $names = explode("-", $permission_name);

                $id = $value_permission->id;
                $first_name = $names[0];
                $last_name = $names[1];

                if ($value_group == $first_name) {
                    $data[] = [
                        'id' => $id,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                    ];
                }
            }

            // group_name_desc
            $permission_types = Permission::$permission_type;
            $group_name_desc = '-';
            if (isset($permission_types[$value_group])) {
                $group_name_desc = $permission_types[$value_group];
            }

            $return[] = [
                'group_name' => $value_group,
                'group_name_desc' => $group_name_desc,
                'data' => $data,
            ];
        }

        return $return;
    }
}
