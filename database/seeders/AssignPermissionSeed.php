<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Master\Models\Permission;

class AssignPermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_has_permissions')->truncate();

        $permissions = Permission::all();

        $role = \Spatie\Permission\Models\Role::find(1);

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);
        }
    }
}
