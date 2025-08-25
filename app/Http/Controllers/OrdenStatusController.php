<?php

namespace App\Http\Controllers;

use App\Models\OrdenStatus;
use App\Http\Requests\StoreOrdenStatusRequest;
use App\Http\Requests\UpdateOrdenStatusRequest;
use App\DataTables\OrdenStatusesDataTable;

class OrdenStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrdenStatusesDataTable $dataTable)
    {
        return $dataTable->render('ordenStatuses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenStatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenStatusRequest $request)
    {
        $ordenStatus = OrdenStatus::create($request->all());
        return redirect()->route('orden-statuses.index')->with('success', 'Estatus de Orden creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenStatus $ordenStatus)
    {
        return view('ordenStatuses.show', compact('ordenStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenStatus $ordenStatus)
    {
        return view('ordenStatuses.edit', compact('ordenStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenStatusRequest $request, OrdenStatus $ordenStatus)
    {
        $ordenStatus->update($request->all());
        return redirect()->route('orden-statuses.index')->with('success', 'Estatus de Orden actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenStatus $ordenStatus)
    {
        if($ordenStatus->ordens->count() > 0) {
            return redirect()->route('orden-statuses.index')->with('error', 'Estatus de Orden no puede ser eliminado porque tiene ordenes asociadas');
        }
        $ordenStatus->delete();
        return redirect()->route('orden-statuses.index')->with('success', 'Estatus de Orden eliminado correctamente');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete(OrdenStatus $ordenStatus)
    {
        return view('ordenStatuses.delete', compact('ordenStatus'));
    }
}
