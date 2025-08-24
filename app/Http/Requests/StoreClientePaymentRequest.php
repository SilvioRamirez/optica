<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientePaymentRequest extends FormRequest
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
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,paid,failed',
            'payment_method' => 'required|in:cash,bank_transfer,credit_card,other',
            'payment_reference' => 'nullable|string',
            'payment_notes' => 'nullable|string',
        ];
    }
}
