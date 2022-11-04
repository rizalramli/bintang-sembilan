<?php

namespace Modules\Transaction\Http\Controllers;

use Modules\Transaction\DataTables\IncomingWoodDataTable;
use Modules\Transaction\Http\Requests\CreateIncomingWoodRequest;
use Modules\Transaction\Http\Requests\UpdateIncomingWoodRequest;
use Modules\Transaction\Repositories\IncomingWoodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\Models\Supplier;
use Modules\Master\Models\Warehouse;
use Modules\Master\Models\WoodType;
use Response;

class IncomingWoodController extends AppBaseController
{
    /** @var  IncomingWoodRepository */
    private $incomingWoodRepository;

    public function __construct(IncomingWoodRepository $incomingWoodRepo)
    {
        $this->incomingWoodRepository = $incomingWoodRepo;
    }

    /**
     * Display a listing of the IncomingWood.
     *
     * @param IncomingWoodDataTable $incomingWoodDataTable
     * @return Response
     */
    public function index(IncomingWoodDataTable $incomingWoodDataTable)
    {
        $data['supplier'] = Supplier::pluck('name', 'id')->prepend('Semua Supplier', null);
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        $data['wood_type'] = WoodType::pluck('name', 'id')->prepend('Semua Jenis', null);

        return $incomingWoodDataTable
        ->with([
            'filter_supplier' => request()->filter_supplier,
            'filter_warehouse' => request()->filter_warehouse,
            'filter_wood_type' => request()->filter_wood_type,
            'filter_date' => request()->filter_date,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])
        ->render('transaction::incoming_woods.index', $data);
    }

    /**
     * Show the form for creating a new IncomingWood.
     *
     * @return Response
     */
    public function create()
    {
        return view('incoming_woods.create');
    }

    /**
     * Store a newly created IncomingWood in storage.
     *
     * @param CreateIncomingWoodRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomingWoodRequest $request)
    {
        $input = $request->all();

        $incomingWood = $this->incomingWoodRepository->create($input);

        Flash::success('Incoming Wood saved successfully.');

        return redirect(route('incomingWoods.index'));
    }

    /**
     * Display the specified IncomingWood.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $incomingWood = $this->incomingWoodRepository->find($id);

        if (empty($incomingWood)) {
            Flash::error('Incoming Wood not found');

            return redirect(route('incomingWoods.index'));
        }

        return view('incoming_woods.show')->with('incomingWood', $incomingWood);
    }

    /**
     * Show the form for editing the specified IncomingWood.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $incomingWood = $this->incomingWoodRepository->find($id);

        if (empty($incomingWood)) {
            Flash::error('Incoming Wood not found');

            return redirect(route('incomingWoods.index'));
        }

        return view('incoming_woods.edit')->with('incomingWood', $incomingWood);
    }

    /**
     * Update the specified IncomingWood in storage.
     *
     * @param  int              $id
     * @param UpdateIncomingWoodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomingWoodRequest $request)
    {
        $incomingWood = $this->incomingWoodRepository->find($id);

        if (empty($incomingWood)) {
            Flash::error('Incoming Wood not found');

            return redirect(route('incomingWoods.index'));
        }

        $incomingWood = $this->incomingWoodRepository->update($request->all(), $id);

        Flash::success('Incoming Wood updated successfully.');

        return redirect(route('incomingWoods.index'));
    }

    /**
     * Remove the specified IncomingWood from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $incomingWood = $this->incomingWoodRepository->find($id);

        if (empty($incomingWood)) {
            Flash::error('Incoming Wood not found');

            return redirect(route('incomingWoods.index'));
        }

        $this->incomingWoodRepository->delete($id);

        Flash::success('Incoming Wood deleted successfully.');

        return redirect(route('incomingWoods.index'));
    }
}
