<?php

namespace App\Http\Controllers;

use App\Models\ClientePayment;
use App\Http\Requests\StoreClientePaymentRequest;
use App\Http\Requests\UpdateClientePaymentRequest;
use App\DataTables\ClientePaymentsDataTable;
use Illuminate\Http\Request;

class ClientePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientePaymentsDataTable $dataTable)
    {
        return $dataTable->render('clientePayments.index');


    }

    public function viewClientePayment($clientePayment)
    {
        $clientePayment = ClientePayment::findOrFail($clientePayment);

        $clientePayment->toJson();

        return response()->json($clientePayment);
    }

    public function confirmClientePayment($clientePayment)
    {
        $clientePayment = ClientePayment::findOrFail($clientePayment);

        /* ClientePayment::create([
            'cliente_id' => $clientePayment->cliente_id,
            'origen_id' => 5,
            'monto' => $clientePayment->monto_usd,
            'pago_fecha' => $clientePayment->fecha_pago,
            'tipo_id' => 2,
            'referencia' => $clientePayment->referencia,
            'image_path' => $clientePayment->file,
        ]); */

        $clientePayment->status = 'CONFIRMADO';
        $clientePayment->save();

        /* $clientePayment->cliente->calculoPagos(); */

        return response()->json($clientePayment);
    }

    public function deleteClientePayment($clientePayment)
    {
        $clientePayment = ClientePayment::findOrFail($clientePayment);
        $clientePayment->delete();

        return response()->json($clientePayment);
    }

    public function edit(ClientePayment $clientePayment)
    {
        return view('clientePayments.edit', compact('clientePayment'));
    }

    public function update(Request $request, ClientePayment $clientePayment)
    {
        $clientePayment->update($request->only([
            'monto',
            'monto_usd',
        ]));

        return redirect()->route('payments.index')->with('success', 'Pago actualizado correctamente');
    }
}
