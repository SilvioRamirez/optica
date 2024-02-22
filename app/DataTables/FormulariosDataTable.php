<?php

namespace App\DataTables;

use App\Models\Formulario;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FormulariosDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if(auth()->user()->hasRole('Super Admin')){
            return (new EloquentDataTable($query))
                ->addColumn('action', function($query){
                                return '<div class="btn-group" role="group" aria-label="Opciones">
                                        <a class="btn btn-info btn-sm"      title="Ver Información"     href="'.route('formularios.show',$query->id).'">   <i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary btn-sm"   title="Editar Información"  href="'.route('formularios.edit',$query->id).'">   <i class="fa fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger btn-sm"    title="Eliminar"            href="'.route('formularios.delete',$query->id).'">   <i class="fa fa-trash"></i></a>
                                    </div>';
                })
                ->setRowId('id');
        }

        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                            return '<div class="btn-group" role="group" aria-label="Opciones">
                                        <a class="btn btn-info btn-sm"      title="Ver Información"     href="'.route('formularios.show',$query->id).'">   <i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary btn-sm"   title="Editar Información"  href="'.route('formularios.edit',$query->id).'">   <i class="fa fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger btn-sm"    title="Eliminar"            href="'.route('formularios.delete',$query->id).'">   <i class="fa fa-trash"></i></a>
                                    </div>';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Formulario $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('formularios-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(1, 'asc')
                    ->language([
                        'url' => url('storage/js/datatables/Spanish.json')
                    ])
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        //Button::make('pdf'),
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
            Column::computed('action')->title('Acción')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
            Column::make('id')->title('ID'),
            Column::make('numero_orden')->title('Numero de Orden'),
            Column::make('estatus')->title('Estatus'),
            Column::make('fecha')->title('Fecha'),
            Column::make('paciente')->title('Paciente'),
            Column::make('cedula')->title('Cedula'),
            Column::make('edad')->title('Edad'),
            Column::make('telefono')->title('Telefono'),
            Column::make('direccion_operativo')->title('Direccion / Operativo'),
            Column::make('tipo')->title('Tipo'),
            Column::make('od_esf')->title('OD Esf'),
            Column::make('od_cil')->title('OD Cil'),
            Column::make('od_eje')->title('OD Eje'),
            Column::make('oi_esf')->title('OI Esf'),
            Column::make('oi_cil')->title('OI Cil'),
            Column::make('oi_eje')->title('Oi Eje'),
            Column::make('add')->title('Add'),
            Column::make('dp')->title('Dp'),
            Column::make('alt')->title('Alt'),
            Column::make('observaciones_extras')->title('Observaciones Extras'),
            Column::make('total')->title('Total'),
            Column::make('saldo')->title('Saldo'),
            Column::make('abono_1')->title('abono_1'),
            Column::make('abono_fecha_1')->title('abono_fecha_1'),
            Column::make('abono_2')->title('abono_2'),
            Column::make('abono_fecha_2')->title('abono_fecha_2'),
            Column::make('abono_3')->title('abono_3'),
            Column::make('abono_fecha_3')->title('abono_fecha_3'),
            Column::make('abono_4')->title('abono_4'),
            Column::make('abono_fecha_4')->title('abono_fecha_4'),
            Column::make('abono_5')->title('abono_5'),
            Column::make('abono_fecha_5')->title('abono_fecha_5'),
            Column::make('created_at')->title('Creado'),
            Column::make('updated_at')->title('Actualizado'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Formularios_' . date('Y.m.d H.i.s');
    }
}
