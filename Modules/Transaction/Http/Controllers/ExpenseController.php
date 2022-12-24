<?php

namespace Modules\Transaction\Http\Controllers;

use App\Helpers\Human;
use Modules\Transaction\DataTables\ExpenseDataTable;
use Modules\Transaction\Http\Requests;
use Modules\Transaction\Http\Requests\CreateExpenseRequest;
use Modules\Transaction\Http\Requests\UpdateExpenseRequest;
use Modules\Transaction\Repositories\ExpenseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Employee\Models\Salary;
use Response;
use Modules\Master\Models\Warehouse;
use Modules\Transaction\Models\IncomingWood;

class ExpenseController extends AppBaseController
{
    /** @var  ExpenseRepository */
    private $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepo)
    {
        $this->expenseRepository = $expenseRepo;
    }

    /**
     * Display a listing of the Expense.
     *
     * @param ExpenseDataTable $expenseDataTable
     * @return Response
     */
    public function index(ExpenseDataTable $expenseDataTable)
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return $expenseDataTable
        ->with([
            'filter_warehouse' => request()->filter_warehouse,
            'filter_date' => request()->filter_date,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])
        ->render('transaction::expenses.index', $data);
    }

    /**
     * Show the form for creating a new Expense.
     *
     * @return Response
     */
    public function create()
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('transaction::expenses.create',$data);
    }

    /**
     * Store a newly created Expense in storage.
     *
     * @param CreateExpenseRequest $request
     *
     * @return Response
     */
    public function store(CreateExpenseRequest $request)
    {
        $input = $request->all();

        $input['type'] = 1;
        $input['amount'] = Human::removeFormatRupiah($input['amount']);

        $expense = $this->expenseRepository->create($input);

        Flash::success('Pengeluaran berhasil disimpan.');

        return redirect(route('expenses.index'));
    }

    /**
     * Display the specified Expense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Pengeluaran tidak ditemukan.');

            return redirect(route('expenses.index'));
        }

        return view('transaction::expenses.show')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified Expense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Pengeluaran tidak ditemukan.');

            return redirect(route('expenses.index'));
        }

        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('transaction::expenses.edit',$data)->with('expense', $expense);
    }

    /**
     * Update the specified Expense in storage.
     *
     * @param  int              $id
     * @param UpdateExpenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpenseRequest $request)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Pengeluaran tidak ditemukan.');

            return redirect(route('expenses.index'));
        }

        $input = $request->all();

        $input['amount'] = Human::removeFormatRupiah($input['amount']);

        $expense = $this->expenseRepository->update($input, $id);

        if($expense->ref_id != null && $expense->ref_table != null){
            if($expense->ref_table == 'incoming_wood'){
                $incomingWood = IncomingWood::find($expense->ref_id);
                $incomingWood->update([
                    'warehouse_id' => $input['warehouse_id'],
                    'cost' => $input['amount'],
                ]);
            } else if($expense->ref_table == 'salary'){
                $salary = Salary::find($expense->ref_id);
                $salary->update([
                    'warehouse_id' => $input['warehouse_id'],
                    'total' => $input['amount'],
                ]);
            }
        }

        Flash::success('Pengeluaran berhasil diperbarui.');

        return redirect(route('expenses.index'));
    }

    /**
     * Remove the specified Expense from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Pengeluaran tidak ditemukan.');

            return redirect(route('expenses.index'));
        }

        $this->expenseRepository->delete($id);

        Flash::success('Pengeluaran berhasil dihapus.');

        return redirect(route('expenses.index'));
    }
}
