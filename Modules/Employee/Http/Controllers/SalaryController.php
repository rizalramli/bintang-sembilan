<?php

namespace Modules\Employee\Http\Controllers;

use App\Helpers\Human;
use Modules\Employee\DataTables\SalaryDataTable;
use Modules\Employee\Http\Requests;
use Modules\Employee\Http\Requests\CreateSalaryRequest;
use Modules\Employee\Http\Requests\UpdateSalaryRequest;
use Modules\Employee\Repositories\SalaryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Modules\Master\Models\Employee;
use Modules\Transaction\Models\Finance;
use Modules\Master\Models\Warehouse;
use Carbon\Carbon;

class SalaryController extends AppBaseController
{
    /** @var  SalaryRepository */
    private $salaryRepository;

    public function __construct(SalaryRepository $salaryRepo)
    {
        $this->salaryRepository = $salaryRepo;
    }

    /**
     * Display a listing of the Salary.
     *
     * @param SalaryDataTable $salaryDataTable
     * @return Response
     */
    public function index(SalaryDataTable $salaryDataTable)
    {
        $data['employee'] = Employee::join('users', 'users.id', '=', 'employee.user_id')->pluck('users.name', 'employee.id')->prepend('Semua Mandor', null);
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return $salaryDataTable->with([
            'filter_employee' => request()->filter_employee,
            'filter_warehouse' => request()->filter_warehouse,
            'filter_date' => request()->filter_date,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])->render('employee::salaries.index',$data);
    }

    /**
     * Show the form for creating a new Salary.
     *
     * @return Response
     */
    public function create()
    {
        $data['employee'] = Employee::join('users', 'users.id', '=', 'employee.user_id')->pluck('users.name', 'employee.id');
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('employee::salaries.create',$data);
    }

    /**
     * Store a newly created Salary in storage.
     *
     * @param CreateSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaryRequest $request)
    {
        $input = $request->all();

        $input['price'] = Human::removeFormatRupiah($input['price']);
        $input['total'] = Human::removeFormatRupiah($input['total']);
        $total = $input['total'];

        $salary = $this->salaryRepository->create($input);

        if($salary){
            if($total > 0)
            {
                $warehouse = Warehouse::find($request->warehouse_id);
                $employee = Employee::select('users.name')->join('users', 'users.id', '=', 'employee.user_id')->where('employee.id',$request->employee_id)->first();
                $description = 'Penggajian di '.$warehouse->name.' dengan mandor '.$employee->name.' dengan volume '.$request->volume.' m3';
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 1,
                    'amount' => $total,
                    'ref_id' => $salary->id,
                    'ref_table' => 'salary',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        Flash::success('Penggajian berhasil disimpan.');

        return redirect(route('salaries.index'));
    }

    /**
     * Display the specified Salary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Penggajian tidak ditemukan');

            return redirect(route('salaries.index'));
        }

        return view('employee::salaries.show')->with('salary', $salary);
    }

    /**
     * Show the form for editing the specified Salary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Penggajian tidak ditemukan');

            return redirect(route('salaries.index'));
        }

        $data['employee'] = Employee::join('users', 'users.id', '=', 'employee.user_id')->pluck('users.name', 'employee.id');
        $data['warehouse'] = Warehouse::pluck('name', 'id');

        return view('employee::salaries.edit',$data)->with('salary', $salary);
    }

    /**
     * Update the specified Salary in storage.
     *
     * @param  int              $id
     * @param UpdateSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaryRequest $request)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Penggajian tidak ditemukan');

            return redirect(route('salaries.index'));
        }

        $input = $request->all();

        $input['price'] = Human::removeFormatRupiah($input['price']);
        $input['total'] = Human::removeFormatRupiah($input['total']);
        $total = $input['total'];

        $salary = $this->salaryRepository->update($input, $id);

        if($salary)
        {
            if($total > 0)
            {
                $warehouse = Warehouse::find($request->warehouse_id);
                $employee = Employee::select('users.name')->join('users', 'users.id', '=', 'employee.user_id')->where('employee.id',$request->employee_id)->first();
                $description = 'Penggajian di '.$warehouse->name.' dengan mandor '.$employee->name.' dengan volume '.$request->volume.' m3';
                $finance = Finance::where(['ref_id' => $salary->id,'ref_table' => 'salary'])->first();
                if(empty($finance))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $total,
                        'ref_id' => $salary->id,
                        'ref_table' => 'salary',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $salary->id,'ref_table' => 'salary'])->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $total,
                        'ref_id' => $salary->id,
                        'ref_table' => 'salary',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        Flash::success('Penggajian berhasil diperbarui.');

        return redirect(route('salaries.index'));
    }

    /**
     * Remove the specified Salary from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Penggajian tidak ditemukan');

            return redirect(route('salaries.index'));
        }

        Finance::where(['ref_id' => $id,'ref_table' => 'salary'])->delete();

        $this->salaryRepository->delete($id);

        Flash::success('Penggajian berhasil dihapus.');

        return redirect(route('salaries.index'));
    }
}
