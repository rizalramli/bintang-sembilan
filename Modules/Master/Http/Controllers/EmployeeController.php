<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\EmployeeDataTable;
use Modules\Master\Http\Requests\CreateEmployeeRequest;
use Modules\Master\Http\Requests\UpdateEmployeeRequest;
use Modules\Master\Repositories\EmployeeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Modules\Master\Models\Warehouse;
use Response;

class EmployeeController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     *
     * @param EmployeeDataTable $employeeDataTable
     * @return Response
     */
    public function index(EmployeeDataTable $employeeDataTable)
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);

        return $employeeDataTable->with([
            'filter_warehouse' => request()->filter_warehouse
        ])->render('master::employees.index',$data);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        $warehouse = Warehouse::pluck('name', 'id');
        return view('master::employees.create',compact('warehouse'));
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'warehouse_id' => json_encode([$input['warehouse']])
        ]);

        $user->assignRole(['karyawan']);

        $input['user_id'] = $user->id;

        $employee = $this->employeeRepository->create($input);

        Flash::success('Karyawan berhasil disimpan.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Karyawan tidak ditemukan.');

            return redirect(route('employees.index'));
        }

        return view('master::employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Karyawan tidak ditemukan.');

            return redirect(route('employees.index'));
        }
        $warehouse = Warehouse::pluck('name', 'id');
        $user = User::find($employee->user_id);
        $employee->name = $user->name;
        $employee->email = $user->email;
        $employee->warehouse_id = implode("",json_decode($user->warehouse_id));
        return view('master::employees.edit',compact('warehouse'))->with('employee', $employee);
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Karyawan tidak ditemukan.');

            return redirect(route('employees.index'));
        }

        $input = $request->all();

        $user = User::where('id', $employee->user_id)
        ->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'warehouse_id' => json_encode([$input['warehouse']])
        ]);

        $employee = $this->employeeRepository->update($input, $id);

        Flash::success('Karyawan berhasil diperbarui.');

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Karyawan tidak ditemukan.');

            return redirect(route('employees.index'));
        }

        $user = User::find($employee->user_id)->delete();

        $this->employeeRepository->delete($id);

        Flash::success('Karyawan berhasil dihapus.');

        return redirect(route('employees.index'));
    }
}
