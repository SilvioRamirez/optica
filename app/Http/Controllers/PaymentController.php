<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentsDataTable;
use App\Models\Payment;
use App\Models\Pago;
use Illuminate\Http\Request;
use App\Services\WhatsAppApiService;
use App\Services\GroqAIService;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index(PaymentsDataTable $dataTable)
    {
        return $dataTable->render('payments.index');
    }

    public function viewPayment($payment)
    {
        $payment = Payment::findOrFail($payment);

        $payment->toJson();

        return response()->json($payment);
    }

    public function confirmPayment($payment)
    {
        $payment = Payment::findOrFail($payment);

        Pago::create([
            'formulario_id' => $payment->formulario_id,
            'origen_id' => 5,
            'monto' => $payment->monto_usd,
            'pago_fecha' => $payment->fecha_pago,
            'tipo_id' => 2,
            'referencia' => $payment->referencia,
            'image_path' => $payment->file,
        ]);

        $payment->status = 'CONFIRMADO';
        $payment->save();

        $payment->formulario->calculoPagos();

        // Generar mensaje personalizado con IA
        if ($payment->formulario->whatsapp_send) {
            try {
        $groqService = app(GroqAIService::class);
        $mensajeResult = $groqService->generarMensajeConfirmacionPago([
            'nombre_paciente' => $payment->formulario->paciente,
            'monto' => number_format($payment->monto_usd, 2),
            'referencia' => $payment->referencia,
            'fecha_pago' => Carbon::parse($payment->fecha_pago)->format('d/m/Y'),
                'numero_orden' => $payment->numero_orden,
            ]);

            $mensaje = $mensajeResult['mensaje'] ?? 'Pago confirmado exitosamente';

            // Enviar mensaje por WhatsApp
                $whatsappApiService = app(WhatsAppApiService::class);
                $whatsappApiService->sendMessage($payment->formulario->telefono, $mensaje);
            } catch (\Exception $e) {
                // No detener el flujo si falla el envío del mensaje
                Log::error('Error al enviar mensaje de confirmación de pago', [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return response()->json($payment);
    }

    public function deletePayment($payment)
    {
        $payment = Payment::findOrFail($payment);
        $payment->delete();

        return response()->json($payment);
    }

    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->only([
            'monto',
            'monto_usd',
        ]));

        return redirect()->route('payments.index')->with('success', 'Pago actualizado correctamente');
    }
}
