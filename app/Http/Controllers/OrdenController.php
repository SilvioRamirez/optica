<?php

namespace App\Http\Controllers;

use App\DataTables\OrdensDataTable;
use App\Models\Cliente;
use App\Models\Orden;
use App\Models\OrdenStatus;
use App\Models\TipoLente;
use App\Models\TipoTratamiento;
use App\Http\Requests\StoreOrdenRequest;
use App\Http\Requests\UpdateOrdenRequest;
use App\Models\OrdenPaymentType;
use App\Models\OrdenPaymentOrigin;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Configuracion;
class OrdenController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:orden-list|orden-create|orden-edit|orden-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:orden-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orden-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:orden-delete', ['only' => ['delete', 'destroy']]);
        $this->middleware('permission:orden-estatus', ['only' => ['estatusFormulario', 'cambiarEstatus']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrdensDataTable $dataTable)
    {
        $paymentTypes = OrdenPaymentType::orderBy('name', 'asc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $paymentOrigins = OrdenPaymentOrigin::orderBy('name', 'asc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $ordenStatuses = OrdenStatus::pluck('name', 'id')->prepend('-- Seleccione --', '');
        return $dataTable->render('ordens.index', compact('paymentTypes', 'paymentOrigins', 'ordenStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);
        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'desc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');
        $tipoFormulas = ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA'];
        $ordenStatuses = OrdenStatus::pluck('name', 'id')->prepend('-- Seleccione --', '');
        $orden = null;

        return view('ordens.create', compact('clientes', 'tipoLentes', 'tipoTratamientos', 'tipoFormulas', 'ordenStatuses', 'orden'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenRequest $request)
    {
        $data = $request->all();

        if (!$orden = Orden::create($data)) {
            return redirect()->back()
                ->with('danger', 'Error al crear la orden.');
        }

        $orden->calculoPagos();

        return redirect()->route('ordens.index')
            ->with('success', 'Orden creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        $clientes = Cliente::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);
        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'desc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');
        $tipoFormulas = ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA'];
        $ordenStatuses = OrdenStatus::pluck('name', 'id')->prepend('-- Seleccione --', '');

        return view('ordens.show', compact('orden', 'clientes', 'tipoLentes', 'tipoTratamientos', 'tipoFormulas', 'ordenStatuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        $clientes = Cliente::orderBy('name', 'desc')->pluck('name', 'id')->prepend('-- Seleccione --', '');
        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);
        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'desc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');
        $tipoFormulas = ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA'];
        $ordenStatuses = OrdenStatus::pluck('name', 'id')->prepend('-- Seleccione --', '');


        return view('ordens.edit', compact('orden', 'clientes', 'tipoLentes', 'tipoTratamientos', 'tipoFormulas', 'ordenStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenRequest $request, Orden $orden)
    {
        $data = $request->all();

        if (!$orden->update($data)) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar la orden.');
        }

        return redirect()->route('ordens.index')
            ->with('success', 'Orden actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        if (!$orden->delete()) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar la orden.');
        }

        return redirect()->route('ordens.index')
            ->with('success', 'Orden eliminada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Orden $orden)
    {
        return view('ordens.delete', compact('orden'));
    }

    /* Consulta de Pagos Orden */
    public function ordenPayments(Orden $orden)
    {
        return $orden = Orden::where('id', $orden->id)
            ->with('cliente')
            ->with('tipoTratamiento')
            ->with('tipoLente')
            ->with('ordenStatus')
            ->with('ordenPayments', function ($query) {
                $query->with('paymentOrigin')
                    ->with('paymentType');
            })
            ->get()
            ->first()
            ->toJson();
    }

    /* Actualizar Estatus de la Orden */
    public function updateStatus(Request $request)
    {
        $data = $request->all();
        $orden = Orden::find($data['orden_id']);
        $orden->orden_status_id = $data['orden_status_id'];
        $orden->fecha_entrega = $data['fecha_entrega'];
        $orden->save();

        return response()->json(['message' => 'Estatus actualizado correctamente', 'orden' => $orden]);
    }

    /* Generar PDF de la Orden */
    public function generatePdf(Orden $orden)
    {
        $orden->load(['cliente' => function($query){
            $query->with('identity');
        }]);
        $orden->load('tipoTratamiento');
        $orden->load('tipoLente');
        $orden->load('ordenStatus');
        $orden->load([ 'ordenPayments' => function ($query) {
            $query->with('paymentOrigin')
                ->with('paymentType');
        }]);

        $configuracion = Configuracion::find(1);

        $pdf = PDF::loadView('ordens.pdf', compact('orden','configuracion'))
                    ->setOption(['dpi' => 150, 'isRemoteEnabled' => true])
                    ->setPaper([0, 0, 164.409448819, 595.275590551]);

        return $pdf->download('Orden Nro. '.$orden->numero_orden.'.pdf');
    }
}
