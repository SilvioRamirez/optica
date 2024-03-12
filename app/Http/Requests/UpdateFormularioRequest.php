<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateFormularioRequest extends FormRequest
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
            /* 'numero_orden' =>       [Rule::unique('formularios')->ignore($request->id)], */
            'fecha'                 => 'required',
            'estatus'               => 'required',
            'paciente'              => 'required',
            'direccion_operativo'   => 'required',
            'telefono'              => 'required',
            'edad'                  => 'required',
            'tipo'                  => 'required',
            'observaciones_extras'  => 'required',
            'total'                 => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'numero_orden'          => 'El campo Numero de Orden es obligatorio y único.',
            'fecha'                 => 'El campo Fecha es obligatorio.',
            'estatus'               => 'El campo Estatus es obligatorio.',
            'paciente'              => 'El campo Paciente es obligatorio.',
            'direccion_operativo'   => 'El campo Dirección/Operativo es obligatorio.',
            'telefono'              => 'El campo Teléfono es obligatorio.',
            'edad'                  => 'El campo Edad es obligatorio.',
            'tipo'                  => 'El campo Tipo es obligatorio.',
            'observaciones_extras'  => 'El campo Tratamiento y Observaciones Extras es obligatorio.',
            'total'                 => 'El campo Total es obligatorio.'
        ];
    }
}
