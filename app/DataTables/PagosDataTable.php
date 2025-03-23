<?php

namespace App\DataTables;

use App\Models\Pago;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PagosDataTable extends DataTable
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

                    if(auth()->user()->can('pago-delete')){
                        $buttons .= '<button class="btn btn-danger btn-sm" title="Eliminar" data-argid="'.$query->id.'" onclick="openModalDelete(\''.$query->id.'\')"> <i class="fa fa-trash"></i></button>';
                    }

                return '<div class="btn-group" role="group" aria-label="Opciones">'.$buttons.'</div>';
            })
            ->addColumn('numero_orden', function($query){
                return $query->formulario->numero_orden;
            })
            ->filterColumn('numero_orden', function($query, $keyword){
                $query->whereHas('formulario', function($query) use ($keyword){
                    $query->where('numero_orden', 'like', "%$keyword%");
                });
            })
            ->addColumn('paciente', function($query){
                return $query->formulario->paciente;
            })
            ->filterColumn('paciente', function($query, $keyword){
                $query->whereHas('formulario', function($query) use ($keyword){
                    $query->where('paciente', 'like', "%$keyword%");
                });
            })
            ->addColumn('tipo', function($query){
                return $query->tipo ? $query->tipo->tipo : 'N/A';
            })
            ->filterColumn('tipo', function($query, $keyword){
                $query->whereHas('tipo', function($query) use ($keyword){
                    $query->where('tipo', 'like', "%$keyword%");
                });
            })
            ->rawColumns(['action', 'paciente', 'numero_orden', 'tipo'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pago $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pagos-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(0, 'asc')
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
        $columns[] = Column::make('paciente')->title('Paciente');
        $columns[] = Column::make('monto')->title('Monto');
        $columns[] = Column::make('pago_fecha')->title('Fecha Pago');
        $columns[] = Column::make('tipo')->title('Tipo Pago');
        $columns[] = Column::make('referencia')->title('Referencia');
        if(auth()->user()->can('pago-list')){
            $columns[] = Column::make('image_path')->title('Imagen');
        }
        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pagos_' . date('YmdHis');
    }
}
