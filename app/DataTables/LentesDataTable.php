<?php

namespace App\DataTables;

use App\Models\Lente;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LentesDataTable extends DataTable
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
                            <a class="btn btn-danger btn-sm"    title="Eliminar Lente"  href="'.route('pacientes.lente.delete', $query->id).'"><i class="fa fa-trash"></i></a>
                            <a class="btn btn-info btn-sm"      title="Ver Lente"       href="'.route('pacientes.lente.show', $query->id).'"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-warning btn-sm"   title="Editar Lente"    href="'.route('pacientes.lente.edit', $query->id).'"><i class="fa fa-pencil"></i></a>
                        </div>';
            })
            ->addColumn('status', function($query){
                
                return statusLenteColumn($query);

            })
            ->addColumn('paciente', function($query){
                foreach($query->pacientes as $paciente){
                    return $paciente->nombres.' '.$paciente->apellidos;
                }
            })
            ->addColumn('formula', function($query){

                return formulaLenteColumn($query);

            })
            ->addColumn('tratamiento', function($query){
                
                return tratamientoLenteColumn($query);

            })
            ->rawColumns(['status', 'action', 'paciente', 'formula', 'tratamiento'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Lente $model): QueryBuilder
    {
        return $model->newQuery()->with('pacientes')->with('formulas')->with('tratamientos');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('lentes-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(0, 'asc')
                    ->lengthMenu([10, 25, 50, 100, 500])
                    ->pageLength(25)
                    ->language([
                        'url' => url('storage/js/datatables/Spanish.json')
                    ])->buttons([
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
            Column::make('id')->title('ID'),
            Column::computed('paciente')->title('Paciente')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('formula')->title('Formula')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('numero_orden')->title('Nro. Orden')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('status')->title('Estatus')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('adicion')->title('Add')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('distancia_pupilar')->title('Dp')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('alt')->title('Alt')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('tipo_lente')->title('Tipo')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('tratamiento')->title('Tratamiento')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
                    ->addClass('text-center'),
            Column::computed('tallado')->title('Tallado')
                    ->exportable(true)
                    ->printable(false)
                    ->searchable(true)
                    ->orderable(true)
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
        return 'Lentes_' . date('YmdHis');
    }
}
