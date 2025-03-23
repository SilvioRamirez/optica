<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\DataTables\PagosDataTable;
use App\Models\Formulario;

class PagoController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PagosDataTable $dataTable)
    {
        return $dataTable->render('pagos.index');
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
    public function store(StorePagoRequest $request)
    {

        $formulario_id = $request->saldo_formulario_id; // Asigna el valor a una variable
        $data = $request->except('saldo_formulario_id'); // Excluye el campo saldo_formulario_id
        $data['formulario_id'] = $formulario_id;

        $pago = Pago::create($data);

        return response()->json(['message' => 'Pago registrado correctamente', 'formulario_id' => $formulario_id]);
    }

    public function consultaPagos($id)
    {
        $pagos = Pago::where('formulario_id', $id)->get();

        return response()->json($pagos);
    
    }

    public function calculoPagos($id)
    {
        $pagos = Pago::where('formulario_id', $id)->get();

        $formulario = Formulario::where('id', $id)->first();

        $totalPagos = $pagos->sum('monto');

        $totalFormulario = $formulario->total;

        $saldo = $totalFormulario - $totalPagos;

        $porcentaje = round(($totalPagos / $totalFormulario) * 100);

        // Actualizar los campos en el modelo Formulario
        $formulario->saldo = $saldo;
        $formulario->porcentaje_pago = $porcentaje;
        $formulario->save();

        return response()->json([
            'porcentaje' => $porcentaje,
            'saldo' => $saldo
        ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        try {
            $pago->delete();

            $pagos = Pago::where('formulario_id', $pago->formulario_id)->get();

            $formulario = Formulario::where('id', $pago->formulario_id)->first();

            $totalPagos = $pagos->sum('monto');

            $totalFormulario = $formulario->total;

            $saldo = $totalFormulario - $totalPagos;

            $porcentaje = round(($totalPagos / $totalFormulario) * 100);

            // Actualizar los campos en el modelo Formulario
            $formulario->saldo = $saldo;
            $formulario->porcentaje_pago = $porcentaje;
            $formulario->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Pago eliminado exitosamente.',
                'data' => [
                    'id' => $pago->id,
                    'monto' => $pago->monto,
                    'tipo' => $pago->tipo,
                    'referencia' => $pago->referencia,
                    'image_path' => $pago->image_path,
                    'created_at' => $pago->created_at,
                    'updated_at' => $pago->updated_at
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el pago.',
                'details' => $e->getMessage(),
                'code' => 'ERROR'
            ], 500);
        }
    }
    
}
