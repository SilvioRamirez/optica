<?php

namespace App\DataTables;

use App\Models\Municipio;
use App\Models\Operativo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OperativosDataTable extends DataTable
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

                    $buttons = '';

                    if(auth()->user()->can('operativo-edit')){
                        $buttons .= '<a class="btn btn-primary btn-sm" title="Editar Información" href="'.route('operativos.edit',$query->id).'"> <i class="fa fa-pen-to-square"></i></a>';
                    }

                    return '<div class="btn-group" role="group" aria-label="Opciones">'.$buttons.'</div>';

                })
            ->addColumn('estado', function($query){
                $estado = '';

                if(!$query->estado){
                    return $estado;
                }
                $estado = $query->estado->estado;

                return $estado;

            })
            ->addColumn('municipio', function($query){
                $municipio = '';
                if(!$query->municipio){
                    return $municipio;
                }
                $municipio = $query->municipio->municipio;
                return $municipio;
            })
            ->addColumn('parroquia', function($query){
                $parroquia = '';
                if(!$query->parroquia){
                    return $parroquia;
                }
                $parroquia = $query->parroquia->parroquia;
                return $parroquia;
            })
            ->rawColumns(['action','estado', 'municipio', 'parroquia'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Operativo $model): QueryBuilder
    {

        return $model->newQuery()->with('estado')->with('municipio')->with('parroquia');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('operativos-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(1, 'desc')
                    ->language([
                        'url' => url('storage/js/datatables/Spanish.json')
                    ])
                    ->buttons($this->getButtons());

    }

    public function getButtons(): array
    {
        $buttons = [];
        
        if(auth()->user()->can('operativo-download')){
            $buttons[] = Button::make('excel');
            $buttons[] = Button::make('csv');
            $buttons[] = Button::make('print');
        }

        $buttons[] = Button::make('reset');
        $buttons[] = Button::make('reload');

        return $buttons;
    }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')->title('Acción')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            Column::make('id')->title('ID'),
            Column::computed('estado')->title('Estado')
                    ->exportable(true)
                    ->printable(true)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('municipio')->title('Municipio')
                    ->exportable(true)
                    ->printable(true)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('parroquia')->title('Parroquia')
                    ->exportable(true)
                    ->printable(true)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::make('sector')->title('Sector'),
            Column::make('direccion')->title('Direccion'),
            Column::make('lugar')->title('Lugar'),
            Column::make('nombre_operativo')->title('Nombre del Operativo'),
            Column::make('fecha')->title('Fecha del Operativo'),
            Column::make('created_at')->title('Creado'),
            Column::make('updated_at')->title('Actualizado'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Operativos_' . date('YmdHis');
    }
}
