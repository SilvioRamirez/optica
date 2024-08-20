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
            return (new EloquentDataTable($query))
                ->addColumn('action', function($query){

                    $buttons = '';

                    if(auth()->user()->can('formulario-list')){
                        $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="'.route('formularios.show',$query->id).'"> <i class="fa fa-eye"></i></a>';
                    }

                    if(auth()->user()->can('formulario-edit')){
                        $buttons .= '<a class="btn btn-warning btn-sm" title="Editar Información" href="'.route('formularios.edit',$query->id).'"> <i class="fa fa-pen-to-square"></i></a>';
                    }

                    if(auth()->user()->can('formulario-delete')){
                        $buttons .= '<a class="btn btn-danger btn-sm" title="Eliminar" href="'.route('formularios.delete',$query->id).'"> <i class="fa fa-trash"></i></a>';
                    }

                    if(auth()->user()->can('formulario-estatus')){
                        $buttons .= '<a class="btn btn-success btn-sm" title="Envíar WhatsApp" href="https://api.whatsapp.com/send?phone='.$query->telefono.'&text=¡Hola!" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-whatsapp"></i></a>';
                    }

                    if(auth()->user()->can('formulario-list')){
                        $buttons .= '<a class="btn btn-secondary btn-sm" title="Generar PDF" href="'.route('formulario.orden.pdf',$query->id).'" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i></a>';
                    }

                    if(auth()->user()->can('formulario-estatus')){
                        $buttons .= '<button type="button" class="btn btn-primary btn-sm" title="Cambiar Estatus" data-argid="'.$query->id.'" onclick="openModal(\''.$query->id.'\')"><i class="fa fa-clipboard-check"></i></button>';
                    }

                    return '<div class="btn-group" role="group" aria-label="Opciones">'.$buttons.'</div>';

                })
                ->addColumn('pasados', function($query){
                    return \Carbon\Carbon::parse($query->fecha)->diffInDays(now(), 2);
                })
                ->addColumn('tipo', function($query){
                    return $query->tipoLente->tipo_lente;
                })
                ->addColumn('tipoTratamiento', function($query){
                    $tipoTratamiento = '';
                    if(!$query->tipoTratamiento){
                        return $tipoTratamiento;
                    }
                    $tipoTratamiento = $query->tipoTratamiento->tipo_tratamiento;
                    return $tipoTratamiento;
                })
                ->addColumn('rutaEntrega', function($query){
                    $rutaEntrega = '';
                    if(!$query->rutaEntrega){
                        return $rutaEntrega;
                    }
                    $rutaEntrega = $query->rutaEntrega->ruta_entrega;
                    return $rutaEntrega;
                })
                ->addColumn('porcentaje_pago', function($query){
                    $calc = '';

                    $total_abonos = $query->abono_1 + $query->abono_2 + $query->abono_3 + $query->abono_4 + $query->abono_5;

                    /* Verificamos primero que el $query-total no sea 0 */

                    $calc = $query->total == 0 ? 0 : round(($total_abonos*100)/($query->total));
                    
                    return $calc . '%';
                })
                ->addColumn('especialista', function($query){
                    $especialistaLente = '';
                    if(!$query->especialistaLente){
                        return $especialistaLente;
                    }
                    $especialistaLente = $query->especialistaLente->nombre;
                    return $especialistaLente;
                })
                ->rawColumns(['action', 'tipo', 'pasados', 'tipoTratamiento', 'rutaEntrega', 'porcentaje_pago', 'especialista'])
                ->setRowId('id');
    }



    /**
     * Get the query source of dataTable.
     */
    public function query(Formulario $model): QueryBuilder
    {
        return $model->newQuery()->with('tipoLente')->with('tipoTratamiento')->with('especialistaLente');
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
                    ->lengthMenu([10, 25, 50, 100, 500, 1000])
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
        
        if(auth()->user()->can('formulario-download')){
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
        $columns = [];

        $columns[] = Column::computed('action')->title('Acción')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::make('id')->title('ID');
        $columns[] = Column::make('numero_orden')->title('Numero de Orden');
        $columns[] = Column::make('paciente')->title('Paciente');
        if(auth()->user()->can('formulario-telefono')){
            $columns[] = Column::make('telefono')->title('Telefono');
        }
        $columns[] = Column::make('estatus')->title('Estatus');
        $columns[] = Column::computed('rutaEntrega')->title('Ruta de Entrega')
                    ->orderable(true)
                    ->exportable(true)
                    ->printable(true)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::make('fecha_entrega')->title('Fecha de Entrega');
        
        $columns[] = Column::computed('tipo')->title('Tipo de Lente')
                    ->orderable(true)
                    ->exportable(true)
                    ->printable(true)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::computed('tipoTratamiento')->title('Tipo de Tratamiento')
                    ->orderable(true)
                    ->exportable(true)
                    ->printable(true)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::make('observaciones_extras')->title('Observaciones Extras');
        $columns[] = Column::make('total')->title('Total');
        $columns[] = Column::make('saldo')->title('Saldo');
        $columns[] = Column::computed('porcentaje_pago')->title('%')
                    ->orderable(true)
                    ->exportable(true)
                    ->printable(true)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::computed('pasados')->title('Días Pasados')
                    ->orderable(true)
                    ->exportable(true)
                    ->printable(true)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::make('fecha')->title('Fecha');
        $columns[] = Column::make('fecha_proxima_cita')->title('Fecha de Prox. Cita');
        $columns[] = Column::make('direccion_operativo')->title('Direccion / Operativo');
        $columns[] = Column::make('laboratorio')->title('Laboratorio');
        $columns[] = Column::make('od_esf')->title('OD Esf');
        $columns[] = Column::make('od_cil')->title('OD Cil');
        $columns[] = Column::make('od_eje')->title('OD Eje');
        $columns[] = Column::make('oi_esf')->title('OI Esf');
        $columns[] = Column::make('oi_cil')->title('OI Cil');
        $columns[] = Column::make('oi_eje')->title('Oi Eje');
        $columns[] = Column::make('add')->title('Add');
        $columns[] = Column::make('dp')->title('Dp');
        $columns[] = Column::make('alt')->title('Alt');
        $columns[] = Column::make('tipo_formula')->title('Tipo de Formula');
        $columns[] = Column::computed('especialista')->title('Especialista')
                    ->orderable(true)
                    ->exportable(true)
                    ->printable(true)
                    ->width(60)
                    ->addClass('text-center');
        $columns[] = Column::make('abono_1')->title('Abono 1');
        $columns[] = Column::make('abono_fecha_1')->title('Abono Fecha 1');

        $columns[] = Column::make('tipo_pago_1')->title('Tipo Pago 1');
        $columns[] = Column::make('ref_pago_1')->title('Ref. Pago 1');

        $columns[] = Column::make('abono_2')->title('Abono 2');
        $columns[] = Column::make('abono_fecha_2')->title('Abono Fecha 2');
        
        $columns[] = Column::make('tipo_pago_2')->title('Tipo Pago 2');
        $columns[] = Column::make('ref_pago_2')->title('Ref. Pago 2');
        
        $columns[] = Column::make('abono_3')->title('Abono 3');
        $columns[] = Column::make('abono_fecha_3')->title('Abono Fecha 3');
        
        $columns[] = Column::make('tipo_pago_3')->title('Tipo Pago 3');
        $columns[] = Column::make('ref_pago_3')->title('Ref. Pago 3');
        
        $columns[] = Column::make('abono_4')->title('Abono 4');
        $columns[] = Column::make('abono_fecha_4')->title('Abono Fecha 4');
        
        $columns[] = Column::make('tipo_pago_4')->title('Tipo Pago 4');
        $columns[] = Column::make('ref_pago_4')->title('Ref. Pago 4');

        $columns[] = Column::make('abono_5')->title('Abono 5');
        $columns[] = Column::make('abono_fecha_5')->title('Abono Fecha 5');
        
        $columns[] = Column::make('tipo_pago_5')->title('Tipo Pago 5');
        $columns[] = Column::make('ref_pago_5')->title('Ref. Pago 5');
        
        $columns[] = Column::make('cedula')->title('Cedula');
        $columns[] = Column::make('edad')->title('Edad');
        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Formularios.' . date('Y.m.d.h.i.s.A');
    }
}
