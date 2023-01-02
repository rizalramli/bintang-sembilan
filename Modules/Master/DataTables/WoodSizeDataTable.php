<?php

namespace Modules\Master\DataTables;

use Modules\Master\Models\WoodSize;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class WoodSizeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'master::wood_sizes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\WoodSize $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(WoodSize $model)
    {
        $id = $this->id;
        return $model->newQuery()->where('wood_category_id', $id)
        ->orderBy('id', 'asc');
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
                    ['text'     => '<i data-feather="plus"></i> Tambah Data',
                        'className' => 'create-new btn btn-success',
                        'action'    => 'function() { window.location = "' . url('master/woodSizes/create?wood_category_id=').$this->id  . '"; }',
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
            'name' => ['title' => 'Diameter'],
            'volume' => ['title' => 'Volume'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'wood_sizes_datatable_' . time();
    }
}
