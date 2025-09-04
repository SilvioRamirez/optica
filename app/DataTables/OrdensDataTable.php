<?php

namespace App\DataTables;

use App\Models\Orden;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdensDataTable extends DataTable
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

                if (auth()->user()->can('orden-list')) {
                    $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="' . route('ordens.show', $query->id) . '"> <i class="fa fa-eye"></i></a>';
                }

                if (auth()->user()->can('orden-edit')) {
                    $buttons .= '<a class="btn btn-primary btn-sm" title="Editar Información" href="' . route('ordens.edit', $query->id) . '"> <i class="fa fa-pen-to-square"></i></a>';
                }

                if (auth()->user()->can('orden-delete')) {
                    $buttons .= '<a class="btn btn-danger btn-sm" title="Eliminar" href="' . route('ordens.delete', $query->id) . '"> <i class="fa fa-trash"></i></a>';
                }

                if (auth()->user()->can('orden-estatus')) {
                    $buttons .= '<a class="btn btn-secondary btn-sm" title="Generar PDF" href="' . route('ordens.pdf', $query->id) . '" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i></a>';
                }

                if (auth()->user()->can('orden-estatus')) {
                    $buttons .= '<button type="button" class="btn btn-success btn-sm" title="Registro de Pagos" data-argid="' . $query->id . '" onclick="openModalPagos(\'' . $query->id . '\')"><i class="fa fa-file-invoice-dollar"></i></button>';
                }

                return '<div class="btn-group" role="group" aria-label="Opciones">' . $buttons . '</div>';
            })
            ->addColumn('tipoLente', function ($query) {
                return $query->tipoLente ? $query->tipoLente->tipo_lente : '';
            })
            ->orderColumn('tipoLente', function ($query, $order) {
                $query->whereHas('tipoLente', function ($q) use ($order) {
                    $q->orderBy('tipo_lente', $order);
                });
            })
            ->filterColumn('tipoLente', function ($query, $keyword) {
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
            ->addColumn('ordenStatus', function ($query) {
                return $query->ordenStatus ? $query->ordenStatus->name : '';
            })
            ->orderColumn('ordenStatus', function ($query, $order) {
                $query->whereHas('ordenStatus', function ($q) use ($order) {
                    $q->orderBy('name', $order);
                });
            })
            ->filterColumn('ordenStatus', function ($query, $keyword) {
                $query->whereHas('ordenStatus', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                });
            })
            ->addColumn('pasados', function ($query) {
                return \Carbon\Carbon::parse($query->fecha_recibida)->diffInDays(now(), 2);
            })
            ->setRowId('id', 'pasados');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Orden $model): QueryBuilder
    {
        return $model->newQuery()
            ->select([
                'ordens.*',
            ])
            ->with([
                'tipoTratamiento:id,tipo_tratamiento',
                'tipoLente:id,tipo_lente',
                'cliente:id,name',
                'ordenStatus:id,name',
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ordens-table')
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
            ->language([
                'url' => url('storage/js/datatables/Spanish.json')
            ])
            ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(1, 'desc')
            ->buttons($this->getButtons());
    }

    public function getButtons(): array
    {
        $buttons = [];

        if (auth()->user()->can('orden-download')) {
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
        $columns[] = Column::make('cliente.name')->title('Cliente');
        $columns[] = Column::make('numero_orden')->title('Número de Orden');
        $columns[] = Column::make('fecha_recibida')->title('Fecha Recibida');
        $columns[] = Column::computed('pasados')->title('Días desde Recibida')->orderable(true)
                                ->searchable(true)
                                ->exportable(true)
                                ->printable(true)
                                ->width(60)
                                ->addClass('text-center');
        $columns[] = Column::make('fecha_entrega')->title('Fecha Entrega');
        $columns[] = Column::computed('ordenStatus')->title('Estatus de Orden')->orderable(true)
                                ->searchable(true)
                                ->exportable(true)
                                ->printable(true)
                                ->width(60)
                                ->addClass('text-center');
        $columns[] = Column::make('cedula')->title('Cédula');
        $columns[] = Column::make('paciente')->title('Paciente');
        $columns[] = Column::make('edad')->title('Edad');
        $columns[] = Column::make('genero')->title('Género');
        $columns[] = Column::computed('tipoLente')->title('Tipo de Lente')->orderable(true)
                                ->searchable(true)
                                ->exportable(true)
                                ->printable(true)
                                ->width(60)
                                ->addClass('text-center');
        $columns[] = Column::computed('tipoTratamiento')->title('Tipo de Tratamiento')->orderable(true)
                                ->searchable(true)
                                ->exportable(true)
                                ->printable(true)
                                ->width(60)
                                ->addClass('text-center');
        $columns[] = Column::make('od_esf')->title('OD Esfera');
        $columns[] = Column::make('od_cil')->title('OD Cilindro');
        $columns[] = Column::make('od_eje')->title('OD Eje');
        $columns[] = Column::make('oi_esf')->title('OI Esfera');
        $columns[] = Column::make('oi_cil')->title('OI Cilindro');
        $columns[] = Column::make('oi_eje')->title('OI Eje');
        $columns[] = Column::make('add')->title('Add');
        $columns[] = Column::make('dp')->title('Dp');
        $columns[] = Column::make('alt')->title('Alt');
        $columns[] = Column::make('tipo_formula')->title('Tipo de Formula');
        $columns[] = Column::make('observaciones_extras')->title('Observaciones Extras');
        $columns[] = Column::make('precio_cristal')->title('Precio Cristal');
        $columns[] = Column::make('precio_montaje')->title('Precio Montaje');
        $columns[] = Column::make('precio_total')->title('Monto Total');
        $columns[] = Column::make('precio_descuento')->title('Monto Descuento');
        $columns[] = Column::make('precio_saldo')->title('Saldo');
        $columns[] = Column::make('precio_porcentaje_pago')->title('Porcentaje Pagado');
        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Ordens_' . date('YmdHis');
    }
}
