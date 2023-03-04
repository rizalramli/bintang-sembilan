<?php

namespace Modules\Transaction\DataTables;

use App\Helpers\Human;
use Modules\Transaction\Repositories\OutsideWarehousePurchaseRepository;
use Modules\Transaction\Models\OutsideWarehousePurchase;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Carbon\Carbon;

class OutsideWarehousePurchaseDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'transaction::outside_warehouse_purchases.datatables_actions')
        ->editColumn('date', function ($data) {
            return Human::dateFormat($data->date);
        })
        ->editColumn('payment_factory', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->payment_factory) . '</div>';
        })
        ->editColumn('fare_down', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->fare_down) . '</div>';
        })
        ->editColumn('grand_total', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->grand_total) . '</div>';
        })
        ->editColumn('fee', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->fee) . '</div>';
        })
        ->editColumn('fare_truck', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->fare_truck) . '</div>';
        })
        ->editColumn('paid', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->paid) . '</div>';
        })
        ->editColumn('down_payment', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->down_payment) . '</div>';
        })
        ->editColumn('nett', function ($row) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($row->nett) . '</div>';
        })
        ->rawColumns(['action', 'payment_factory','fare_down','grand_total', 'fee','fare_truck','paid','down_payment','nett']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OutsideWarehousePurchase $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OutsideWarehousePurchase $model)
    {
        $param = [];

        $filter_warehouse = $this->filter_warehouse;
        $filter_date = $this->filter_date;
        $filter_number_vehicle = $this->filter_number_vehicle;
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

        return OutsideWarehousePurchaseRepository::getData($param);
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
                        d.filter_warehouse= $("#filter_warehouse").val();
                        d.filter_date= $("#filter_date").val();
                        d.filter_number_vehicle= $("#filter_number_vehicle").val();
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
                        'action'    => 'function() { window.location = "' . route('outsideWarehousePurchases.create')  . '"; }',
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
            'date' => ['title' => 'Tanggal'],
            'warehouse_name' => ['title' => 'Gudang Asal','name' => 'warehouse.name'],
            'destination' => ['title' => 'Tujuan'],
            'payment_factory' => ['title' => 'Uang Pabrik'],
            'fare_down' => ['title' => 'Ongkos Turun'],
            'grand_total' => ['title' => 'Grand Total'],
            'fee' => ['title' => 'Fee'],
            'fare_truck' => ['title' => 'Ongkos Truk'],
            'paid' => ['title' => 'Yang Dibayar'],
            'down_payment' => ['title' => 'DP'],
            'nett' => ['title' => 'Bersih'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'outside_warehouse_purchases_datatable_' . time();
    }
}
