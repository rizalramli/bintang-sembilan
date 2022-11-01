<?php

namespace App\DataTables;

use App\Models\Bank;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BankDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'banks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Bank $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Bank $model)
    {
        return $model->newQuery();
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
            ->addAction(['title'=>'aksi','width' => '100px', 'printable' => false])
            ->parameters([
                'dom'       => '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                'stateSave' => true,
                 'displayLength' => 20,
                'lengthMenu'    => [20, 50, 100],
                'order'     => [[0, 'desc']],
                'buttons'   => [                     
                    ['extend'   => 'print',
                        'className' => 'btn btn-light ',
                        'text'      => '<i data-feather="printer"></i> Cetak',
                    ],
                    ['text'     => '<i data-feather="plus"></i> Tambah Data',
                        'className' => 'create-new btn btn-success',
                        'action'    => 'function() { window.location = "' . route('banks.create')  . '"; }',
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
            'bank',
            'address',
            'phone',
            'cp',
            'hp',
            'mdr_debit_card',
            'mdr_credit_card'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'banks_datatable_' . time();
    }
}
