<?php

namespace Modules\Transaction\Http\Controllers;

use App\Helpers\Human;
use Modules\Transaction\DataTables\IncomeDataTable;
use Modules\Transaction\Http\Requests\CreateIncomeRequest;
use Modules\Transaction\Http\Requests\UpdateIncomeRequest;
use Modules\Transaction\Repositories\IncomeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Modules\Master\Models\Warehouse;

class IncomeController extends AppBaseController
{
    /** @var  IncomeRepository */
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
    }

    /**
     * Display a listing of the Income.
     *
     * @param IncomeDataTable $incomeDataTable
     * @return Response
     */
    public function index(IncomeDataTable $incomeDataTable)
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        return $incomeDataTable
        ->with([
            'filter_warehouse' => request()->filter_warehouse,
            'filter_date' => request()->filter_date,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])
        ->render('transaction::incomes.index', $data);
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('transaction::incomes.create', $data);
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {
        $input = $request->all();

        $input['type'] = 0;
        $input['amount'] = Human::removeFormatRupiah($input['amount']);

        $income = $this->incomeRepository->create($input);

        Flash::success('Pemasukan berhasil disimpan.');

        return redirect(route('incomes.index'));
    }

    /**
     * Display the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Pemasukan tidak ditemukan.');

            return redirect(route('incomes.index'));
        }

        return view('transaction::incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Pemasukan tidak ditemukan.');

            return redirect(route('incomes.index'));
        }
        
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('transaction::incomes.edit',$data)->with('income', $income);
    }

    /**
     * Update the specified Income in storage.
     *
     * @param  int              $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Pemasukan tidak ditemukan.');

            return redirect(route('incomes.index'));
        }

        $input = $request->all();

        $input['amount'] = Human::removeFormatRupiah($input['amount']);

        $income = $this->incomeRepository->update($input, $id);

        Flash::success('Pemasukan berhasil diperbarui.');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Pemasukan tidak ditemukan.');

            return redirect(route('incomes.index'));
        }

        $this->incomeRepository->delete($id);

        Flash::success('Pemasukan berhasil dihapus.');

        return redirect(route('incomes.index'));
    }
}
