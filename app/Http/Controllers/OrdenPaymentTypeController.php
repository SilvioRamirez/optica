<?php

namespace App\Http\Controllers;

use App\Models\OrdenPaymentType;
use App\Http\Requests\StoreOrdenPaymentTypeRequest;
use App\Http\Requests\UpdateOrdenPaymentTypeRequest;
use App\DataTables\OrdenPaymentTypesDataTable;

class OrdenPaymentTypeController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:orden-payment-type-list|orden-payment-type-create|orden-payment-type-edit|orden-payment-type-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:orden-payment-type-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orden-payment-type-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:orden-payment-type-delete', ['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrdenPaymentTypesDataTable $dataTable)
    {
        return $dataTable->render('ordenPaymentTypes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenPaymentTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenPaymentTypeRequest $request)
    {
        $ordenPaymentType = OrdenPaymentType::create($request->all());
        return redirect()->route('orden-payment-types.index')->with('success', 'Tipo de Pago de Orden creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenPaymentType $ordenPaymentType)
    {
        return view('ordenPaymentTypes.show', compact('ordenPaymentType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenPaymentType $ordenPaymentType)
    {
        return view('ordenPaymentTypes.edit', compact('ordenPaymentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenPaymentTypeRequest $request, OrdenPaymentType $ordenPaymentType)
    {
        $ordenPaymentType->update($request->all());
        return redirect()->route('orden-payment-types.index')->with('success', 'Tipo de Pago de Orden actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenPaymentType $ordenPaymentType)
    {
        if($ordenPaymentType->ordenPayments->count() > 0) {
            return redirect()->route('orden-payment-types.index')->with('error', 'Tipo de Pago de Orden no puede ser eliminado porque tiene pagos asociados');
        }
        $ordenPaymentType->delete();
        return redirect()->route('orden-payment-types.index')->with('success', 'Tipo de Pago de Orden eliminado correctamente');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(OrdenPaymentType $ordenPaymentType)
    {
        return view('ordenPaymentTypes.delete', compact('ordenPaymentType'));
    }
}
