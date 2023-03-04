<?php

namespace Modules\Transaction\Http\Controllers;

use Modules\Transaction\DataTables\OutsideWarehousePurchaseDataTable;
use Modules\Transaction\Http\Requests\CreateOutsideWarehousePurchaseRequest;
use Modules\Transaction\Http\Requests\UpdateOutsideWarehousePurchaseRequest;
use Modules\Transaction\Repositories\OutsideWarehousePurchaseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Modules\Master\Models\Warehouse;
use App\Helpers\Human;

class OutsideWarehousePurchaseController extends AppBaseController
{
    /** @var  OutsideWarehousePurchaseRepository */
    private $outsideWarehousePurchaseRepository;

    public function __construct(OutsideWarehousePurchaseRepository $outsideWarehousePurchaseRepo)
    {
        $this->outsideWarehousePurchaseRepository = $outsideWarehousePurchaseRepo;
    }

    /**
     * Display a listing of the OutsideWarehousePurchase.
     *
     * @param OutsideWarehousePurchaseDataTable $outsideWarehousePurchaseDataTable
     * @return Response
     */
    public function index(OutsideWarehousePurchaseDataTable $outsideWarehousePurchaseDataTable)
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        $data['number_vehicle'] = Human::getVehicleNumberOutsideWarehousePurchases();
        
        return $outsideWarehousePurchaseDataTable
        ->with([
            'filter_warehouse' => request()->filter_warehouse,
            'filter_date' => request()->filter_date,
            'filter_number_vehicle' => request()->filter_number_vehicle,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])
        ->render('transaction::outside_warehouse_purchases.index', $data);
    }

    /**
     * Show the form for creating a new OutsideWarehousePurchase.
     *
     * @return Response
     */
    public function create()
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('transaction::outside_warehouse_purchases.create',$data);
    }

    /**
     * Store a newly created OutsideWarehousePurchase in storage.
     *
     * @param CreateOutsideWarehousePurchaseRequest $request
     *
     * @return Response
     */
    public function store(CreateOutsideWarehousePurchaseRequest $request)
    {
        $input = $request->all();
        
        $input['payment_factory'] = Human::removeFormatRupiah($input['payment_factory']);
        $input['fare_down'] = Human::removeFormatRupiah($input['fare_down']);
        $input['grand_total'] = Human::removeFormatRupiah($input['grand_total']);
        $input['fee'] = Human::removeFormatRupiah($input['fee']);
        $input['fare_truck'] = Human::removeFormatRupiah($input['fare_truck']);
        $input['paid'] = Human::removeFormatRupiah($input['paid']);
        $input['down_payment'] = Human::removeFormatRupiah($input['down_payment']);
        $input['nett'] = Human::removeFormatRupiah($input['nett']);

        $outsideWarehousePurchase = $this->outsideWarehousePurchaseRepository->create($input);

        Flash::success('Pembelian gudang luar berhasil disimpan.');

        return redirect(route('outsideWarehousePurchases.index'));
    }

    /**
     * Display the specified OutsideWarehousePurchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outsideWarehousePurchase = $this->outsideWarehousePurchaseRepository->find($id);

        if (empty($outsideWarehousePurchase)) {
            Flash::error('Pembelian gudang luar tidak ditemukan');

            return redirect(route('outsideWarehousePurchases.index'));
        }

        return view('transaction::outside_warehouse_purchases.show')->with('outsideWarehousePurchase', $outsideWarehousePurchase);
    }

    /**
     * Show the form for editing the specified OutsideWarehousePurchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outsideWarehousePurchase = $this->outsideWarehousePurchaseRepository->find($id);

        if (empty($outsideWarehousePurchase)) {
            Flash::error('Pembelian gudang luar tidak ditemukan');

            return redirect(route('outsideWarehousePurchases.index'));
        }

        $data['warehouse'] = Warehouse::pluck('name', 'id');

        return view('transaction::outside_warehouse_purchases.edit',$data)->with('outsideWarehousePurchase', $outsideWarehousePurchase);
    }

    /**
     * Update the specified OutsideWarehousePurchase in storage.
     *
     * @param  int              $id
     * @param UpdateOutsideWarehousePurchaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutsideWarehousePurchaseRequest $request)
    {
        $outsideWarehousePurchase = $this->outsideWarehousePurchaseRepository->find($id);

        if (empty($outsideWarehousePurchase)) {
            Flash::error('Pembelian gudang luar tidak ditemukan');

            return redirect(route('outsideWarehousePurchases.index'));
        }

        $input = $request->all();

        $input['payment_factory'] = Human::removeFormatRupiah($input['payment_factory']);
        $input['fare_down'] = Human::removeFormatRupiah($input['fare_down']);
        $input['grand_total'] = Human::removeFormatRupiah($input['grand_total']);
        $input['fee'] = Human::removeFormatRupiah($input['fee']);
        $input['fare_truck'] = Human::removeFormatRupiah($input['fare_truck']);
        $input['paid'] = Human::removeFormatRupiah($input['paid']);
        $input['down_payment'] = Human::removeFormatRupiah($input['down_payment']);
        $input['nett'] = Human::removeFormatRupiah($input['nett']);

        $outsideWarehousePurchase = $this->outsideWarehousePurchaseRepository->update($input, $id);

        Flash::success('Pembelian gudang luar berhasil diperbarui.');

        return redirect(route('outsideWarehousePurchases.index'));
    }

    /**
     * Remove the specified OutsideWarehousePurchase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outsideWarehousePurchase = $this->outsideWarehousePurchaseRepository->find($id);

        if (empty($outsideWarehousePurchase)) {
            Flash::error('Pembelian gudang luar tidak ditemukan');

            return redirect(route('outsideWarehousePurchases.index'));
        }

        $this->outsideWarehousePurchaseRepository->delete($id);

        Flash::success('Pembelian gudang luar berhasil dihapus.');

        return redirect(route('outsideWarehousePurchases.index'));
    }
}
