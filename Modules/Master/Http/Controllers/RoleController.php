<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\RoleDataTable;
use Modules\Master\Http\Requests\CreateRoleRequest;
use Modules\Master\Http\Requests\UpdateRoleRequest;
use Modules\Master\Repositories\RoleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('master::roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = RoleRepository::getDataGroup();
        return view('master::roles.create',compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $input['name'] = strtolower($input['name']);
        $input['guard_name'] = 'web';

        $role = ModelsRole::create($input);

        // detail permission
        if (isset($input['permission_id'])) {
            $role->syncPermissions($input['permission_id']);
        }

        Flash::success('Hak akses berhasil disimpan.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Hak akses tidak ditemukan.');

            return redirect(route('roles.index'));
        }

        return view('master::roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Hak akses tidak ditemukan.');

            return redirect(route('roles.index'));
        }

        $permissions = RoleRepository::getDataGroup();

        $permissions_checked = [];
        if ($ModelsRole = ModelsRole::findById($role->id)) {
            $permissions_checked = $ModelsRole->permissions()->get();
        }

        return view('master::roles.edit',compact('permissions','permissions_checked'))->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $modelsRole = ModelsRole::findById($id);

        if (empty($modelsRole)) {
            Flash::error('Hak akses tidak ditemukan.');

            return redirect(route('roles.index'));
        }

        $input = $request->all();
        $input['name'] = strtolower($input['name']);

        $role = $this->roleRepository->update($input, $id);

        $modelsRole->syncPermissions(null); // delete all

        // detail permission
        if (isset($input['permission_id'])) {
            $modelsRole->syncPermissions($input['permission_id']);
        }

        Flash::success('Hak akses berhasil diperbarui.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelsRole = ModelsRole::findById($id);

        if (empty($modelsRole)) {
            Flash::error('Hak akses tidak ditemukan.');

            return redirect(route('roles.index'));
        }

        $modelsRole->syncPermissions(null);

        $this->roleRepository->delete($id);

        Flash::success('Hak akses berhasil dihapus.');

        return redirect(route('roles.index'));
    }
}
