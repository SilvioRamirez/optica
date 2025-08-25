<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrdenPaymentRequest extends FormRequest
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
            'orden_id' => 'required|exists:ordens,id',
            'orden_payment_origin_id' => 'required|exists:orden_payment_origins,id',
            'orden_payment_type_id' => 'required|exists:orden_payment_types,id',
            'monto' => 'required|numeric',
            'pago_fecha' => 'required|date',
            'referencia' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
