<?php

namespace App\DataTables;

use App\Models\FormularioLaboratorio;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FormularioLaboratoriosDataTable extends DataTable
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

                if (auth()->user()->can('orden-laboratorio-list')) {
                    $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="' . route('ordens.show', $query->id) . '"> <i class="fa fa-eye"></i></a>';
                }

                if (auth()->user()->can('orden-laboratorio-edit')) {
                    $buttons .= '<a class="btn btn-primary btn-sm" title="Editar Información" href="' . route('ordens.edit', $query->id) . '"> <i class="fa fa-pen-to-square"></i></a>';
                }

                if (auth()->user()->can('orden-laboratorio-delete')) {
                    $buttons .= '<a class="btn btn-danger btn-sm" title="Eliminar" href="' . route('ordens.delete', $query->id) . '"> <i class="fa fa-trash"></i></a>';
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
                return \Carbon\Carbon::parse($query->fecha_envio)->diffInDays(now(), 2);
            })
            // Columnas para relaciones de orden
            ->addColumn('orden.tipoLente.tipo_lente', function ($query) {
                return $query->orden && $query->orden->tipoLente ? $query->orden->tipoLente->tipo_lente : '';
            })
            ->addColumn('orden.tipoTratamiento.tipo_tratamiento', function ($query) {
                return $query->orden && $query->orden->tipoTratamiento ? $query->orden->tipoTratamiento->tipo_tratamiento : '';
            })
            ->addColumn('orden.ordenStatus.name', function ($query) {
                return $query->orden && $query->orden->ordenStatus ? $query->orden->ordenStatus->name : '';
            })
            // Columnas para relaciones de formulario
            ->addColumn('formulario.tipoLente.tipo_lente', function ($query) {
                return $query->formulario && $query->formulario->tipoLente ? $query->formulario->tipoLente->tipo_lente : '';
            })
            ->addColumn('formulario.tipoTratamiento.tipo_tratamiento', function ($query) {
                return $query->formulario && $query->formulario->tipoTratamiento ? $query->formulario->tipoTratamiento->tipo_tratamiento : '';
            })
            ->setRowId('id', 'pasados');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FormularioLaboratorio $model): QueryBuilder
    {
        return $model->newQuery()
            ->select([
                'formulario_laboratorios.*',
            ])
            ->with([
                'laboratorio:id,razon_social',
                'orden:id,numero_orden,paciente,tipo_tratamiento_id,tipo_lente_id,orden_status_id',
                'orden.tipoTratamiento:id,tipo_tratamiento',
                'orden.tipoLente:id,tipo_lente',
                'orden.ordenStatus:id,name',
                'formulario:id,numero_orden,paciente,tipo_tratamiento_id,tipo,estatus',
                'formulario.tipoTratamiento:id,tipo_tratamiento',
                'formulario.tipoLente:id,tipo_lente',
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('formulario-laboratorios-table')
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

        if (auth()->user()->can('formulario-laboratorio-download')) {
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
        $columns[] = Column::make('laboratorio.razon_social')->title('Laboratorio');
        $columns[] = Column::make('orden.numero_orden')->title('Número de Orden Externa');
        $columns[] = Column::make('orden.ordenStatus.name')->title('Estatus de Orden');
        $columns[] = Column::make('orden.paciente')->title('Paciente Externo');
        $columns[] = Column::make('orden.tipoLente.tipo_lente')->title('Tipo de Lente');
        $columns[] = Column::make('orden.tipoTratamiento.tipo_tratamiento')->title('Tipo de Tratamiento');
        $columns[] = Column::make('formulario.numero_orden')->title('Número de Orden Interno');
        $columns[] = Column::make('formulario.estatus')->title('Estatus');
        $columns[] = Column::make('formulario.paciente')->title('Paciente Interno');
        $columns[] = Column::make('formulario.tipoLente.tipo_lente')->title('Tipo de Lente');
        $columns[] = Column::make('formulario.tipoTratamiento.tipo_tratamiento')->title('Tipo de Tratamiento');
        $columns[] = Column::make('fecha_envio')->title('Fecha Recibida');
        $columns[] = Column::computed('pasados')->title('Días desde Recibida')->orderable(true)
                                ->searchable(true)
                                ->exportable(true)
                                ->printable(true)
                                ->width(60)
                                ->addClass('text-center');
        $columns[] = Column::make('fecha_retorno')->title('Fecha Entrega');
        $columns[] = Column::make('observacion')->title('Observación');
        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FormularioLaboratorios_' . date('YmdHis');
    }
}
