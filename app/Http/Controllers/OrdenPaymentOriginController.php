<?php

namespace App\Http\Controllers;

use App\Models\OrdenPaymentOrigin;
use App\Http\Requests\StoreOrdenPaymentOriginRequest;
use App\Http\Requests\UpdateOrdenPaymentOriginRequest;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\OrdenPaymentOriginsDataTable;

class OrdenPaymentOriginController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:orden-payment-origin-list|orden-payment-origin-create|orden-payment-origin-edit|orden-payment-origin-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:orden-payment-origin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orden-payment-origin-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:orden-payment-origin-delete', ['only' => ['delete', 'destroy']]);
        $this->middleware('permission:orden-payment-origin-estatus', ['only' => ['estatusFormulario', 'cambiarEstatus']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrdenPaymentOriginsDataTable $dataTable)
    {
        return $dataTable->render('ordenPaymentOrigins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenPaymentOrigins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenPaymentOriginRequest $request)
    {
        $ordenPaymentOrigin = OrdenPaymentOrigin::create($request->all());
        return redirect()->route('orden-payment-origins.index')->with('success', 'Origen de Pago creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenPaymentOrigin $ordenPaymentOrigin)
    {
        return view('ordenPaymentOrigins.show', compact('ordenPaymentOrigin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenPaymentOrigin $ordenPaymentOrigin)
    {
        return view('ordenPaymentOrigins.edit', compact('ordenPaymentOrigin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenPaymentOriginRequest $request, OrdenPaymentOrigin $ordenPaymentOrigin)
    {
        $ordenPaymentOrigin->update($request->all());
        return redirect()->route('orden-payment-origins.index')->with('success', 'Origen de Pago actualizado correctamente');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(OrdenPaymentOrigin $ordenPaymentOrigin)
    {
        return view('ordenPaymentOrigins.delete', compact('ordenPaymentOrigin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenPaymentOrigin $ordenPaymentOrigin)
    {
        if($ordenPaymentOrigin->ordenPayments->count() > 0) {
            return redirect()->route('orden-payment-origins.index')->with('error', 'Origen de Pago no puede ser eliminado porque tiene pagos asociados');
        }
        $ordenPaymentOrigin->delete();
        return redirect()->route('orden-payment-origins.index')->with('success', 'Origen de Pago eliminado correctamente');
    }
}
