<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\UserDataTable;
use Modules\Master\Http\Requests\CreateUserRequest;
use Modules\Master\Http\Requests\UpdateUserRequest;
use Modules\Master\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\Role;
use Modules\Master\Models\Warehouse;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('master::users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name');
        $warehouse = Warehouse::pluck('name', 'id');
        return view('master::users.create',compact('roles','warehouse'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = $this->userRepository->create($input);

        $user->assignRole($request->input('roles'));

        Flash::success('Pengguna berhasil disimpan.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Pengguna tidak ditemukan.');

            return redirect(route('users.index'));
        }

        return view('master::users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Pengguna tidak ditemukan.');

            return redirect(route('users.index'));
        }

        $roles = Role::pluck('name', 'name');
        $userRole = $user->roles->pluck('name', 'name');
        $warehouse = Warehouse::pluck('name', 'id');
        $userWarehouse = json_decode($user->warehouse_id);

        return view('master::users.edit',compact('roles', 'userRole','warehouse','userWarehouse'))->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Pengguna tidak ditemukan.');

            return redirect(route('users.index'));
        }

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $input['warehouse_id'] = json_encode($request->input('warehouse'));

        $user = $this->userRepository->update($input, $id);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        Flash::success('Pengguna berhasil diperbarui.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Pengguna tidak ditemukan.');

            return redirect(route('users.index'));
        }

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $this->userRepository->delete($id);

        Flash::success('Pengguna berhasil dihapus.');

        return redirect(route('users.index'));
    }
}
