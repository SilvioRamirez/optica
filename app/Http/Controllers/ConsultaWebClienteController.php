<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Identity;
use Illuminate\Http\Request;

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
                    ->with('identity', 'clientePayments', 'ordens')
                    ->first();

        if (!$cliente) {
            return redirect()->route('consulta-web-cliente.index')->with('error', 'Cliente no encontrado');
        }

        dd($cliente);

        return view('consultaWebCliente.index', compact('cliente'));
    }
}
