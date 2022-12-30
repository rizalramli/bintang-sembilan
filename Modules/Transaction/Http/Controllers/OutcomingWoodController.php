<?php

namespace Modules\Transaction\Http\Controllers;

use App\Helpers\Human;
use Modules\Transaction\DataTables\OutcomingWoodDataTable;
use Modules\Transaction\Http\Requests\CreateOutcomingWoodRequest;
use Modules\Transaction\Http\Requests\UpdateOutcomingWoodRequest;
use Modules\Transaction\Repositories\OutcomingWoodRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\Models\Customer;
use Modules\Master\Models\TemplateWoodOut;
use Modules\Master\Models\Warehouse;
use Modules\Master\Models\WoodType;
use Modules\Master\Models\WoodTypeOut;
use Modules\Transaction\Models\Finance;
use Modules\Transaction\Models\OutcomingWoodDetail;
use Modules\Transaction\Models\OutcomingWoodDetailItem;
use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Master\Models\Company;

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
        $data['wood_type_out'] = WoodTypeOut::pluck('name', 'id')->prepend('Semua Jenis', null);

        return $outcomingWoodDataTable
        ->with([
            'filter_customer' => request()->filter_customer,
            'filter_warehouse' => request()->filter_warehouse,
            'filter_wood_type_out' => request()->filter_wood_type_out,
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
        $data['template_wood_out'] = TemplateWoodOut::pluck('name', 'id');
        $data['customer'] = Customer::pluck('name', 'id');
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        $data['wood_type_out'] = WoodTypeOut::pluck('name', 'id');
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

        $cost = Human::removeFormatRupiah($input['cost']);

        $input['cost'] = $cost;

        $outcomingWood = $this->outcomingWoodRepository->create($input);

        if($outcomingWood)
        {
            if($cost > 0)
            {
                $customer = Customer::find($request->customer_id);
                $warehouse = Warehouse::find($request->warehouse_id);
                $description = 'Pendapatan kayu keluar di '.$warehouse->name.' atas nama '.$customer->name.' dengan nopol '.$input['number_vehicles'];
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 0,
                    'amount' => $cost,
                    'ref_id' => $outcomingWood->id,
                    'ref_table' => 'outcoming_wood',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        if(is_array($input['item2_length']) && count($input['item2_length']) > 0){
            foreach($input['item2_length'] as $key => $value){
                $outcoming_wood_detail = OutcomingWoodDetail::create([
                    'outcoming_wood_id' => $outcomingWood->id,
                    'product_id' => $input['item_product_id'][$key],
                    'wood_type_id' => $input['item_wood_type_id'][$key],
                    'sub_total_volume' => $input['item_sub_total_volume'][$key]
                ]);
                foreach($value as $key2 => $value2){
                    $outcoming_wood_detail_item = OutcomingWoodDetailItem::create([
                        'outcoming_wood_detail_id' =>  $outcoming_wood_detail->id,
                        'length' =>  $input['item2_length'][$key][$key2],
                        'width' =>  $input['item2_width'][$key][$key2],
                        'height' =>  $input['item2_height'][$key][$key2],
                        'qty' =>  $input['item2_qty'][$key][$key2],
                        'volume' => $input['item2_volume'][$key][$key2]
                    ]);
                }
            }
        }

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

        $data['template_wood_out'] = TemplateWoodOut::pluck('name', 'id');
        $data['customer'] = Customer::pluck('name', 'id');
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        $data['wood_type_out'] = WoodTypeOut::pluck('name', 'id');

        $param = [];
        
        $param['get_by_outcoming_wood_id'] = $id;

        $data['outcomingWoodDetail'] = OutcomingWoodRepository::getDetail($param);

        return view('transaction::outcoming_woods.show',$data)->with('outcomingWood', $outcomingWood);
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

        $data['template_wood_out'] = TemplateWoodOut::pluck('name', 'id');
        $data['customer'] = Customer::pluck('name', 'id');
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        $data['wood_type_out'] = WoodTypeOut::pluck('name', 'id');

        $param = [];
        
        $param['get_by_outcoming_wood_id'] = $id;

        $data['outcomingWoodDetail'] = OutcomingWoodRepository::getDetail($param);

        return view('transaction::outcoming_woods.edit',$data)->with('outcomingWood', $outcomingWood);
    }

    /**
     * Update the specified OutcomingWood in storage.
     *
     * @param  int              $id
     * @param UpdateOutcomingWoodRequest $request
     *
     * @return Response
     */
    public function update(UpdateOutcomingWoodRequest $request)
    {
        $input = $request->all();

        $id = $input['id'];

        $outcomingWood = $this->outcomingWoodRepository->find($id);

        if (empty($outcomingWood)) {
            Flash::error('Kayu keluar tidak ditemukan.');

            return redirect(route('outcomingWoods.index'));
        }

        $cost = Human::removeFormatRupiah($input['cost']);

        $input['cost'] = $cost;

        $outcomingWood = $this->outcomingWoodRepository->update($input, $id);

        if($outcomingWood)
        {
            if($cost > 0)
            {
                $customer = Customer::find($request->customer_id);
                $warehouse = Warehouse::find($request->warehouse_id);
                $description = 'Pendapatan kayu keluar di '.$warehouse->name.' atas nama '.$customer->name.' dengan nopol '.$input['number_vehicles'];
                if(empty($finance))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 0,
                        'amount' => $cost,
                        'ref_id' => $outcomingWood->id,
                        'ref_table' => 'outcoming_wood',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $outcomingWood->id,'ref_table' => 'outcoming_wood'])->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 0,
                        'amount' => Human::removeFormatRupiah($input['cost']),
                        'ref_id' => $outcomingWood->id,
                        'ref_table' => 'outcoming_wood',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        if(is_array($input['item2_length']) && count($input['item2_length']) > 0){
            // Delete Detail
            $outcoming_wood_detail = OutcomingWoodDetail::where('outcoming_wood_id',$id);
            if($outcoming_wood_detail->count() > 0){
                foreach($outcoming_wood_detail->get() as $value)
                {
                    OutcomingWoodDetailItem::where('outcoming_wood_detail_id',$value->id)->delete();
                }
                $outcoming_wood_detail->delete();
            }

            foreach($input['item2_length'] as $key => $value){
                $outcoming_wood_detail = OutcomingWoodDetail::create([
                    'outcoming_wood_id' => $outcomingWood->id,
                    'product_id' => $input['item_product_id'][$key],
                    'wood_type_id' => $input['item_wood_type_id'][$key],
                    'sub_total_volume' => $input['item_sub_total_volume'][$key]
                ]);
                foreach($value as $key2 => $value2){
                    $outcoming_wood_detail_item = OutcomingWoodDetailItem::create([
                        'outcoming_wood_detail_id' =>  $outcoming_wood_detail->id,
                        'length' =>  $input['item2_length'][$key][$key2],
                        'width' =>  $input['item2_width'][$key][$key2],
                        'height' =>  $input['item2_height'][$key][$key2],
                        'qty' =>  $input['item2_qty'][$key][$key2],
                        'volume' => $input['item2_volume'][$key][$key2]
                    ]);
                }
            }            
        }

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

        $outcoming_wood_detail = OutcomingWoodDetail::where('outcoming_wood_id',$id);
        if($outcoming_wood_detail->count() > 0){
            foreach($outcoming_wood_detail->get() as $value)
            {
                OutcomingWoodDetailItem::where('outcoming_wood_detail_id',$value->id)->delete();
            }
            $outcoming_wood_detail->delete();
        }

        Finance::where(['ref_id' => $id,'ref_table' => 'outcoming_wood'])->delete();

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

    public function invoice(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        if($request->type == 1)
        {
            $param['get_by_outcoming_wood_id'] = $id;

            $data['outcomingWood'] = OutcomingWoodRepository::getData($param)->first();

            $data['outcomingWoodDetail'] = OutcomingWoodRepository::getDetail($param);

            $data['company'] = Company::find(1);

            $date_start = $request->date_start;
            $date_end = $request->date_end;

            $diff = Carbon::parse($date_start)->diffInDays(Carbon::parse($date_end));

            $data['date_start'] = $date_start;

            $data['date_end'] = $date_end;

            $data['diff'] = $diff;

            $pdf = \PDF::loadView('transaction::outcoming_woods.invoice1',$data);
        }
        return $pdf->stream('Invoice.pdf', array("Attachment" => false));
    }
}
