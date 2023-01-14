<?php

namespace Modules\Transaction\DataTables;

use App\Helpers\Human;
use Modules\Transaction\Models\TruckRental;
use Modules\Transaction\Repositories\TruckRentalRepository;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Carbon\Carbon;

class TruckRentalDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'transaction::truck_rentals.datatables_actions')
        ->editColumn('date', function ($data) {
            return Human::dateFormat($data->date);
        })
        ->editColumn('truck_cost', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->truck_cost) . '</div>';
        })
        ->editColumn('driver_cost', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->driver_cost) . '</div>';
        })
        ->editColumn('solar_cost', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->solar_cost) . '</div>';
        })
        ->editColumn('damage_cost', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->damage_cost) . '</div>';
        })
        ->rawColumns(['action', 'truck_cost', 'driver_cost','solar_cost','damage_cost']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TruckRental $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TruckRental $model)
    {
        $param = [];

        $filter_number_vehicle = $this->filter_number_vehicle;
        $filter_warehouse = $this->filter_warehouse;
        $filter_date = $this->filter_date;
        $filter_date_start = $this->filter_date_start;
        $filter_date_end = $this->filter_date_end;
        
        $param['get_by_number_vehicle'] = $filter_number_vehicle;
        $param['get_by_warehouse'] = $filter_warehouse;

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

        return TruckRentalRepository::getData($param);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->ajax([
                'data' => '
                    function(d) {
                        d.filter_number_vehicle= $("#filter_number_vehicle").val();
                        d.filter_warehouse= $("#filter_warehouse").val();
                        d.filter_date= $("#filter_date").val();
                        d.filter_date_start= $("#filter_date_start").val();
                        d.filter_date_end = $("#filter_date_end").val();
                    }
                '
            ])
            ->addAction(['title'=>'aksi','width' => '100px', 'printable' => false])
            ->parameters([
                'dom'       => '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                'stateSave' => true,
                 'displayLength' => 20,
                'lengthMenu'    => [20, 50, 100],
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['text'     => '<i data-feather="plus"></i> Tambah Data',
                        'className' => 'create-new btn btn-success',
                        'action'    => 'function() { window.location = "' . route('truckRentals.create')  . '"; }',
                    ],
                ],
                'drawCallback'  => 'function() { feather.replace() }',
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'number_vehicles' => ['title' => 'Nopol'],
            'date' => ['title' => 'Tanggal'],
            'driver_name' => ['title' => 'Sopir'],
            'loading_place' => ['title' => 'Tempat Muat'],
            'purpose' => ['title' => 'Tujuan'],
            'truck_cost' => ['title' => 'Truk'],
            'driver_cost' => ['title' => 'Gaji Sopir'],
            'solar_cost' => ['title' => 'Solar'],
            'damage_cost' => ['title' => 'Kerusakan'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'truck_rentals_datatable_' . time();
    }
}
