<?php

namespace App\DataTables;

use App\Models\Configuracion;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ConfiguracionsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
                    return '<div class="btn-group" role="group" aria-label="Opciones">
                        <a class="btn btn-info btn-sm" href="'.route('configuracions.show',$query->id).'"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="'.route('configuracions.edit',$query->id).'"><i class="fa fa-pen-to-square"></i></a>            
                    </div>';
        })
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Configuracion $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('configuracions-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(0, 'asc')
                    ->language([
                        'url' => url('storage/js/datatables/Spanish.json')
                    ])
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        /* Button::make('pdf'), */
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('nombre_organizacion')->title('Organización'),
            Column::make('descripcion_1')->title('Descripcion 1'),
            Column::make('descripcion_2')->title('Descripcion 2'),
            Column::make('representante_organizacion')->title('Representante'),
            Column::make('direccion')->title('Direccion 1'),
            Column::make('direccion_2')->title('Descripcion 2'),
            Column::make('telefono_uno')->title('Teléfono 1'),
            Column::make('telefono_dos')->title('Teléfono 2'),
            Column::make('created_at')->title('Creado'),
            Column::make('updated_at')->title('Actualizado'),
            Column::computed('action')->title('Acción')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Configuracions_' . date('YmdHis');
    }
}
