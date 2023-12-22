<?php

namespace App\Http\Controllers;

use App\DataTables\ConfiguracionsDataTable;
use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreConfiguracionRequest;
use App\Http\Requests\UpdateConfiguracionRequest;

class ConfiguracionController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:configuraicon-list|configuraicon-create|configuraicon-edit|configuraicon-delete', ['only' => ['index','show']]);
        $this->middleware('permission:configuraicon-create', ['only' => ['create','store']]);
        $this->middleware('permission:configuraicon-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:configuraicon-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ConfiguracionsDataTable $dataTable)
    {
        return $dataTable->render('configuracions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Configuracion $configuracion): View
    {
        return view('configuracions.show',compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Configuracion $configuracion)
    {
        return view('configuracions.edit',compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuracion $configuracion): RedirectResponse
    {
        request()->validate(Configuracion::$rules);
        $data = $request->all();
        $configuracion->update($data);
        return redirect()->route('configuracions.index')
                            ->with('success','Configuracion actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }
}
