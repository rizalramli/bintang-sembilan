<?php

namespace Modules\Transaction\Http\Controllers;

use App\Helpers\Human;
use Modules\Transaction\DataTables\TruckRentalDataTable;
use Modules\Transaction\Http\Requests;
use Modules\Transaction\Http\Requests\CreateTruckRentalRequest;
use Modules\Transaction\Http\Requests\UpdateTruckRentalRequest;
use Modules\Transaction\Repositories\TruckRentalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\Models\Warehouse;
use Modules\Transaction\Models\Finance;
use Response;
use Carbon\Carbon;

class TruckRentalController extends AppBaseController
{
    /** @var  TruckRentalRepository */
    private $truckRentalRepository;

    public function __construct(TruckRentalRepository $truckRentalRepo)
    {
        $this->truckRentalRepository = $truckRentalRepo;
    }

    /**
     * Display a listing of the TruckRental.
     *
     * @param TruckRentalDataTable $truckRentalDataTable
     * @return Response
     */
    public function index(TruckRentalDataTable $truckRentalDataTable)
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id')->prepend('Semua Gudang', null);
        $data['number_vehicle'] = Human::getVehicleNumberTruckRental();
        
        return $truckRentalDataTable
        ->with([
            'filter_number_vehicle' => request()->filter_number_vehicle,
            'filter_warehouse' => request()->filter_warehouse,
            'filter_date' => request()->filter_date,
            'filter_date_start' => request()->filter_date_start,
            'filter_date_end' => request()->filter_date_end,
        ])
        ->render('transaction::truck_rentals.index', $data);
    }

    /**
     * Show the form for creating a new TruckRental.
     *
     * @return Response
     */
    public function create()
    {
        $data['warehouse'] = Warehouse::pluck('name', 'id');
        return view('transaction::truck_rentals.create',$data);
    }

    /**
     * Store a newly created TruckRental in storage.
     *
     * @param CreateTruckRentalRequest $request
     *
     * @return Response
     */
    public function store(CreateTruckRentalRequest $request)
    {
        $input = $request->all();

        $truck_cost = Human::removeFormatRupiah($input['truck_cost']);
        $driver_cost = Human::removeFormatRupiah($input['driver_cost']);
        $solar_cost = Human::removeFormatRupiah($input['solar_cost']);
        $damage_cost = Human::removeFormatRupiah($input['damage_cost']);

        $input['truck_cost'] = $truck_cost;
        $input['driver_cost'] = $driver_cost;
        $input['solar_cost'] = $solar_cost;
        $input['damage_cost'] = $damage_cost;

        $truckRental = $this->truckRentalRepository->create($input);

        if($truckRental)
        {
            if($truck_cost > 0)
            {
                $description = 'Pendapatan penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 0,
                    'amount' => $truck_cost,
                    'ref_id' => $truckRental->id,
                    'ref_table' => 'truck_rental',
                    'flag' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            if($driver_cost > 0)
            {
                $description = 'Gaji sopir penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 1,
                    'amount' => $driver_cost,
                    'ref_id' => $truckRental->id,
                    'ref_table' => 'truck_rental',
                    'flag' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            if($solar_cost > 0)
            {
                $description = 'Biaya solar penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 1,
                    'amount' => $solar_cost,
                    'ref_id' => $truckRental->id,
                    'ref_table' => 'truck_rental',
                    'flag' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            if($damage_cost > 0)
            {
                $description = 'Biaya kerusakan penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                Finance::create([
                    'warehouse_id' => $request->warehouse_id,
                    'date' => $request->date,
                    'description' => $description,
                    'type' => 1,
                    'amount' => $damage_cost,
                    'ref_id' => $truckRental->id,
                    'ref_table' => 'truck_rental',
                    'flag' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        Flash::success('Penyewaan truk berhasil ditambahkan.');

        return redirect(route('truckRentals.index'));
    }

    /**
     * Display the specified TruckRental.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $truckRental = $this->truckRentalRepository->find($id);

        if (empty($truckRental)) {
            Flash::error('Penyewaan truk tidak ditemukan');

            return redirect(route('truckRentals.index'));
        }

        return view('transaction::truck_rentals.show')->with('truckRental', $truckRental);
    }

    /**
     * Show the form for editing the specified TruckRental.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $truckRental = $this->truckRentalRepository->find($id);

        if (empty($truckRental)) {
            Flash::error('Penyewaan truk tidak ditemukan');

            return redirect(route('truckRentals.index'));
        }

        $data['warehouse'] = Warehouse::pluck('name', 'id');

        return view('transaction::truck_rentals.edit',$data)->with('truckRental', $truckRental);
    }

    /**
     * Update the specified TruckRental in storage.
     *
     * @param  int              $id
     * @param UpdateTruckRentalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTruckRentalRequest $request)
    {
        $truckRental = $this->truckRentalRepository->find($id);

        if (empty($truckRental)) {
            Flash::error('Penyewaan truk tidak ditemukan');

            return redirect(route('truckRentals.index'));
        }

        $input = $request->all();

        $truck_cost = Human::removeFormatRupiah($input['truck_cost']);
        $driver_cost = Human::removeFormatRupiah($input['driver_cost']);
        $solar_cost = Human::removeFormatRupiah($input['solar_cost']);
        $damage_cost = Human::removeFormatRupiah($input['damage_cost']);

        $input['truck_cost'] = $truck_cost;
        $input['driver_cost'] = $driver_cost;
        $input['solar_cost'] = $solar_cost;
        $input['damage_cost'] = $damage_cost;

        $truckRental = $this->truckRentalRepository->update($input, $id);
        
        if($truckRental)
        {
            if($truck_cost > 0)
            {
                $description = 'Pendapatan penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                $finance_truck_cost = Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                ->where('description','LIKE','%Pendapatan penyewaan truk%')->first();
                if(empty($finance_truck_cost))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 0,
                        'amount' => $truck_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                    ->where('description','LIKE','%Pendapatan penyewaan truk%')->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 0,
                        'amount' => $truck_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            if($driver_cost > 0)
            {
                $description = 'Gaji sopir penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                $finance_driver_cost = Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                ->where('description','LIKE','%Gaji sopir penyewaan truk%')->first();
                if(empty($finance_driver_cost))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $driver_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                    ->where('description','LIKE','%Gaji sopir penyewaan truk%')->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $driver_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            if($solar_cost > 0)
            {
                $description = 'Biaya solar penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                $finance_solar_cost = Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                ->where('description','LIKE','%Biaya solar penyewaan truk%')->first();
                if(empty($finance_solar_cost))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $solar_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                    ->where('description','LIKE','%Biaya solar penyewaan truk%')->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $solar_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            if($damage_cost > 0)
            {
                $description = 'Biaya kerusakan penyewaan truk dengan tempat muat '.$input['loading_place']. ' tujuan '.$input['purpose'].' dan nopol '.$input['number_vehicles'];
                $finance_damage_cost = Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                ->where('description','LIKE','%Biaya kerusakan penyewaan truk%')->first();
                if(empty($finance_damage_cost))
                {
                    Finance::create([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $damage_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else {
                    Finance::where(['ref_id' => $truckRental->id,'ref_table' => 'truck_rental'])
                    ->where('description','LIKE','%Biaya kerusakan penyewaan truk%')->update([
                        'warehouse_id' => $request->warehouse_id,
                        'date' => $request->date,
                        'description' => $description,
                        'type' => 1,
                        'amount' => $damage_cost,
                        'ref_id' => $truckRental->id,
                        'ref_table' => 'truck_rental',
                        'flag' => 6,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        Flash::success('Penyewaan truk berhasil diperbarui.');

        return redirect(route('truckRentals.index'));
    }

    /**
     * Remove the specified TruckRental from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $truckRental = $this->truckRentalRepository->find($id);

        if (empty($truckRental)) {
            Flash::error('Penyewaan truk tidak ditemukan');

            return redirect(route('truckRentals.index'));
        }

        Finance::where(['ref_id' => $id,'ref_table' => 'truck_rental'])->delete();

        $this->truckRentalRepository->delete($id);

        Flash::success('Penyewaan truk berhasil dihapus.');

        return redirect(route('truckRentals.index'));
    }
}
