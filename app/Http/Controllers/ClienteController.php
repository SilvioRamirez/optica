<?php

namespace App\Http\Controllers;

use App\DataTables\ClientesDataTable;
use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Identity;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Configuracion;
use Illuminate\Contracts\View\View;

class ClienteController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:cliente-list|cliente-create|cliente-edit|cliente-delete', ['only' => ['index','show']]);
        $this->middleware('permission:cliente-create', ['only' => ['create','store']]);
        $this->middleware('permission:cliente-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ClientesDataTable $dataTable)
    {
        return $dataTable->render('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identities = Identity::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');

        return view('clientes.create', compact('identities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $data = $request->all();

        $cliente = Cliente::create($data);

        return redirect()->route('clientes.index', $cliente->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $identities = Identity::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');

        // Estadísticas de pagos del cliente
        $totalClientePayments = $cliente->clientePayments()->count();
        $sumaClientePayments = $cliente->clientePayments()->sum('monto_usd');
        $saldoCliente = $cliente->clientePayments()->sum('saldo');

        // Estadísticas de órdenes del cliente
        $totalOrdenes = $cliente->ordens()->count();
        $sumaMontoOrdenes = $cliente->ordens()->sum('precio_total');
        $sumaSaldoOrdenes = $cliente->ordens()->sum('precio_saldo');
        $sumaPagosOrdenes = $cliente->ordens()->sum('precio_total') - $cliente->ordens()->sum('precio_saldo');

        // Órdenes por estatus
        $ordenesPorEstatus = $cliente->ordens()
            ->join('orden_statuses', 'ordens.orden_status_id', '=', 'orden_statuses.id')
            ->selectRaw('orden_statuses.name as estatus_nombre, COUNT(*) as total, SUM(ordens.precio_total) as monto_total')
            ->groupBy('orden_statuses.id', 'orden_statuses.name')
            ->get();

        // Órdenes por tipo de lente
        $ordenesPorTipoLente = $cliente->ordens()
            ->join('tipo_lentes', 'ordens.tipo_lente_id', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_lentes.tipo_lente, COUNT(*) as total, SUM(ordens.precio_total) as monto_total')
            ->groupBy('tipo_lentes.id', 'tipo_lentes.tipo_lente')
            ->get();

        // Órdenes por tipo de tratamiento
        $ordenesPorTipoTratamiento = $cliente->ordens()
            ->join('tipo_tratamientos', 'ordens.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->selectRaw('tipo_tratamientos.tipo_tratamiento, COUNT(*) as total, SUM(ordens.precio_total) as monto_total')
            ->groupBy('tipo_tratamientos.id', 'tipo_tratamientos.tipo_tratamiento')
            ->get();

        // Pagos de órdenes por tipo
        $pagosPorTipo = $cliente->ordens()
            ->join('orden_payments', 'ordens.id', '=', 'orden_payments.orden_id')
            ->join('orden_payment_types', 'orden_payments.orden_payment_type_id', '=', 'orden_payment_types.id')
            ->selectRaw('orden_payment_types.name as tipo_nombre, COUNT(*) as total_pagos, SUM(orden_payments.monto) as monto_total')
            ->groupBy('orden_payment_types.id', 'orden_payment_types.name')
            ->get();

        // Estado de pagos de ClientePayment por status
        $clientePaymentsPorStatus = $cliente->clientePayments()
            ->selectRaw('status, COUNT(*) as total, SUM(monto_usd) as monto_total')
            ->groupBy('status')
            ->get();

        return view('clientes.show', compact(
            'cliente', 
            'identities',
            'totalClientePayments',
            'sumaClientePayments',
            'saldoCliente',
            'totalOrdenes',
            'sumaMontoOrdenes',
            'sumaSaldoOrdenes',
            'sumaPagosOrdenes',
            'ordenesPorEstatus',
            'ordenesPorTipoLente',
            'ordenesPorTipoTratamiento',
            'pagosPorTipo',
            'clientePaymentsPorStatus'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $identities = Identity::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');

        return view('clientes.edit', compact('cliente', 'identities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $data = $request->all();

        if(!$cliente->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }
        
        return redirect()->route('clientes.index', $cliente->id)
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete(Cliente $cliente): View
    {
        return view('clientes.delete',compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        if($cliente->ordens->count() > 0){
            return redirect()->back()
                            ->with('danger','Registro no eliminado, tiene ordenes asociadas.');
        }

        if(!$cliente->delete()){
            return redirect()->back()
                            ->with('danger','Registro no eliminado.');
        }

        return redirect()->route('clientes.index')
                            ->with('success','Registro eliminado exitosamente.');
    }

    /**
     * Generar PDF del cliente con sus estadísticas
     */
    public function generatePdf(Cliente $cliente)
    {
        // Estadísticas de pagos del cliente
        $totalClientePayments = $cliente->clientePayments()->count();
        $sumaClientePayments = $cliente->clientePayments()->sum('monto_usd');
        $saldoCliente = $cliente->clientePayments()->sum('saldo');

        // Estadísticas de órdenes del cliente
        $totalOrdenes = $cliente->ordens()->count();
        $sumaMontoOrdenes = $cliente->ordens()->sum('precio_total');
        $sumaSaldoOrdenes = $cliente->ordens()->sum('precio_saldo');
        $sumaPagosOrdenes = $cliente->ordens()->sum('precio_total') - $cliente->ordens()->sum('precio_saldo');

        // Órdenes por estatus
        $ordenesPorEstatus = $cliente->ordens()
            ->join('orden_statuses', 'ordens.orden_status_id', '=', 'orden_statuses.id')
            ->selectRaw('orden_statuses.name as estatus_nombre, COUNT(*) as total, SUM(ordens.precio_total) as monto_total')
            ->groupBy('orden_statuses.id', 'orden_statuses.name')
            ->get();

        // Órdenes por tipo de lente
        $ordenesPorTipoLente = $cliente->ordens()
            ->join('tipo_lentes', 'ordens.tipo_lente_id', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_lentes.tipo_lente, COUNT(*) as total, SUM(ordens.precio_total) as monto_total')
            ->groupBy('tipo_lentes.id', 'tipo_lentes.tipo_lente')
            ->get();

        // Órdenes por tipo de tratamiento
        $ordenesPorTipoTratamiento = $cliente->ordens()
            ->join('tipo_tratamientos', 'ordens.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->selectRaw('tipo_tratamientos.tipo_tratamiento, COUNT(*) as total, SUM(ordens.precio_total) as monto_total')
            ->groupBy('tipo_tratamientos.id', 'tipo_tratamientos.tipo_tratamiento')
            ->get();

        // Pagos de órdenes por tipo
        $pagosPorTipo = $cliente->ordens()
            ->join('orden_payments', 'ordens.id', '=', 'orden_payments.orden_id')
            ->join('orden_payment_types', 'orden_payments.orden_payment_type_id', '=', 'orden_payment_types.id')
            ->selectRaw('orden_payment_types.name as tipo_nombre, COUNT(*) as total_pagos, SUM(orden_payments.monto) as monto_total')
            ->groupBy('orden_payment_types.id', 'orden_payment_types.name')
            ->get();

        // Estado de pagos de ClientePayment por status
        $clientePaymentsPorStatus = $cliente->clientePayments()
            ->selectRaw('status, COUNT(*) as total, SUM(monto_usd) as monto_total')
            ->groupBy('status')
            ->get();

        // Cargar relaciones del cliente
        $cliente->load('identity');

        $configuracion = Configuracion::find(1);

        $pdf = PDF::loadView('clientes.pdf', compact(
            'cliente',
            'totalClientePayments',
            'sumaClientePayments',
            'saldoCliente',
            'totalOrdenes',
            'sumaMontoOrdenes',
            'sumaSaldoOrdenes',
            'sumaPagosOrdenes',
            'ordenesPorEstatus',
            'ordenesPorTipoLente',
            'ordenesPorTipoTratamiento',
            'pagosPorTipo',
            'clientePaymentsPorStatus',
            'configuracion'
        ));

        return $pdf->download('cliente_' . $cliente->document_number . '.pdf');
    }
}
