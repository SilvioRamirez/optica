<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Identity;
use App\Models\Tasa;
use App\Models\ClientePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ConsultaWebClienteController extends Controller
{
    public function index()
    {
        $identities = Identity::all();
        return view('consultaWebCliente.index', compact('identities'));
    }

    public function buscar(Request $request)
    {
        $cliente = Cliente::where('document_number', $request->document_number)
                    ->where('identity_id', $request->identity_id)
                    ->with([
                        'identity', 
                        'clientePayments', 
                        'ordens' => function($query) {
                            $query->join('orden_statuses', 'ordens.orden_status_id', '=', 'orden_statuses.id')
                                  ->where(function($q) {
                                      $q->where('ordens.precio_saldo', '>', 0)
                                        ->orWhere(function($subQuery) {
                                            $subQuery->where('ordens.precio_saldo', '=', 0)
                                                     ->where('orden_statuses.name', '!=', 'ENTREGADO')
                                                     ->where('orden_statuses.name', '!=', 'Entregado')
                                                     ->where('orden_statuses.name', '!=', 'entregado');
                                        });
                                  })
                                  ->select('ordens.*')
                                  ->with(['tipoTratamiento', 'tipoLente', 'ordenStatus', 'ordenPayments'])
                                  ->orderBy('ordens.created_at', 'desc');
                        }
                    ])
                    ->first();

        if (!$cliente) {
            return redirect()->route('consulta-web-cliente.index')->with('error', 'Cliente no encontrado');
        }

        // Calcular el total del saldo adeudado
        $totalSaldoAdeudado = $cliente->ordens->sum('precio_saldo');

        return view('consultaWebCliente.result', compact('cliente', 'totalSaldoAdeudado'));
    }

    public function paymentsCreate(Cliente $cliente)
    {
        $cliente = $cliente->load([
                        'identity', 
                        'clientePayments', 
                        'ordens' => function($query) {
                            $query->with(['tipoTratamiento', 'tipoLente', 'ordenStatus', 'ordenPayments'])
                                  ->orderBy('created_at', 'desc');
                        }
                    ]);

        if (!$cliente) {
            return redirect()->route('consulta-web-cliente.index')->with('error', 'Cliente no encontrado');
        }

        // Calcular el total del saldo adeudado
        $totalSaldoAdeudado = $cliente->ordens->sum('precio_saldo');

        $data = Tasa::getLastTasa();
        $tasaCambio['price'] = 0;
        $tasaCambio['last_update'] = 'No hay tasa disponible';

        if($data){
            $tasaCambio['price'] = number_format($data->valor, 2, '.', '');
            $tasaCambio['last_update'] = $data->fecha;
        }

        return view('consultaWebCliente.create-payment', compact('cliente', 'totalSaldoAdeudado', 'tasaCambio'));
    }

    public function paymentsStore(Request $request, Cliente $cliente)
    {
        $this->validate($request, [
            'id' => 'required',
            'total_saldo_adeudado' => 'required',
            'saldo_bs' => 'required',
            'total' => 'required',
            'tasa_cambio' => 'required',
            'fecha' => 'required',
            'banco_emisor' => 'required',
            'referencia' => 'required',
            'monto' => 'required',
            'fecha_pago' => 'required',
            'monto_usd' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
        ]);

        $data = $request->all();
        $data['created_by'] = 'Web';
        $data['updated_by'] = 'Web';
        $data['status'] = 'PENDIENTE';
        $data['cliente_id'] = $cliente->id;
        $data['saldo'] = $request->total_saldo_adeudado;
        $data['saldo_bs'] = $request->saldo_bs;
        $data['total'] = $request->total;
        $data['tasa_cambio'] = $request->tasa_cambio;
        $data['fecha'] = $request->fecha;
        $data['banco_emisor'] = $request->banco_emisor;
        $data['referencia'] = $request->referencia;
        $data['monto'] = $request->monto;
        $data['fecha_pago'] = $request->fecha_pago;
        $data['monto_usd'] = $request->monto_usd;
        $data['file'] = $request->file;

        if ($request->hasFile('file')) {
            try {
                // Eliminar imagen anterior si existe
                if ($data['file'] && Storage::exists($data['file'])) {
                    Storage::delete($data['file']);
                }

                $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

                // Verificar y crear directorio si no existe
                $directorio = public_path() . '/storage/img/clientePayments/';
                if (!file_exists($directorio)) {
                    if (!mkdir($directorio, 0755, true) && !is_dir($directorio)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $directorio));
                    }
                }

                $ruta = $directorio . $nombre;

                // Procesar y guardar la imagen
                Image::read($request->file('file'))
                    ->scaleDown(height: 1000)
                    ->save($ruta);

                // Guardar nueva imagen
                $data['file'] = '/storage/img/clientePayments/'. $nombre;

            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Error al procesar la imagen: ' . $e->getMessage());
            }
        }

        $pago = ClientePayment::create($data);

        return redirect()->route('consulta-web-cliente.index', $cliente)->with('success', '¡Gracias! Su pago ha sido registrado correctamente, en un plazo de 48 horas se confirmara el estado del pago.');
    }
}
