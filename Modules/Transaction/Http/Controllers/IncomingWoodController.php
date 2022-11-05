<?php

namespace Modules\Transaction\Http\Controllers;

use App\Exports\TemplateExcel;
use App\Exports\Themes\IncomingWood;
use Modules\Transaction\DataTables\IncomingWoodDataTable;
use Modules\Transaction\Http\Requests\CreateIncomingWoodRequest;
use Modules\Transaction\Http\Requests\UpdateIncomingWoodRequest;
use Modules\Transaction\Repositories\IncomingWoodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Excel;
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
            Flash::error('Kayu masuk tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
        }

        $supplier = Supplier::pluck('name', 'id');
        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        $param = [];
        
        $param['get_by_incoming_wood_id'] = $id;

        $incomingWoodDetail = IncomingWoodRepository::getDetail($param);
        
        return view('transaction::incoming_woods.show',compact('supplier','warehouse','wood_type','incomingWoodDetail'))->with('incomingWood', $incomingWood);

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
            Flash::error('Kayu masuk tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
        }

        $supplier = Supplier::pluck('name', 'id');
        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        $param = [];
        
        $param['get_by_incoming_wood_id'] = $id;

        $incomingWoodDetail = IncomingWoodRepository::getDetail($param);
        

        return view('transaction::incoming_woods.edit',compact('supplier','warehouse','wood_type','incomingWoodDetail'))->with('incomingWood', $incomingWood);
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
            Flash::error('Kayu masuk tidak ditemukan.');

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
            Flash::error('Kayu masuk tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
        }

        $this->incomingWoodRepository->delete($id);

        Flash::success('Incoming Wood deleted successfully.');

        return redirect(route('incomingWoods.index'));
    }

    public function excel()
    {
        $filter_supplier = request()->filter_supplier;
        $filter_warehouse = request()->filter_warehouse;
        $filter_wood_type = request()->filter_wood_type;
        $filter_date = request()->filter_date;
        $filter_date_start = request()->filter_date_start;
        $filter_date_end = request()->filter_date_end;

        $param['get_by_supplier'] = $filter_supplier;
        $param['get_by_warehouse'] = $filter_warehouse;
        $param['get_by_wood_type'] = $filter_wood_type;

        if ($filter_date_start != null && $filter_date_end != null) {
            $param['get_by_date_start'] = $filter_date_start.' 00:00:00';
            $param['get_by_date_end'] = $filter_date_end.' 23:59:59';
        } else {
            if ($filter_date == 'day') {
                $param['get_by_date'] = Carbon::today();
            } else if ($filter_date == 'week') {
                $from_date = Carbon::now()->subDays(7);
                $to_date =  Carbon::today()->endOfDay();
                $param['get_by_date_start'] = $from_date;
                $param['get_by_date_end'] = $to_date;
            } else if ($filter_date == 'month') {
                $param['get_by_month'] = Carbon::now()->month;
                $param['get_by_year'] = Carbon::now()->year;
            } else if ($filter_date == 'year') {
                $param['get_by_year'] = Carbon::now()->year;
            }
        }

        $query = IncomingWoodRepository::getData($param)->get();
        
        return Excel::download(new TemplateExcel($query, new IncomingWood), 'kayu_masuk.xlsx'); 
    }
    
}
