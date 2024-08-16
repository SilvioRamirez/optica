<?php

namespace App\Http\Controllers;

use App\Models\GastoOperativo;
use App\Http\Requests\StoreGastoOperativoRequest;
use App\Http\Requests\UpdateGastoOperativoRequest;
use App\Models\Operativo;
use App\Models\TipoGasto;
use Illuminate\View\View;

class GastoOperativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Operativo $operativo): View
    {
        $operativo->gastos;
        $gastos = $operativo->gastoOperativos;

        /* $security = TipoGasto::with('GastoOperativo.Operativo')->first(); */

        dd($gastos);

        return view('gastoOperativos.index', compact('operativo'));
    }




    

    public function dashboard(Operativo $paciente): View
    {
        $municipio = null;

        $paciente = Operativo::where('id', $paciente->id)
            ->with(['direccion' => function($query){
                $query->with('estado');
                $query->with('municipio');
                $query->with('parroquia');
                
            }])->with('lentes')
            ->first();

        if($paciente->direccion){
            $municipio = Operativo::where('id_municipio', $paciente->direccion->municipio_id)->firstOrFail();
        }

        return view('pacientes.dashboard', compact('paciente', 'municipio'));
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
    public function store(StoreGastoOperativoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GastoOperativo $gastoOperativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GastoOperativo $gastoOperativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGastoOperativoRequest $request, GastoOperativo $gastoOperativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GastoOperativo $gastoOperativo)
    {
        //
    }
}
