<?php

namespace App\DataTables;

use App\Models\Identity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class IdentitiesDataTable extends DataTable
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

                    if(auth()->user()->can('identity-list')){
                        $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="'.route('identities.show',$query->id).'"> <i class="fa fa-eye"></i></a>';
                    }

                    if(auth()->user()->can('identity-edit')){
                        $buttons .= '<a class="btn btn-primary btn-sm" title="Editar Información" href="'.route('identities.edit',$query->id).'"> <i class="fa fa-pen-to-square"></i></a>';
                    }

                    if(auth()->user()->can('identity-delete')){
                        $buttons .= '<a class="btn btn-danger btn-sm" title="Eliminar" href="'.route('identities.delete',$query->id).'"> <i class="fa fa-trash"></i></a>';
                    }

                    return '<div class="btn-group" role="group" aria-label="Opciones">'.$buttons.'</div>';

                })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Identity $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('identities-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->language([
                        'url' => url('storage/js/datatables/Spanish.json')
                    ])
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(1, 'desc')
                    ->buttons($this->getButtons());
    }

    public function getButtons(): array
    {
        $buttons = [];
        
        if(auth()->user()->can('identity-download')){
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
        $columns[] = Column::make('name')->title('Nombre');
        $columns[] = Column::make('description')->title('Descripción');
        $columns[] = Column::make('created_at')->title('Creado');
        $columns[] = Column::make('updated_at')->title('Actualizado');

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Identidades_' . date('YmdHis');
    }
}
