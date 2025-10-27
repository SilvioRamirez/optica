<?php

namespace App\DataTables;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductosDataTable extends DataTable
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

                    if(auth()->user()->can('producto-list')){
                        $buttons .= '<a class="btn btn-info btn-sm" title="Ver Información" href="'.route('productos.show',$query->id).'"> <i class="fa fa-eye"></i></a>';
                    }

                    if(auth()->user()->can('producto-edit')){
                        $buttons .= '<a class="btn btn-primary btn-sm" title="Editar Información" href="'.route('productos.edit',$query->id).'"> <i class="fa fa-pen-to-square"></i></a>';
                    }

                    if(auth()->user()->can('producto-delete')){
                        $buttons .= '<a class="btn btn-danger btn-sm" title="Eliminar" href="'.route('productos.delete',$query->id).'"> <i class="fa fa-trash"></i></a>';
                    }

                    return '<div class="btn-group" role="group" aria-label="Opciones">'.$buttons.'</div>';

                })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Producto $model): QueryBuilder
    {
        return $model->newQuery()
        ->with('categoria:id,nombre')
            ->select([
                'productos.*',
            ])
            ->with([
                'categoria:id,nombre',
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productos-table')
                    ->columns($this->getColumns())
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'initComplete' => 'function(){
                            const table =this.api();
                            const $thead = $(table.table().header());
                            const $filterRow = $thead.find("tr").clone().addClass("filter");
                            $filterRow.find("th").each(function(){
                                const $currentTh = $(this);
                                if(!$currentTh.hasClass("no-search")){
                                    const input = $(`<input type="text" class="form-control form-control-sm" placeholder="${$currentTh.text()}" />`);
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
                    ->dom("<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>"."<'row'<'col-sm-12'tr>>"."<'row'<'col-sm-5'i><'col-sm-7'p>>")
                    ->orderBy(1, 'desc')
                    ->buttons($this->getButtons());
    }

    public function getButtons(): array
    {
        $buttons = [];
        
        if(auth()->user()->can('producto-download')){
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
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id')->title('ID'),
            Column::make('nombre')->title('Nombre'),
            Column::make('precio')->title('Precio'),
            Column::make('descripcion')->title('Descripción'),
            Column::make('imagen')->title('Imagen'),
            Column::make('status')->title('Estatus'),
            Column::make('barcode')->title('Barcode'),
            Column::make('qrcode')->title('QR Code'),
            Column::make('stock')->title('Stock'),
            Column::make('categoria.nombre')->title('Categoria'),
            Column::make('created_at')->title('Creado'),
            Column::make('updated_at')->title('Actualizado'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Productos_' . date('YmdHis');
    }
}
