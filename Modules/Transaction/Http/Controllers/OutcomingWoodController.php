<?php

namespace Modules\Transaction\Http\Controllers;

use Modules\Transaction\DataTables\OutcomingWoodDataTable;
use Modules\Transaction\Http\Requests;
use Modules\Transaction\Http\Requests\CreateOutcomingWoodRequest;
use Modules\Transaction\Http\Requests\UpdateOutcomingWoodRequest;
use Modules\Transaction\Repositories\OutcomingWoodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\Models\Customer;
use Modules\Master\Models\TemplateWoodOut;
use Modules\Master\Models\Warehouse;
use Modules\Master\Models\WoodType;
use Response;

class OutcomingWoodController extends AppBaseController
{
    /** @var  OutcomingWoodRepository */
    private $outcomingWoodRepository;

    public function __construct(OutcomingWoodRepository $outcomingWoodRepo)
    {
        $this->outcomingWoodRepository = $outcomingWoodRepo;
    }

    /**
     * Display a listing of the OutcomingWood.
     *
     * @param OutcomingWoodDataTable $outcomingWoodDataTable
     * @return Response
     */
    public function index(OutcomingWoodDataTable $outcomingWoodDataTable)
    {
        $data['customer'] = Customer::pluck('name', 'id')->prepend('Semua Customer', null);
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        $data['wood_type'] = WoodType::pluck('name', 'id')->prepend('Semua Jenis', null);

        return $outcomingWoodDataTable
        ->with([
            'filter_customer' => request()->filter_customer,
            'filter_warehouse' => request()->filter_warehouse,
            'filter_wood_type' => request()->filter_wood_type,
            'filter_date' => request()->filter_date,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])
        ->render('transaction::outcoming_woods.index', $data);
    }

    /**
     * Show the form for creating a new OutcomingWood.
     *
     * @return Response
     */
    public function create()
    {
        $data['template_wood'] = TemplateWoodOut::pluck('name', 'id');
        $data['customer'] = Customer::pluck('name', 'id');
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        $data['wood_type'] = WoodType::pluck('name', 'id');
        return view('transaction::outcoming_woods.create',$data);
    }

    /**
     * Store a newly created OutcomingWood in storage.
     *
     * @param CreateOutcomingWoodRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomingWoodRequest $request)
    {
        $input = $request->all();

        $outcomingWood = $this->outcomingWoodRepository->create($input);

        Flash::success('Kayu keluar berhasil disimpan.');

        return redirect(route('outcomingWoods.index'));
    }

    /**
     * Display the specified OutcomingWood.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outcomingWood = $this->outcomingWoodRepository->find($id);

        if (empty($outcomingWood)) {
            Flash::error('Kayu keluar tidak ditemukan.');

            return redirect(route('outcomingWoods.index'));
        }

        return view('transaction::outcoming_woods.show')->with('outcomingWood', $outcomingWood);
    }

    /**
     * Show the form for editing the specified OutcomingWood.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outcomingWood = $this->outcomingWoodRepository->find($id);

        if (empty($outcomingWood)) {
            Flash::error('Kayu keluar tidak ditemukan.');

            return redirect(route('outcomingWoods.index'));
        }

        return view('transaction::outcoming_woods.edit')->with('outcomingWood', $outcomingWood);
    }

    /**
     * Update the specified OutcomingWood in storage.
     *
     * @param  int              $id
     * @param UpdateOutcomingWoodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomingWoodRequest $request)
    {
        $outcomingWood = $this->outcomingWoodRepository->find($id);

        if (empty($outcomingWood)) {
            Flash::error('Kayu keluar tidak ditemukan.');

            return redirect(route('outcomingWoods.index'));
        }

        $outcomingWood = $this->outcomingWoodRepository->update($request->all(), $id);

        Flash::success('Kayu keluar berhasil diperbarui.');

        return redirect(route('outcomingWoods.index'));
    }

    /**
     * Remove the specified OutcomingWood from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outcomingWood = $this->outcomingWoodRepository->find($id);

        if (empty($outcomingWood)) {
            Flash::error('Kayu keluar tidak ditemukan.');

            return redirect(route('outcomingWoods.index'));
        }

        $this->outcomingWoodRepository->delete($id);

        Flash::success('Kayu keluar berhasil dihapus.');

        return redirect(route('outcomingWoods.index'));
    }

    public function getTemplate()
    {
        $id = request()->id;
        $data = OutcomingWoodRepository::getTemplate($id);
        is_null($data) ? $status = false : $status = true;  
        return response()->json(['status' => $status, 'data' => $data]);
    }

    public function getTotal()
    {
        $array = [];
        $total_volume = 0;
        $total_qty = 0;
        foreach(request()->item2_length as $key => $value) {
            $sub_qty = 0;
            $sub_total_volume  = 0;
            foreach(request()->item2_length[$key] as $key2 => $value2) {
                $item_2_qty = request()->item2_qty[$key][$key2] ?? 0;
                $item_2_volume = request()->item2_volume[$key][$key2];

                $sub_qty += $item_2_qty;
                $sub_total_volume += $item_2_volume;
            }
            $array[] = round($sub_total_volume,4);
            $total_volume += $sub_total_volume;
            $total_qty += $sub_qty;
        }
        return response()->json(['status' => true,'total_qty' => $total_qty,'total_volume' => round($total_volume,4), 'sub_total_volume' => $array]);
    }
}
