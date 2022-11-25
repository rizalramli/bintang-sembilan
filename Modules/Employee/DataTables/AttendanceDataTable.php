<?php

namespace Modules\Employee\DataTables;

use Carbon\Carbon;
use Modules\Employee\Models\Attendance;
use Modules\Employee\Repositories\AttendanceRepository;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AttendanceDataTable extends DataTable
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

        $dataTable
        ->editColumn('check_in', function ($data) {
            return Carbon::parse($data->check_in)->format('d/m/Y H:i');
        })
        ->editColumn('check_out', function ($data) {
            if($data->check_out == null){
                return '-';
            }
            return Carbon::parse($data->check_out)->format('d/m/Y H:i');
        })
        ->editColumn('status_check_in', function ($row) {
            foreach(Attendance::$statusCheckIn as $key => $value) {
                if($key == 1) {
                    $button = 'success';
                } else if($key == 2) {
                    $button = 'warning';
                } else {
                    $button = 'danger';
                }
                if ($row->status_check_in == $key) {
                    return '<span class="badge rounded-pill badge-light-'.$button.' me-1">'.$value.'</span>';
                }
            }
        })
        ->editColumn('status_check_out', function ($row) {
            if($row->status_check_out == 1) {
                $button = 'success';
            } else if($row->status_check_out == 2) {
                $button = 'warning';
            } else {
                $button = 'danger';
            }
            foreach(Attendance::$statusCheckOut as $key => $value) {
                if ($row->status_check_out == $key) {
                    return '<span class="badge rounded-pill badge-light-'.$button.' me-1">'.$value.'</span>';
                }
            }
        })
        ->rawColumns(['status_check_in', 'status_check_out']);

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Attendance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Attendance $model)
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

        return AttendanceRepository::getData($param);
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
            ->parameters([
                'dom'       => '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                'stateSave' => true,
                 'displayLength' => 20,
                'lengthMenu'    => [20, 50, 100],
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                        'text'     => '<i data-feather="check-circle"></i> Kehadiran Masuk',
                        'className' => 'create-new btn btn-success',
                        'action'    => 'function() { window.location = "' . route('attendances.create')  . '?type=check_in"; }',
                    ],
                    [
                        'text'     => '<i data-feather="check-square"></i> Kehadiran Keluar',
                        'className' => 'create-new btn btn-success',
                        'action'    => 'function() { window.location = "' . route('attendances.create')  . '?type=check_out"; }',
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
            'user_name' => ['title' => 'Karyawan','name' => 'users.name'],
            'check_in' => ['title' => 'Jam Masuk'],
            'status_check_in' => ['title' => 'Status Kehadiran Masuk'],
            'check_out' => ['title' => 'Jam Keluar'],
            'status_check_out' => ['title' => 'Status Kehadiran Keluar'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'attendances_datatable_' . time();
    }
}
