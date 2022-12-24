<?php

namespace Modules\Employee\DataTables;

use App\Helpers\Human;
use Modules\Employee\Models\Salary;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Carbon\Carbon;
use Modules\Employee\Repositories\SalaryRepository;

class SalaryDataTable extends DataTable
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

        return $dataTable
        ->editColumn('date', function ($data) {
            return Human::dateFormat($data->date);
        })
        ->editColumn('price', function ($data) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($data->price) . '</div>';
        })
        ->editColumn('total', function ($data) {
            return '<div style="text-align:right">' . Human::createFormatRupiah($data->total) . '</div>';
        })
        ->addColumn('action', 'employee::salaries.datatables_actions')
        ->rawColumns(['action', 'price', 'total']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Salary $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Salary $model)
    {
        $param = [];

        $filter_employee = $this->filter_employee;
        $filter_warehouse = $this->filter_warehouse;
        $filter_date = $this->filter_date;
        $filter_date_start = $this->filter_date_start;
        $filter_date_end = $this->filter_date_end;

        $param['get_by_employee'] = $filter_employee;
        $param['get_by_warehouse'] = $filter_warehouse;

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

        return SalaryRepository::getData($param);
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
                        d.filter_employee= $("#filter_employee").val();
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
                        'action'    => 'function() { window.location = "' . route('salaries.create')  . '"; }',
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
            'user_name' => ['title' => 'Mandor','name' => 'users.name'],
            'price' => ['title' => 'Harga / m3'],
            'volume' => ['title' => 'Volume'],
            'total' => ['title' => 'Total Gaji'],
            'description' => ['title' => 'Keterangan'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'salaries_datatable_' . time();
    }
}
