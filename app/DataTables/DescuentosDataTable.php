<?php

namespace App\DataTables;

use App\Models\Descuento;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DescuentosDataTable extends DataTable
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

                    if(auth()->user()->can('descuento-list')){
                        $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="'.route('descuentos.show',$query->id).'"> <i class="fa fa-eye"></i></a>';
                    }
                    if(auth()->user()->can('descuento-edit')){
                        $buttons .= '<a class="btn btn-warning btn-sm" title="Editar Información" href="'.route('descuentos.edit',$query->id).'"> <i class="fa fa-pen-to-square"></i></a>';
                    }
                    if(auth()->user()->can('descuento-delete')){
                        $buttons .= '<button type="button" class="btn btn-danger btn-sm" title="Eliminar Descuento" data-argid="'.$query->id.'" onclick="openModalDeleteDescuento(\''.$query->id.'\')"><i class="fa fa-trash"></i></button>';
                    }
                    return '<div class="btn-group" role="group" aria-label="Opciones">'.$buttons.'</div>';

                })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Descuento $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('descuentos-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->lengthMenu([10, 25, 50, 100, 500, 1000])
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(1)
                    ->language([
                        'url' => url('storage/js/datatables/Spanish.json')
                    ])->buttons($this->getButtons());
    }

    public function getButtons(): array
    {
        $buttons = [];
        
        if(auth()->user()->can('descuento-download')){
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
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            Column::make('id')->title('ID'),
            Column::make('nombre')->title('Nombre'),
            Column::make('descripcion')->title('Descripción'),
            Column::make('porcentaje')->title('Porcentaje (%)'),
            Column::make('created_at')->title('Creado'),
            Column::make('updated_at')->title('Actualizado'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Descuentos_' . date('YmdHis');
    }
}
