<?php

namespace Modules\Transaction\Http\Controllers;

use App\Exports\TemplateExcel;
use App\Exports\Themes\IncomingWood;
use App\Helpers\Human;
use Modules\Transaction\DataTables\IncomingWoodTradeDataTable;
use Modules\Transaction\Http\Requests\CreateIncomingWoodTradeRequest;
use Modules\Transaction\Http\Requests\UpdateIncomingWoodTradeRequest;
use Modules\Transaction\Repositories\IncomingWoodTradeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Company;
use Modules\Master\Models\Supplier;
use Modules\Master\Models\TemplateWood;
use Modules\Master\Models\Warehouse;
use Modules\Master\Models\WoodType;
use Modules\Master\Repositories\SupplierRepository;
use Modules\Transaction\Models\IncomingWoodDetail;
use Modules\Transaction\Models\IncomingWoodDetailItem;
use Modules\Transaction\Models\Finance;
use Response;


class IncomingWoodTradeController extends AppBaseController
{
    /** @var  IncomingWoodRepository */
    private $incomingWoodRepository;
    private $supplierRepository;

    public function __construct(IncomingWoodTradeRepository $incomingWoodRepo,SupplierRepository $supplierRepo)
    {
        $this->incomingWoodRepository = $incomingWoodRepo;
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the IncomingWood.
     *
     * @param IncomingWoodDataTable $incomingWoodDataTable
     * @return Response
     */
    public function index(IncomingWoodTradeDataTable $incomingWoodDataTable)
    {
        $data['supplier'] = Supplier::selectRaw('concat(name, " | ", address) as name, id')->pluck('name', 'id')->prepend('Semua Supplier', null);
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
        ->render('transaction::incoming_wood_trades.index', $data);
    }

    /**
     * Show the form for creating a new IncomingWood.
     *
     * @return Response
     */
    public function create()
    {
        $template_wood = TemplateWood::pluck('name', 'id');
        $supplier = Supplier::selectRaw('concat(name, " | ", address) as name, id')->pluck('name', 'id');
        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');
        return view('transaction::incoming_wood_trades.create',compact('template_wood','supplier','warehouse','wood_type'));
    }

    /**
     * Store a newly created IncomingWood in storage.
     *
     * @param CreateIncomingWoodRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomingWoodTradeRequest $request)
    {
        $input = $request->all();
        
        $input['type'] = 2;
        $input['created_by'] = Auth::id();
        $input['updated_by'] = Auth::id();

        $cost = Human::removeFormatRupiah($input['cost']);

        $input['cost'] = $cost;

        $incomingWood = $this->incomingWoodRepository->create($input);

        if($incomingWood)
        {
            if($cost > 0)
            {
                $supplier = Supplier::find($request->supplier_id);
                $warehouse = Warehouse::find($request->warehouse_id);
                $description = 'Pembayaran kayu masuk di '.$warehouse->name.' atas nama '.$supplier->name.' dengan nopol '.$input['number_vehicles'];
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 1,
                    'amount' => $cost,
                    'ref_id' => $incomingWood->id,
                    'flag' => 1,
                    'ref_table' => 'incoming_wood',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        if(is_array($input['item2_diameter']) && count($input['item2_diameter']) > 0){
            foreach($input['item2_diameter'] as $key => $value){
                $incoming_wood_detail = IncomingWoodDetail::create([
                    'incoming_wood_id' => $incomingWood->id,
                    'seq' => $key + 1,
                    'sub_total_volume' => $input['item_sub_total_volume'][$key]
                ]);
                foreach($value as $key2 => $value2){
                    $incoming_wood_detail_item = IncomingWoodDetailItem::create([
                        'incoming_wood_detail_id' =>  $incoming_wood_detail->id,
                        'diameter' => $value2,
                        'qty' =>  $input['item2_qty'][$key][$key2],
                        'volume' => $input['item2_volume'][$key][$key2]
                    ]);
                }
            }
            
        }
        Flash::success('Kayu Masuk Dagang berhasil disimpan.');

        return redirect(route('incomingWoodTrades.index'));
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
            Flash::error('Kayu Masuk Dagang tidak ditemukan.');

            return redirect(route('incomingWoodTrades.index'));
        }

        $template_wood = TemplateWood::pluck('name', 'id');
        $supplier = Supplier::selectRaw('concat(name, " | ", address) as name, id')->pluck('name', 'id');
        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        $param = [];
        
        $param['get_by_incoming_wood_id'] = $id;

        $incomingWoodDetail = IncomingWoodTradeRepository::getDetail($param);
        
        return view('transaction::incoming_wood_trades.show',compact('template_wood','supplier','warehouse','wood_type','incomingWoodDetail'))->with('incomingWood', $incomingWood);

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
            Flash::error('Kayu Masuk Dagang tidak ditemukan.');

            return redirect(route('incomingWoodTrades.index'));
        }

        $template_wood = TemplateWood::pluck('name', 'id');
        $supplier = Supplier::selectRaw('concat(name, " | ", address) as name, id')->pluck('name', 'id');
        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        $param = [];
        
        $param['get_by_incoming_wood_id'] = $id;

        $incomingWoodDetail = IncomingWoodTradeRepository::getDetail($param);
        

        return view('transaction::incoming_wood_trades.edit',compact('template_wood','supplier','warehouse','wood_type','incomingWoodDetail'))->with('incomingWood', $incomingWood);
    }

    /**
     * Update the specified IncomingWood in storage.
     *
     * @param  int              $id
     * @param UpdateIncomingWoodRequest $request
     *
     * @return Response
     */
    public function update(UpdateIncomingWoodTradeRequest $request)
    {
        $input = $request->all();

        $id = $input['id'];

        $incomingWood = $this->incomingWoodRepository->find($id);

        if (empty($incomingWood)) {
            Flash::error('Kayu Masuk Dagang tidak ditemukan.');

            return redirect(route('incomingWoodTrades.index'));
        }

        $cost = Human::removeFormatRupiah($input['cost']);

        $input['cost'] = $cost;

        $incomingWood = $this->incomingWoodRepository->update($input, $id);

        if($incomingWood)
        {
            if($cost > 0)
            {
                $supplier = Supplier::find($request->supplier_id);
                $warehouse = Warehouse::find($request->warehouse_id);
                $description = 'Pembayaran kayu masuk di '.$warehouse->name.' atas nama '.$supplier->name.' dengan nopol '.$input['number_vehicles'];
                $finance = Finance::where(['ref_id' => $incomingWood->id,'ref_table' => 'incoming_wood'])->first();
                if(empty($finance))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $cost,
                        'ref_id' => $incomingWood->id,
                        'ref_table' => 'incoming_wood',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $incomingWood->id,'ref_table' => 'incoming_wood'])->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => Human::removeFormatRupiah($input['cost']),
                        'ref_id' => $incomingWood->id,
                        'ref_table' => 'incoming_wood',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        if(is_array($input['item2_diameter']) && count($input['item2_diameter']) > 0){

            // Delete Detail
            $incoming_wood_detail = IncomingWoodDetail::where('incoming_wood_id',$id);
            if($incoming_wood_detail->count() > 0){
                foreach($incoming_wood_detail->get() as $value)
                {
                    IncomingWoodDetailItem::where('incoming_wood_detail_id',$value->id)->delete();
                }
                $incoming_wood_detail->delete();
            }

            foreach($input['item2_diameter'] as $key => $value){
                $incoming_wood_detail = IncomingWoodDetail::create([
                    'incoming_wood_id' => $incomingWood->id,
                    'seq' => $key + 1,
                    'sub_total_volume' => $input['item_sub_total_volume'][$key]
                ]);
                foreach($value as $key2 => $value2){
                    $incoming_wood_detail_item = IncomingWoodDetailItem::create([
                        'incoming_wood_detail_id' =>  $incoming_wood_detail->id,
                        'diameter' => $value2,
                        'qty' =>  $input['item2_qty'][$key][$key2],
                        'volume' => $input['item2_volume'][$key][$key2]
                    ]);
                }
            }
            
        }

        Flash::success('Kayu Masuk Dagang berhasil diperbarui.');

        return redirect(route('incomingWoodTrades.index'));
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
            Flash::error('Kayu Masuk Dagang tidak ditemukan.');

            return redirect(route('incomingWoodTrades.index'));
        }

        // Delete Detail
        $incoming_wood_detail = IncomingWoodDetail::where('incoming_wood_id',$id);
        if($incoming_wood_detail->count() > 0){
            foreach($incoming_wood_detail->get() as $value)
            {
                IncomingWoodDetailItem::where('incoming_wood_detail_id',$value->id)->delete();
            }
            $incoming_wood_detail->delete();
        }

        Finance::where(['ref_id' => $id,'ref_table' => 'incoming_wood'])->delete();

        $this->incomingWoodRepository->delete($id);

        Flash::success('Kayu Masuk Dagang berhasil dihapus.');

        return redirect(route('incomingWoodTrades.index'));
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
                $from_date = Carbon::now()->subDays(7)->startOfDay();
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

        $query = IncomingWoodTradeRepository::getData($param)->get();
        
        return Excel::download(new TemplateExcel($query, new IncomingWood), 'kayu_masuk.xlsx'); 
    }

    public function getTemplate()
    {
        $id = request()->id;
        $data = IncomingWoodTradeRepository::getTemplate($id);
        is_null($data) ? $status = false : $status = true;  
        return response()->json(['status' => $status, 'data' => $data]);
    }

    public function getNumberVehicle()
    {
        $id = request()->id;
        $data = IncomingWoodTradeRepository::getNumberVehicle($id);
        is_null($data) ? $status = false : $status = true;  
        return response()->json(['status' => $status, 'data' => $data]);
    }

    public function getTotal()
    {
        $array = [];
        $total_volume = 0;
        $total_qty = 0;
        foreach(request()->item2_diameter as $key => $value) {
            $sub_qty = 0;
            $sub_total_volume  = 0;
            foreach(request()->item2_diameter[$key] as $key2 => $value2) {
                $item_2_qty = request()->item2_qty[$key][$key2] ?? 0;
                $item_2_volume = request()->item2_volume[$key][$key2];

                $sub_qty += $item_2_qty;
                $sub_total_volume += $item_2_qty * $item_2_volume;
            }
            $array[] = round($sub_total_volume,4);
            $total_volume += $sub_total_volume;
            $total_qty += $sub_qty;
        }
        return response()->json(['status' => true,'total_qty' => $total_qty,'total_volume' => round($total_volume,4), 'sub_total_volume' => $array]);
    }

    public function invoice($id)
    {
        $param = [];

        $incomingWood = $this->incomingWoodRepository->find($id);
        $supplier = $this->supplierRepository->find($incomingWood->supplier_id);

        $param['get_by_incoming_wood_id'] = $id;
        $incomingWoodDetail = IncomingWoodTradeRepository::getDetail($param);

        $data['company'] = Company::find(1);
        $data['incomingWoodDetail'] = $incomingWoodDetail;
        $data['incomingWood'] = $incomingWood;
        $data['supplier'] = $supplier;

        $pdf = \PDF::loadView('transaction::incoming_wood_trades.invoice',$data);
        return $pdf->stream('Invoice.pdf', array("Attachment" => false));
    }
    
}
