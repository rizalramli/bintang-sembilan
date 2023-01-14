<?php

namespace Modules\Transaction\Repositories;

use Modules\Transaction\Models\TruckRental;
use App\Repositories\BaseRepository;

/**
 * Class TruckRentalRepository
 * @package App\Repositories
 * @version January 14, 2023, 10:32 am WIB
*/

class TruckRentalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'number_vehicles',
        'driver_name',
        'loading_place',
        'purpose',
        'truck_cost',
        'driver_cost',
        'solar_cost',
        'damage_cost',
        'description',
        'created_at',
        'updated_at'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TruckRental::class;
    }

    public static function getData($param = [])
    {
        $result = TruckRental::query();
        
        $result->select(
            'truck_rental.*',
        );

        if(isset($param['get_by_number_vehicle']) && !is_null($param['get_by_number_vehicle'])){
            $result->whereRaw('LOWER(truck_rental.number_vehicles) LIKE ?', ['%'.strtolower($param['get_by_number_vehicle']).'%']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('truck_rental.warehouse_id', '=', $param['get_by_warehouse']);
        }

        // Filter Tanggal 

        if (isset($param['get_by_date']) && !is_null($param['get_by_date'])) {
            $result->whereDate('truck_rental.date', $param['get_by_date']);
        }

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('truck_rental.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('truck_rental.date', $param['get_by_year']);
        }

        if (isset($param['get_by_date_start']) && !is_null($param['get_by_date_start']) && isset($param['get_by_date_end']) && !is_null($param['get_by_date_end'])) {
            $result->whereBetween('truck_rental.date', [$param['get_by_date_start'], $param['get_by_date_end']]);
        }

        return $result;
    }

    public static function getReport($param = [])
    {
        $result = TruckRental::query();
        
        $result->select(
            'truck_rental.*',
        );

        if (isset($param['get_by_month']) && !is_null($param['get_by_month'])) {
            $result->whereMonth('truck_rental.date', $param['get_by_month']);
        }

        if (isset($param['get_by_year']) && !is_null($param['get_by_year'])) {
            $result->whereYear('truck_rental.date', $param['get_by_year']);
        }

        if(isset($param['get_by_number_vehicle']) && !is_null($param['get_by_number_vehicle'])){
            $result->whereRaw('LOWER(truck_rental.number_vehicles) LIKE ?', ['%'.strtolower($param['get_by_number_vehicle']).'%']);
        }

        if(isset($param['get_by_warehouse']) && !is_null($param['get_by_warehouse'])){
            $result->where('truck_rental.warehouse_id', '=', $param['get_by_warehouse']);
        }

        $result->orderBy('truck_rental.date', 'asc');

        $data = [
            'data' => $result->get(),
        ];

        return $data;
    }
}
