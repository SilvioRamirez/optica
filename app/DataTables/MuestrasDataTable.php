<?php

namespace App\DataTables;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MuestrasDataTable extends DataTable
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
                        <a class="btn btn-info btn-sm" href="'.route('muestras.show',$query->id).'"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="'.route('muestras.edit',$query->id).'"><i class="fa fa-pen-to-square"></i></a>            
                        <a class="btn btn-danger btn-sm" href="'.route('muestras.delete',$query->id).'"><i class="fa fa-trash"></i></a>
                    </div>';
        })
        ->addColumn('status', function($query){
            if($query->status==false){
                return '<span class="badge bg-danger">Inactivo</span>';
            }else{
                return '<span class="badge bg-success">Activo</span>';
            }
            
        })
        ->rawColumns(['status', 'action'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Muestra $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('muestras-table')
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
            Column::make('nombre')->title('Nombre'),
            Column::computed('status')->title('Estatus')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
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
        return 'Muestras_' . date('YmdHis');
    }
}
