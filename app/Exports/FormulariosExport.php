<?php

namespace App\Exports;

use App\Models\Formulario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FormulariosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Formulario::with('tipoLente', 'tipoTratamiento', 'rutaEntrega', 'especialistaLente', 'descuento', 'origen')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Numero de Orden',
            'Paciente',
            'Telefono',
            'Phone',
            'Estatus',
            'Origen',
            'Ruta de Entrega',
            'Tipo de Lente',
            'Tipo de Tratamiento',
            'Observaciones Extras',
            'Precio Montura',
            'Total',
            'Saldo',
            'Porcentaje de Pago',
            'Descuento Descripción',
            'Descuento Total',
            'Cashea',
            'Días Pasados',
            'Fecha',
            'Fecha Proxima Cita',
            'Operativo',
            'Laboratorio',
            'OD Esfera',
            'OD Cilindro',
            'OD Eje',
            'OI Esfera',
            'OI Cilindro',
            'OI Eje',
            'Add',
            'Dp',
            'Alto',
            'Tipo de Formula',
            'Especialista',
            'Cedula',
            'Edad',
            'Genero'
        ];
    }

    public function map($formulario): array
    {
        return [
            $formulario->id,
            $formulario->numero_orden ?? '',
            $formulario->paciente ?? '',
            $formulario->telefono ?? '',
            $formulario->phone ?? '',
            $formulario->estatus ?? '',
            $formulario->origen->nombre ?? '',
            $formulario->rutaEntrega->nombre ?? '',
            $formulario->tipoLente->tipo_lente ?? '',
            $formulario->tipoTratamiento->tipo_tratamiento ?? '',
            $formulario->observaciones_extras ?? '',
            $formulario->precio_montura ?? '',
            $formulario->total ?? '',
            $formulario->saldo ?? '',
            $formulario->porcentaje_pago ?? '',
            $formulario->descuento->descripcion ?? '',
            $formulario->descuento->total ?? '',
            $formulario->cashea ?? '',
            $formulario->dias_pasados ?? '',
            $formulario->fecha ?? '',
            $formulario->fecha_proxima_cita ?? '',
            $formulario->operativo->nombre ?? '',
            $formulario->laboratorio->nombre ?? '',
            $formulario->od_esfera ?? '',
            $formulario->od_cilindro ?? '',
            $formulario->od_eje ?? '',
            $formulario->oi_esfera ?? '',
            $formulario->oi_cilindro ?? '',
            $formulario->oi_eje ?? '',
            $formulario->add ?? '',
            $formulario->dp ?? '',
            $formulario->alto ?? '',
            $formulario->tipo_formula ?? '',
            $formulario->especialista ?? '',
            $formulario->cedula ?? '',
            $formulario->edad ?? '',
            $formulario->genero ?? '',
        ];
    }
}
