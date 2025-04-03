<?php

namespace App\Http\Controllers;

use App\DataTables\OperativosDataTable;
use App\Models\Operativo;
use App\Http\Requests\StoreOperativoRequest;
use App\Http\Requests\UpdateOperativoRequest;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TipoGasto;
use App\Models\GastoOperativo;
use App\Models\Persona;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Configuracion;

class OperativoController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:operativo-list|operativo-create|operativo-edit|operativo-delete', ['only' => ['index','show']]);
        $this->middleware('permission:operativo-create', ['only' => ['create','store']]);
        $this->middleware('permission:operativo-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:operativo-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OperativosDataTable $dataTable)
    {
        $tiposGastos = TipoGasto::orderBy('tipo_gasto','asc')->pluck('tipo_gasto', 'id')->prepend('-- Seleccione --', '');
        $colaboradores = Persona::orderBy('created_at','desc')
            ->selectRaw("CONCAT(nombres, ' ', apellidos) as nombre_completo, id")
            ->pluck('nombre_completo', 'id')
            ->prepend('-- Seleccione --', '');
        return $dataTable->render('operativos.index', compact('tiposGastos', 'colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Estado::get(['id_estado', 'estado']);

        return view('operativos.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperativoRequest $request): RedirectResponse
    {
        $data = $request->all();

        $operativo = Operativo::create($data);

        return redirect()->route('operativos.index', $operativo->id)
                            ->with('success','Registro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Operativo $operativo): View
    {
        // Total de Refractados
        $totalRefractados = $operativo->refractantes()->whereNull('deleted_at')->count();
        
        // Total de Formularios
        $totalFormularios = $operativo->formularios()->whereNull('deleted_at')->count();
        
        // Total de Formularios por tipo_tratamiento_id con el nombre del tratamiento y tipo de fórmula
        $formulariosPorTipo = $operativo->formularios()
            ->whereNull('deleted_at')
            ->selectRaw('tipo_tratamiento_id, tipo_formula, COUNT(*) as total')
            ->groupBy('tipo_tratamiento_id', 'tipo_formula')
            ->with('tipoTratamiento:id,tipo_tratamiento')
            ->get();
        
        // Total de Formularios por tipo de fórmula
        $formulariosPorFormula = $operativo->formularios()
            ->whereNull('deleted_at')
            ->selectRaw('tipo_formula, COUNT(*) as total')
            ->groupBy('tipo_formula')
            ->get();
        
        // Formularios por tipo de tratamiento, fórmula y especialista
        $formulariosPorTipoYEspecialista = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('especialistas', 'formularios.especialista', '=', 'especialistas.id')
            ->whereNull('especialistas.deleted_at')
            ->join('tipo_tratamientos', 'formularios.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->join('tipo_lentes', 'tipo_tratamientos.tipo_lente_id', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_tratamiento_id, tipo_formula, especialistas.nombre as especialista_nombre, tipo_tratamientos.tipo_lente_id, tipo_lentes.tipo_lente, tipo_lentes.precio as precio_lente, COUNT(*) as total, SUM(tipo_lentes.precio) as precio_total')
            ->groupBy('tipo_tratamiento_id', 'tipo_formula', 'especialistas.nombre', 'tipo_tratamientos.tipo_lente_id', 'tipo_lentes.tipo_lente', 'tipo_lentes.precio')
            ->with(['tipoTratamiento:id,tipo_tratamiento'])
            ->get();
        
        // Total de Pagos relacionados a los formularios del operativo
        $totalPagos = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('pagos', 'formularios.id', '=', 'pagos.formulario_id')
            ->whereNull('pagos.deleted_at')
            ->count();
            
        // Suma total de los montos de los pagos
        $sumaPagos = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('pagos', 'formularios.id', '=', 'pagos.formulario_id')
            ->whereNull('pagos.deleted_at')
            ->sum('pagos.monto');
            
        // Suma total de los montos de los formularios
        $sumaTotalFormularios = $operativo->formularios()
            ->whereNull('deleted_at')
            ->sum('total');
            
        // Suma total de los saldos de los formularios
        $sumaSaldoFormularios = $operativo->formularios()
            ->whereNull('deleted_at')
            ->sum('saldo');

        // Total de Gastos
        $totalGastos = $operativo->gastos()
            ->whereNull('gasto_operativos.deleted_at')
            ->count();
            
        // Suma total de los gastos
        $sumaTotalGastos = $operativo->gastos()
            ->whereNull('gasto_operativos.deleted_at')
            ->sum('monto');

        // Total de Asesores
        $totalAsesores = $operativo->asesores()
            ->whereNull('personas.deleted_at')
            ->count();

        // Pagos por tipo
        $pagosPorTipo = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('pagos', 'formularios.id', '=', 'pagos.formulario_id')
            ->whereNull('pagos.deleted_at')
            ->join('tipos', 'pagos.tipo_id', '=', 'tipos.id')
            ->selectRaw('pagos.tipo_id, tipos.tipo as tipo_nombre, COUNT(*) as total_pagos, SUM(pagos.monto) as monto_total')
            ->groupBy('pagos.tipo_id', 'tipos.tipo')
            ->get();
        
        // Gastos por tipo
        $gastosPorTipo = $operativo->gastos()
            ->whereNull('gasto_operativos.deleted_at')
            ->join('tipo_gastos', 'gasto_operativos.tipo_gasto_id', '=', 'tipo_gastos.id')
            ->selectRaw('gasto_operativos.tipo_gasto_id, tipo_gastos.tipo_gasto as tipo_nombre, COUNT(*) as total_gastos, SUM(gasto_operativos.monto) as monto_total')
            ->groupBy('gasto_operativos.tipo_gasto_id', 'tipo_gastos.tipo_gasto')
            ->get();
        
        // Formularios con estatus
        $formulariosConEstatus = $operativo->formularios()
            ->whereNull('deleted_at')
            ->selectRaw('estatus, COUNT(*) as total')
            ->groupBy('estatus')
            ->get();
        
        // Cargar los asesores del operativo
        $operativo->load('asesores');
        
        return view('operativos.show', compact(
            'operativo',
            'totalRefractados',
            'totalFormularios',
            'formulariosPorTipo',
            'formulariosPorFormula',
            'formulariosPorTipoYEspecialista',
            'totalPagos',
            'sumaPagos',
            'sumaTotalFormularios',
            'sumaSaldoFormularios',
            'pagosPorTipo',
            'gastosPorTipo',
            'totalGastos',
            'sumaTotalGastos',
            'formulariosConEstatus',
            'totalAsesores'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operativo $operativo): View
    {
        $estados = Estado::get(['id_estado', 'estado']);
        $municipios = Municipio::get(['id_municipio', 'municipio']);
        $parroquias = Parroquia::get(['id_parroquia', 'parroquia']);

        return view('operativos.edit',compact('operativo', 'estados', 'municipios', 'parroquias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperativoRequest $request, Operativo $operativo)
    {
        $data = $request->all();

        if(!$operativo->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('operativos.index')
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\View
     */
    public function delete($id): View
    {
        $operativo = Operativo::find($id);
        return view('operativos.delete',compact('operativo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operativo $operativo): RedirectResponse
    {
        $operativo->delete();
        return redirect()->route('operativos.index')
                            ->with('success','Registro eliminado exitosamente.');
    }

    public function updateCoordenadas(Request $request)
    {
        $request->validate([
            'operativo_id' => 'required|exists:operativos,id',
            'latitud' => 'required|numeric|between:-90,90',
            'longitud' => 'required|numeric|between:-180,180'
        ]);

        $operativo = Operativo::findOrFail($request->operativo_id);
        $operativo->update([
            'latitud' => $request->latitud,
            'longitud' => $request->longitud
        ]);

        return redirect()->back()->with('success', 'Coordenadas actualizadas exitosamente');
    }

    public function consultaGastosOperativo($id)
    {
        $gastos = GastoOperativo::with('tipoGastos')->where('operativo_id', $id)->get();

        return response()->json($gastos->map(function($gasto) {
            return [
                'id' => $gasto->id,
                'operativo_id' => $gasto->operativo_id,
                'monto' => $gasto->monto,
                'tipo_gasto' => $gasto->tipoGastos ? $gasto->tipoGastos->tipo_gasto : 'N/A',
                'created_at' => $gasto->created_at,
                'updated_at' => $gasto->updated_at
            ];
        }));
    
    }

    public function consultaColaboradoresOperativo($id)
    {
        $colaboradoresOperativo =  Operativo::with('asesores')->find($id);
        return response()->json($colaboradoresOperativo);
    }

    public function colaboradoresStore(Request $request)
    {
        $operativo_id = $request->colaborador_operativo_id; // Asigna el valor a una variable
        $data = $request->except('colaborador_operativo_id'); // Excluye el campo saldo_formulario_id
        $data['operativo_id'] = $operativo_id;

        $request->validate([
            /* 'operativo_id' => 'required|exists:operativos,id', */
            'colaborador' => 'required|exists:personas,id'
        ]);

        $operativo = Operativo::find($operativo_id);
        $operativo->asesores()->attach($request->colaborador, ['rol' => 'ASESOR']);

        return response()->json($operativo);

    }

    public function generatePdf($id)
    {
        $operativo = Operativo::findOrFail($id);
        
        // Total de Refractados
        $totalRefractados = $operativo->refractantes()->whereNull('deleted_at')->count();
        
        // Total de Formularios
        $totalFormularios = $operativo->formularios()->whereNull('deleted_at')->count();
        
        // Total de Formularios por tipo_tratamiento_id con el nombre del tratamiento y tipo de fórmula
        $formulariosPorTipo = $operativo->formularios()
            ->whereNull('deleted_at')
            ->selectRaw('tipo_tratamiento_id, tipo_formula, COUNT(*) as total')
            ->groupBy('tipo_tratamiento_id', 'tipo_formula')
            ->with('tipoTratamiento:id,tipo_tratamiento')
            ->get();
        
        // Total de Formularios por tipo de fórmula
        $formulariosPorFormula = $operativo->formularios()
            ->whereNull('deleted_at')
            ->selectRaw('tipo_formula, COUNT(*) as total')
            ->groupBy('tipo_formula')
            ->get();
        
        // Formularios por tipo de tratamiento, fórmula y especialista
        $formulariosPorTipoYEspecialista = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('especialistas', 'formularios.especialista', '=', 'especialistas.id')
            ->whereNull('especialistas.deleted_at')
            ->join('tipo_tratamientos', 'formularios.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->join('tipo_lentes', 'tipo_tratamientos.tipo_lente_id', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_tratamiento_id, tipo_formula, especialistas.nombre as especialista_nombre, tipo_tratamientos.tipo_lente_id, tipo_lentes.tipo_lente, tipo_lentes.precio as precio_lente, COUNT(*) as total, SUM(tipo_lentes.precio) as precio_total')
            ->groupBy('tipo_tratamiento_id', 'tipo_formula', 'especialistas.nombre', 'tipo_tratamientos.tipo_lente_id', 'tipo_lentes.tipo_lente', 'tipo_lentes.precio')
            ->with(['tipoTratamiento:id,tipo_tratamiento'])
            ->get();
        
        // Total de Pagos relacionados a los formularios del operativo
        $totalPagos = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('pagos', 'formularios.id', '=', 'pagos.formulario_id')
            ->whereNull('pagos.deleted_at')
            ->count();
            
        // Suma total de los montos de los pagos
        $sumaPagos = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('pagos', 'formularios.id', '=', 'pagos.formulario_id')
            ->whereNull('pagos.deleted_at')
            ->sum('pagos.monto');
            
        // Suma total de los montos de los formularios
        $sumaTotalFormularios = $operativo->formularios()
            ->whereNull('deleted_at')
            ->sum('total');
            
        // Suma total de los saldos de los formularios
        $sumaSaldoFormularios = $operativo->formularios()
            ->whereNull('deleted_at')
            ->sum('saldo');

        // Total de Gastos
        $totalGastos = $operativo->gastos()
            ->whereNull('gasto_operativos.deleted_at')
            ->count();
            
        // Suma total de los gastos
        $sumaTotalGastos = $operativo->gastos()
            ->whereNull('gasto_operativos.deleted_at')
            ->sum('monto');

        // Total de Asesores
        $totalAsesores = $operativo->asesores()
            ->whereNull('personas.deleted_at')
            ->count();

        // Pagos por tipo
        $pagosPorTipo = $operativo->formularios()
            ->whereNull('formularios.deleted_at')
            ->join('pagos', 'formularios.id', '=', 'pagos.formulario_id')
            ->whereNull('pagos.deleted_at')
            ->join('tipos', 'pagos.tipo_id', '=', 'tipos.id')
            ->selectRaw('pagos.tipo_id, tipos.tipo as tipo_nombre, COUNT(*) as total_pagos, SUM(pagos.monto) as monto_total')
            ->groupBy('pagos.tipo_id', 'tipos.tipo')
            ->get();
        
        // Gastos por tipo
        $gastosPorTipo = $operativo->gastos()
            ->whereNull('gasto_operativos.deleted_at')
            ->join('tipo_gastos', 'gasto_operativos.tipo_gasto_id', '=', 'tipo_gastos.id')
            ->selectRaw('gasto_operativos.tipo_gasto_id, tipo_gastos.tipo_gasto as tipo_nombre, COUNT(*) as total_gastos, SUM(gasto_operativos.monto) as monto_total')
            ->groupBy('gasto_operativos.tipo_gasto_id', 'tipo_gastos.tipo_gasto')
            ->get();
        
        // Formularios con estatus
        $formulariosConEstatus = $operativo->formularios()
            ->whereNull('deleted_at')
            ->selectRaw('estatus, COUNT(*) as total')
            ->groupBy('estatus')
            ->get();
        
        // Cargar los asesores del operativo
        $operativo->load('asesores');

        $configuracion = Configuracion::find(1);
        
        $pdf = PDF::loadView('operativos.pdf', compact(
            'operativo',
            'totalRefractados',
            'totalFormularios',
            'formulariosPorTipo',
            'formulariosPorFormula',
            'formulariosPorTipoYEspecialista',
            'totalPagos',
            'sumaPagos',
            'sumaTotalFormularios',
            'sumaSaldoFormularios',
            'pagosPorTipo',
            'gastosPorTipo',
            'totalGastos',
            'sumaTotalGastos',
            'formulariosConEstatus',
            'totalAsesores',
            'configuracion'
        ));
        
        return $pdf->download('operativo_' . $operativo->id . '.pdf');
    }
}
