<?php

namespace App\DataTables;

use App\Models\CondicionOptica;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CondicionOpticasDataTable extends DataTable
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

                if (auth()->user()->can('pago-show')) {
                    $buttons .= '<a href="' . route('formularios.show', $query->formulario->id) . '" class="btn btn-info btn-sm" title="Mostrar"><i class="fa fa-eye"></i></a>';
                }

                return '<div class="btn-group" role="group" aria-label="Opciones">' . $buttons . '</div>';
            })
            ->addColumn('numero_orden', function ($query) {
                return $query->formulario ? $query->formulario->numero_orden : 'N/A';
            })
            ->filterColumn('numero_orden', function ($query, $keyword) {
                $query->whereHas('formulario', function ($query) use ($keyword) {
                    $query->where('numero_orden', 'like', "%$keyword%");
                });
            })
            ->addColumn('operativo_id', function ($query) {
                return $query->formulario ? $query->formulario->operativo->nombre_operativo : 'N/A';
            })
            ->filterColumn('operativo_id', function ($query, $keyword) {
                $query->whereHas('formulario.operativo', function ($query) use ($keyword) {
                    $query->where('nombre_operativo', 'like', "%$keyword%");
                });
            })
            ->addColumn('paciente', function ($query) {
                return $query->formulario ? $query->formulario->paciente : 'N/A';
            })
            ->filterColumn('paciente', function ($query, $keyword) {
                $query->whereHas('formulario', function ($query) use ($keyword) {
                    $query->where('paciente', 'like', "%$keyword%");
                });
            })
            ->addColumn('cedula', function ($query) {
                return $query->formulario ? $query->formulario->cedula : 'N/A';
            })
            ->filterColumn('cedula', function ($query, $keyword) {
                $query->whereHas('formulario', function ($query) use ($keyword) {
                    $query->where('cedula', 'like', "%$keyword%");
                });
            })
            ->rawColumns(['action', 'paciente', 'numero_orden', 'operativo_id'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(CondicionOptica $model): QueryBuilder
    {
        return $model->newQuery()->with('formulario', 'formulario.operativo'); //Se reduce de 82 consultas a 9 con los with
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('condicion-opticas-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-5'i><'col-sm-7'p>>")
            ->orderBy(1, 'desc')
            ->lengthMenu([10, 25, 50, 100, 500])
            ->pageLength(25)
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
        $columns = [];

        $columns[] = Column::computed('action')->title('Acción')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center');
        $columns[] = Column::make('id')->title('ID');
        $columns[] = Column::make('formulario_id')->title('Formulario ID');
        $columns[] = Column::make('numero_orden')->title('Numero Orden');
        $columns[] = Column::make('operativo_id')->title('Operativo');
        $columns[] = Column::make('paciente')->title('Paciente');
        $columns[] = Column::make('cedula')->title('Cedula');
        $columns[] = Column::make('cond_od')->title('Condición Ojo Derecho');
        $columns[] = Column::make('cond_oi')->title('Condición Ojo Izquierdo');
        $columns[] = Column::make('eval_oj')->title('Evaluación');
        $columns[] = Column::make('presbicia')->title('Presbicia');
        $columns[] = Column::make('miopia_magna')->title('Miopia Magna');
        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Condiciones_Opticas_' . date('YmdHis');
    }
}
