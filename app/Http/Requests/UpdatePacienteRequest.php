<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePacienteRequest extends FormRequest
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
    /* public function rules(): array
    {
        return [
            //
        ];
    } */

    public function rules()
    {
        $rules = [
            'cedula'  => ['required', Rule::unique('pacientes')->ignore($this->cedula, 'cedula'),],
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'telefono' => '',
            'direccion' => '',
            'estado' => '',
            'municipio' => '',
            'parroquia' => '',
            'sector' => '',
            'correo' => '',
            'observacion' => '',
            'status' => '',
        ];

        return $rules;
    }
}
