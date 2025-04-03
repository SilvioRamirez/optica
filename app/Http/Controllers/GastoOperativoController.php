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
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:pago-list|pago-create|pago-edit|pago-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pago-create', ['only' => ['create','store']]);
        $this->middleware('permission:pago-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:pago-delete', ['only' => ['destroy']]);
    }

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
    public function create(StoreGastoOperativoRequest $request)
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGastoOperativoRequest $request)
    {

        $operativo_id = $request->gasto_operativo_id; // Asigna el valor a una variable
        $data = $request->except('gasto_operativo_id'); // Excluye el campo saldo_formulario_id
        $data['operativo_id'] = $operativo_id;

        $gastoOperativo = GastoOperativo::create($data);

        return response()->json(['message' => 'Gasto Operativo registrado correctamente', 'operativo_id' => $gastoOperativo->operativo_id]);
    }

    public function consultaGastos($id)
    {
        $gastos = GastoOperativo::with('tipoGastos')->where('operativo_id', $id)->get();

        return response()->json($gastos->map(function($gasto) {
            return [
                'id' => $gasto->id,
                'operativo_id' => $gasto->operativo_id,
                'monto' => $gasto->monto,
                'tipo' => $gasto->tipoGastos ? $gasto->tipoGastos->tipo : 'N/A',
                'created_at' => $gasto->created_at,
                'updated_at' => $gasto->updated_at
            ];
        }));
    
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
