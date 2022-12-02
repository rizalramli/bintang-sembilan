<?php

namespace Modules\Master\Http\Controllers;

use Modules\Master\DataTables\SupplierDataTable;
use Modules\Master\Http\Requests\CreateSupplierRequest;
use Modules\Master\Http\Requests\UpdateSupplierRequest;
use Modules\Master\Repositories\SupplierRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SupplierController extends AppBaseController
{
    /** @var  SupplierRepository */
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the Supplier.
     *
     * @param SupplierDataTable $supplierDataTable
     * @return Response
     */
    public function index(SupplierDataTable $supplierDataTable)
    {
        return $supplierDataTable->render('master::suppliers.index');
    }

    /**
     * Show the form for creating a new Supplier.
     *
     * @return Response
     */
    public function create()
    {
        return view('master::suppliers.create');
    }

    /**
     * Store a newly created Supplier in storage.
     *
     * @param CreateSupplierRequest $request
     *
     * @return Response
     */
    public function store(CreateSupplierRequest $request)
    {
        $input = $request->all();

        $supplier = $this->supplierRepository->create($input);

        Flash::success('Supplier berhasil disimpan.');

        return redirect(route('suppliers.index'));
    }

    /**
     * Display the specified Supplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier tidak ditemukan.');

            return redirect(route('suppliers.index'));
        }

        return view('master::suppliers.show')->with('supplier', $supplier);
    }

    /**
     * Show the form for editing the specified Supplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier tidak ditemukan.');

            return redirect(route('suppliers.index'));
        }

        return view('master::suppliers.edit')->with('supplier', $supplier);
    }

    /**
     * Update the specified Supplier in storage.
     *
     * @param  int              $id
     * @param UpdateSupplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSupplierRequest $request)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier tidak ditemukan.');

            return redirect(route('suppliers.index'));
        }

        $supplier = $this->supplierRepository->update($request->all(), $id);

        Flash::success('Supplier berhasil diperbarui.');

        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified Supplier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier tidak ditemukan.');

            return redirect(route('suppliers.index'));
        }

        $this->supplierRepository->delete($id);

        Flash::success('Supplier berhasil dihapus.');

        return redirect(route('suppliers.index'));
    }
}
