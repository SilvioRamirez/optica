<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'numero_orden' => 'required|string',
            'fecha_recibida' => 'required|date',
            'fecha_entrega' => 'nullable|date',
            'orden_status_id' => 'required|exists:orden_statuses,id',
            'cedula' => 'required|string',
            'paciente' => 'required|string',
            'edad' => 'nullable|string',
            'genero' => 'required|string',
            'tipo_lente_id' => 'nullable|exists:tipo_lentes,id',
            'tipo_tratamiento_id' => 'nullable|exists:tipo_tratamientos,id',
            'od_esf' => 'nullable|string',
            'od_cil' => 'nullable|string',
            'od_eje' => 'nullable|string',
            'oi_esf' => 'nullable|string',
            'oi_cil' => 'nullable|string',
            'oi_eje' => 'nullable|string',
            'add' => 'nullable|string',
            'dp' => 'nullable|string',
            'alt' => 'nullable|string',
            'tipo_formula' => 'nullable|string',
            'precio_cristal' => 'nullable|numeric',
            'precio_montaje' => 'nullable|numeric',
            'precio_total' => 'nullable|numeric',
            'precio_descuento' => 'nullable|numeric',
            'precio_saldo' => 'nullable|numeric',
            'observaciones_extras' => 'nullable|string',
        ];
    }
}
