<?php

namespace App\DataTables;

use App\Models\Laboratorio;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LaboratoriosDataTable extends DataTable
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
                            <a class="btn btn-info btn-sm"      title="Ver"       href="'.route('laboratorios.show', $query->id).'"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-warning btn-sm"   title="Editar"    href="'.route('laboratorios.edit', $query->id).'"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger btn-sm"    title="Eliminar"  href="'.route('laboratorios.delete', $query->id).'"><i class="fa fa-trash"></i></a>
                        </div>';
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Laboratorio $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('laboratorios-table')
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
            Column::make('id'),
            Column::make('documento_fiscal')->title('Doc. Fiscal'),
            Column::make('razon_social')->title('R. Social'),
            Column::make('representante_organizacion')->title('Representante'),
            Column::make('representante_cargo')->title('Cargo'),
            Column::make('direccion_fiscal')->title('Dir. Fiscal'),
            Column::make('telefono_uno')->title('Tlf. 1'),
            Column::make('telefono_dos')->title('Tlf. 2'),
            Column::make('correo')->title('Correo'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
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
        return 'Laboratorios_' . date('YmdHis');
    }
}
