<?php

namespace Modules\Transaction\Http\Controllers;

use App\Helpers\Human;
use Modules\Transaction\DataTables\IncomingWoodDataTable;
use Modules\Transaction\Http\Requests\CreateIncomingWoodRequest;
use Modules\Transaction\Http\Requests\UpdateIncomingWoodRequest;
use Modules\Transaction\Repositories\IncomingWoodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Models\Supplier;
use Modules\Master\Models\TemplateWood;
use Modules\Master\Models\Warehouse;
use Modules\Master\Models\WoodType;
use Modules\Transaction\Models\IncomingWoodDetail;
use Modules\Transaction\Models\IncomingWoodDetailItem;
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
        ->render('transaction::incoming_woods.index', $data);
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
        return view('transaction::incoming_woods.create',compact('template_wood','supplier','warehouse','wood_type'));
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
        
        $input['type'] = 1;
        $input['created_by'] = Auth::id();
        $input['updated_by'] = Auth::id();
        $input['cost'] = Human::removeFormatRupiah($input['cost']);

        $incomingWood = $this->incomingWoodRepository->create($input);

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
        Flash::success('Kayu Masuk SAKR berhasil disimpan.');

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
            Flash::error('Kayu Masuk SAKR tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
        }

        $template_wood = TemplateWood::pluck('name', 'id');
        $supplier = Supplier::selectRaw('concat(name, " | ", address) as name, id')->pluck('name', 'id');        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        $param = [];
        
        $param['get_by_incoming_wood_id'] = $id;

        $incomingWoodDetail = IncomingWoodRepository::getDetail($param);
        
        return view('transaction::incoming_woods.show',compact('template_wood','supplier','warehouse','wood_type','incomingWoodDetail'))->with('incomingWood', $incomingWood);

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
            Flash::error('Kayu Masuk SAKR tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
        }

        $template_wood = TemplateWood::pluck('name', 'id');
        $supplier = Supplier::selectRaw('concat(name, " | ", address) as name, id')->pluck('name', 'id');
        $warehouse = Warehouse::pluck('name', 'id');
        $wood_type = WoodType::pluck('name', 'id');

        $param = [];
        
        $param['get_by_incoming_wood_id'] = $id;

        $incomingWoodDetail = IncomingWoodRepository::getDetail($param);
        

        return view('transaction::incoming_woods.edit',compact('template_wood','supplier','warehouse','wood_type','incomingWoodDetail'))->with('incomingWood', $incomingWood);
    }

    /**
     * Update the specified IncomingWood in storage.
     *
     * @param  int              $id
     * @param UpdateIncomingWoodRequest $request
     *
     * @return Response
     */
    public function update(UpdateIncomingWoodRequest $request)
    {
        $input = $request->all();

        $id = $input['id'];

        $incomingWood = $this->incomingWoodRepository->find($id);

        if (empty($incomingWood)) {
            Flash::error('Kayu Masuk SAKR tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
        }

        $input['cost'] = Human::removeFormatRupiah($input['cost']);

        $incomingWood = $this->incomingWoodRepository->update($input, $id);

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

        Flash::success('Kayu Masuk SAKR berhasil diperbarui.');

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
            Flash::error('Kayu Masuk SAKR tidak ditemukan.');

            return redirect(route('incomingWoods.index'));
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

        $this->incomingWoodRepository->delete($id);

        Flash::success('Kayu Masuk SAKR berhasil dihapus.');

        return redirect(route('incomingWoods.index'));
    }

    public function getTemplate()
    {
        $id = request()->id;
        $data = IncomingWoodRepository::getTemplate($id);
        is_null($data) ? $status = false : $status = true;  
        return response()->json(['status' => $status, 'data' => $data]);
    }

    public function getNumberVehicle()
    {
        $id = request()->id;
        $data = IncomingWoodRepository::getNumberVehicle($id);
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
    
}
