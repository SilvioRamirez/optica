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
            ->addColumn('action', function ($query) {

                $buttons = '';

                if (auth()->user()->can('formulario-list')) {
                    $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="' . route('formularios.show', $query->id) . '"> <i class="fa fa-eye"></i></a>';
                }

                if (auth()->user()->can('formulario-edit')) {
                    $buttons .= '<a class="btn btn-warning btn-sm" title="Editar Información" href="' . route('formularios.edit', $query->id) . '"> <i class="fa fa-pen-to-square"></i></a>';
                }

                if (auth()->user()->can('formulario-delete')) {
                    $buttons .= '<a class="btn btn-danger btn-sm" title="Eliminar" href="' . route('formularios.delete', $query->id) . '"> <i class="fa fa-trash"></i></a>';
                }

                if (auth()->user()->can('formulario-estatus')) {
                    $buttons .= '<a class="btn btn-success btn-sm" title="Envíar WhatsApp" href="https://api.whatsapp.com/send?phone=' . $query->telefono . '&text=¡Hola!" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-whatsapp"></i></a>';
                }

                if (auth()->user()->can('formulario-list')) {
                    $buttons .= '<a class="btn btn-secondary btn-sm" title="Generar PDF" href="' . route('formulario.orden.pdf', $query->id) . '" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i></a>';
                }

                if (auth()->user()->can('formulario-estatus')) {
                    $buttons .= '<button type="button" class="btn btn-primary btn-sm" title="Cambiar Estatus" data-argid="' . $query->id . '" onclick="openModal(\'' . $query->id . '\')"><i class="fa fa-clipboard-check"></i></button>';
                }

                if (auth()->user()->can('formulario-estatus')) {
                    $buttons .= '<button type="button" class="btn btn-dark btn-sm" title="Fotografías Contrato" data-argid="' . $query->id . '" onclick="openModalFotografiasContrato(\'' . $query->id . '\')"><i class="fa fa-camera"></i></button>';
                }

                if (auth()->user()->can('formulario-estatus')) {
                    $buttons .= '<button type="button" class="btn btn-light btn-sm" title="Registro de Pagos" data-argid="' . $query->id . '" onclick="openModalPagosContrato(\'' . $query->id . '\')"><i class="fa fa-file-invoice-dollar"></i></button>';
                }

                if (auth()->user()->can('formulario-estatus')) {
                    $buttons .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Registro de Laboratorios" data-argid="' . $query->id . '" onclick="openModalLaboratorios(\'' . $query->id . '\')"><i class="fa fa-truck-medical"></i></button>';
                }


                return '<div class="btn-group" role="group" aria-label="Opciones">' . $buttons . '</div>';
            })
            ->addColumn('phone', function ($query) {

                return $query->phone;
            })
            ->filterColumn('phone', function ($query, $keyword) {
                $query->where('telefono', 'like', "%$keyword%");
            })
            ->addColumn('pasados', function ($query) {
                return \Carbon\Carbon::parse($query->fecha)->diffInDays(now(), 2);
            })
            ->addColumn('tipo', function ($query) {
                return $query->tipoLente ? $query->tipoLente->tipo_lente : '';
            })
            ->orderColumn('tipo', function ($query, $order) {
                $query->whereHas('tipoLente', function ($q) use ($order) {
                    $q->orderBy('tipo_lente', $order);
                });
            })
            ->filterColumn('tipo', function ($query, $keyword) {
                $query->whereHas('tipoLente', function ($query) use ($keyword) {
                    $query->where('tipo_lente', 'like', "%$keyword%");
                });
            })
            ->addColumn('tipoTratamiento', function ($query) {
                return $query->tipoTratamiento ? $query->tipoTratamiento->tipo_tratamiento : '';
            })
            ->orderColumn('tipoTratamiento', function ($query, $order) {
                $query->whereHas('tipoTratamiento', function ($q) use ($order) {
                    $q->orderBy('tipo_tratamiento', $order);
                });
            })
            ->filterColumn('tipoTratamiento', function ($query, $keyword) {
                $query->whereHas('tipoTratamiento', function ($query) use ($keyword) {
                    $query->where('tipo_tratamiento', 'like', "%$keyword%");
                });
            })
            ->addColumn('rutaEntrega', function ($query) {
                return $query->rutaEntrega ? $query->rutaEntrega->ruta_entrega : '';
            })
            ->orderColumn('rutaEntrega', function ($query, $order) {
                $query->whereHas('rutaEntrega', function ($q) use ($order) {
                    $q->orderBy('ruta_entrega', $order);
                });
            })
            ->filterColumn('rutaEntrega', function ($query, $keyword) {
                $query->whereHas('rutaEntrega', function ($query) use ($keyword) {
                    $query->where('ruta_entrega', 'like', "%$keyword%");
                });
            })
            ->addColumn('especialista', function ($query) {
                return $query->especialistaLente ? $query->especialistaLente->nombre : '';
            })
            ->orderColumn('especialista', function ($query, $order) {
                $query->whereHas('especialistaLente', function ($q) use ($order) {
                    $q->orderBy('nombre', $order);
                });
            })
            ->filterColumn('especialista', function ($query, $keyword) {
                $query->whereHas('especialistaLente', function ($query) use ($keyword) {
                    $query->where('nombre', 'like', "%$keyword%");
                });
            })
            ->addColumn('descuento', function ($query) {
                return $query->descuento ? $query->descuento->nombre : '';
            })
            ->orderColumn('descuento', function ($query, $order) {
                $query->whereHas('descuento', function ($q) use ($order) {
                    $q->orderBy('nombre', $order);
                });
            })
            ->filterColumn('descuento', function ($query, $keyword) {
                $query->whereHas('descuento', function ($query) use ($keyword) {
                    $query->where('nombre', 'like', "%$keyword%");
                });
            })
            ->addColumn('operativo_id', function ($query) {
                return $query->operativo ? $query->operativo->nombre_operativo : '';
            })
            ->orderColumn('operativo_id', function ($query, $order) {
                $query->whereHas('operativo', function ($q) use ($order) {
                    $q->orderBy('nombre_operativo', $order);
                });
            })
            ->filterColumn('operativo_id', function ($query, $keyword) {
                $query->whereHas('operativo', function ($query) use ($keyword) {
                    $query->where('nombre_operativo', 'like', "%$keyword%");
                });
            })
            ->addColumn('cashea', function ($query) {
                return $query->cashea ? 'SI' : 'NO';
            })
            ->orderColumn('cashea', function ($query, $order) {
                $query->orderBy('cashea', $order);
            })
            ->filterColumn('cashea', function ($query, $keyword) {
                $query->where('cashea', 'like', "%$keyword%");
            })
            ->addColumn('origen_id', function ($query) {
                return $query->origen ? $query->origen->nombre : '';
            })
            ->orderColumn('origen_id', function ($query, $order) {
                $query->whereHas('origen', function ($q) use ($order) {
                    $q->orderBy('nombre', $order);
                });
            })
            ->filterColumn('origen_id', function ($query, $keyword) {
                $query->whereHas('origen', function ($query) use ($keyword) {
                    $query->where('nombre', 'like', "%$keyword%");
                });
            })
            ->rawColumns(['action', 'phone', 'tipo', 'pasados', 'tipoTratamiento', 'rutaEntrega', 'especialista', 'descuento', 'operativo_id'])
            ->setRowId('id');
    }



    /**
     * Get the query source of dataTable.
     */
    public function query(Formulario $model): QueryBuilder
    {
        // Optimizado con carga eager de todas las relaciones necesarias
        return $model->newQuery()
            ->select([
                'formularios.*',
                // Agregamos selects específicos para optimizar si es necesario
            ])
            ->with([
                'tipoLente:id,tipo_lente',
                'tipoTratamiento:id,tipo_tratamiento',
                'especialistaLente:id,nombre',
                'rutaEntrega:id,ruta_entrega',
                'operativo:id,nombre_operativo',
                'descuento:id,nombre',
                'origen:id,nombre'
            ]);
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
            ->parameters([
                'initComplete' => 'function(){

                            const table =this.api();
                            const $thead = $(table.table().header());
                            const $filterRow = $thead.find("tr").clone().addClass("filter");

                            $filterRow.find("th").each(function(){
                                const $currentTh = $(this);
                                if(!$currentTh.hasClass("no-search")){
                                    const input = $(`<input type="text" class="form-control form-control-sm" placeholder="Buscar ${$currentTh.text()}" />`);
                                    $currentTh.html(input);
                                    $(input).on("click", function(event){
                                        event.stopPropagation();
                                    });
                                    $(input).on("keyup change clear", function(){
                                        if (table.column($currentTh.index()).search() !== this.value){
                                            table.column($currentTh.index()).search(this.value).draw();
                                        }
                                    });
                                }else{
                                    $currentTh.empty();
                                }
                            });

                            $thead.append($filterRow);

                        }'
            ])
            ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(1, 'desc')
            ->language([
                'url' => url('storage/js/datatables/Spanish.json')
            ])
            ->buttons($this->getButtons())
            ->processing(true)
            ->serverSide(true);
    }

    public function getButtons(): array
    {
        $buttons = [];

        if (auth()->user()->can('formulario-download')) {
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
            ->addClass('text-center no-search');
        $columns[] = Column::make('id')->title('ID')->width(160);
        $columns[] = Column::make('numero_orden')->title('Numero de Orden');
        $columns[] = Column::make('paciente')->title('Paciente');
        if (auth()->user()->can('formulario-telefono')) {
            $columns[] = Column::make('telefono')->title('Telefono');
        }
        if (auth()->user()->can('formulario-telefono')) {
            $columns[] = Column::computed('phone')->title('Phone')
            ->orderable(true)
            ->searchable(false)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');;
        }
        $columns[] = Column::make('estatus')->title('Estatus');
        $columns[] = Column::computed('origen_id')->title('Origen')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::computed('rutaEntrega')->title('Ruta de Entrega')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::make('fecha_entrega')->title('Fecha de Entrega');
        $columns[] = Column::computed('tipo')->title('Tipo de Lente')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::computed('tipoTratamiento')->title('Tipo de Tratamiento')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::make('observaciones_extras')->title('Observaciones Extras');
        $columns[] = Column::make('precio_montura')->title('Precio Montura');
        $columns[] = Column::make('total')->title('Total');
        $columns[] = Column::make('saldo')->title('Saldo');
        $columns[] = Column::computed('porcentaje_pago')->title('Pagado (%)')
            ->orderable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::computed('descuento')->title('Descuento (descripción)')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::computed('total_descuento')->title('Descuento (total)')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::computed('cashea')->title('CASHEA')
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
        $columns[] = Column::computed('operativo_id')->title('Operativo')
            ->orderable(true)
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');
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
            ->searchable(true)
            ->exportable(true)
            ->printable(true)
            ->width(60)
            ->addClass('text-center');

        $columns[] = Column::make('cedula')->title('Cedula');
        $columns[] = Column::make('edad')->title('Edad');
        $columns[] = Column::make('genero')->title('Genero');

        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');
        $columns[] = Column::make('created_by')->title('Creado por');
        $columns[] = Column::make('updated_by')->title('Actualizado por');



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
