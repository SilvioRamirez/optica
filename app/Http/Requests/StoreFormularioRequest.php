<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormularioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'numero_orden'          => 'sometimes|required|unique:formularios,numero_orden',
            'fecha'                 => 'required',
            'estatus'               => 'required',
            'paciente'              => 'required',
            'operativo_id'          => 'required',
            'direccion_operativo'   => 'required',
            'telefono'              => 'required',
            'edad'                  => 'required',
            'tipo'                  => 'required',
            'observaciones_extras'  => '',
            'total'                 => 'required'
        ];
    }

    public function messages():array
    {
        return [
            'numero_orden'          => 'El campo Numero de Orden es obligatorio y único.',
            'fecha'                 => 'El campo Fecha es obligatorio.',
            'estatus'               => 'El campo Estatus es obligatorio.',
            'paciente'              => 'El campo Paciente es obligatorio.',
            'operativo_id'          => 'El campo Operativo es obligatorio.',
            'direccion_operativo'   => 'El campo Dirección/Operativo es obligatorio.',
            'telefono'              => 'El campo Teléfono es obligatorio.',
            'edad'                  => 'El campo Edad es obligatorio.',
            'tipo'                  => 'El campo Tipo es obligatorio.',
            'observaciones_extras'  => 'El campo Tratamiento y Observaciones Extras es obligatorio.',
            'total'                 => 'El campo Total es obligatorio.'
        ];
    }
}
