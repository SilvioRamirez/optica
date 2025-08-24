<?php

namespace App\Http\Controllers;

use App\Models\OrdenPayment;
use App\Http\Requests\StoreOrdenPaymentRequest;
use App\Http\Requests\UpdateOrdenPaymentRequest;

class OrdenPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenPaymentRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->name;
        $data['updated_by'] = auth()->user()->name;
        $ordenPayment = OrdenPayment::create($data);

        $ordenPayment->orden->calculoPagos();

        return response()->json(['message' => 'Pago registrado correctamente', 'orden_id' => $ordenPayment->orden_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenPayment $ordenPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenPayment $ordenPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenPaymentRequest $request, OrdenPayment $ordenPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenPayment $ordenPayment)
    {
        //
    }
}
