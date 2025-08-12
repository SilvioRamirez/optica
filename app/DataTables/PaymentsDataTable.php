<?php

namespace App\DataTables;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentsDataTable extends DataTable
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
                    $buttons .= '<a class="btn btn-info btn-sm" title="Mostrar" data-argid="' . $query->id . '" onclick="openModalViewPayment(\''  .$query->id.  '\')"><i class="fa fa-eye"></i></a>';
                }
                if (auth()->user()->can('pago-edit')) {
                    $buttons .= '<a class="btn btn-primary btn-sm"   title="Editar Información Basica"     href="'.route('payments.edit',$query->id).'">              <i class="fa fa-pen-to-square"></i></a>';
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
            ->addColumn('file', function ($query) {
                return $query->file ? 
                '<a href="' . $query->file . '" target="_blank" class="">
                    <img src="' . $query->file . '" class="rounded m-1" style="width: 50px; height: 50px;">
                </a>'
              
                : '';
            })
            ->rawColumns(['action', 'numero_orden', 'file'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Payment $model): QueryBuilder
    {
        return $model->newQuery()->with('formulario'); //Se reduce de 82 consultas a 9 con los with
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('payments-table')
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
        $columns[] = Column::make('monto')->title('Monto Pagado');
        $columns[] = Column::make('monto_usd')->title('Monto Pagado USD');
        $columns[] = Column::make('fecha')->title('Fecha');
        $columns[] = Column::make('file')->title('Archivo');
        $columns[] = Column::make('status')->title('Estado');
        $columns[] = Column::make('banco_emisor')->title('Banco Emisor');
        $columns[] = Column::make('referencia')->title('Referencia');
        $columns[] = Column::make('fecha_pago')->title('Fecha Pago');
        $columns[] = Column::make('tasa_cambio')->title('Tasa Cambio');
        $columns[] = Column::make('paciente')->title('Paciente');
        $columns[] = Column::make('saldo')->title('Saldo');
        $columns[] = Column::make('saldo_bs')->title('Saldo Bs');
        $columns[] = Column::make('total')->title('Total');
        $columns[] = Column::make('cedula')->title('Cedula');
        $columns[] = Column::make('edad')->title('Edad');
        $columns[] = Column::make('telefono')->title('Telefono');
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
        return 'WebPayments_' . date('YmdHis');
    }
}
