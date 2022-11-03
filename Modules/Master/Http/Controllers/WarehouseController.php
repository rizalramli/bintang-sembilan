<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\WarehouseDataTable;
use Modules\Master\Http\Requests\CreateWarehouseRequest;
use Modules\Master\Http\Requests\UpdateWarehouseRequest;
use Modules\Master\Repositories\WarehouseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WarehouseController extends AppBaseController
{
    /** @var  WarehouseRepository */
    private $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepo)
    {
        $this->warehouseRepository = $warehouseRepo;
    }

    /**
     * Display a listing of the Warehouse.
     *
     * @param WarehouseDataTable $warehouseDataTable
     * @return Response
     */
    public function index(WarehouseDataTable $warehouseDataTable)
    {
        return $warehouseDataTable->render('master::warehouses.index');
    }

    /**
     * Show the form for creating a new Warehouse.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::warehouses.create');
    }

    /**
     * Store a newly created Warehouse in storage.
     *
     * @param CreateWarehouseRequest $request
     *
     * @return Response
     */
    public function store(CreateWarehouseRequest $request)
    {
        $input = $request->all();

        $warehouse = $this->warehouseRepository->create($input);

        Flash::success('Gudang berhasil disimpan.');

        return redirect(route('warehouses.index'));
    }

    /**
     * Display the specified Warehouse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error('Gudang tidak ditemukan.');

            return redirect(route('warehouses.index'));
        }

        return view('master::warehouses.show')->with('warehouse', $warehouse);
    }

    /**
     * Show the form for editing the specified Warehouse.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error('Gudang tidak ditemukan.');

            return redirect(route('warehouses.index'));
        }

        return view('master::warehouses.edit')->with('warehouse', $warehouse);
    }

    /**
     * Update the specified Warehouse in storage.
     *
     * @param  int              $id
     * @param UpdateWarehouseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWarehouseRequest $request)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error('Gudang tidak ditemukan.');

            return redirect(route('warehouses.index'));
        }

        $warehouse = $this->warehouseRepository->update($request->all(), $id);

        Flash::success('Gudang berhasil diperbarui.');

        return redirect(route('warehouses.index'));
    }

    /**
     * Remove the specified Warehouse from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $warehouse = $this->warehouseRepository->find($id);

        if (empty($warehouse)) {
            Flash::error('Gudang tidak ditemukan.');

            return redirect(route('warehouses.index'));
        }

        $this->warehouseRepository->delete($id);

        Flash::success('Gudang berhasil dihapus.');

        return redirect(route('warehouses.index'));
    }
}
