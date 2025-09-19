<?php

namespace App\Http\Controllers;

use App\DataTables\LaboratoriosDataTable;
use App\Models\Laboratorio;
use App\Http\Requests\StoreLaboratorioRequest;
use App\Http\Requests\UpdateLaboratorioRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Configuracion;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LaboratoriosDataTable $dataTable)
    {
        return $dataTable->render('laboratorios.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('laboratorios.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        /* request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]); */
        $request->request->remove('personasTable_length');
        
        Laboratorio::create($request->all());
    
        return redirect()->route('laboratorios.index')
                        ->with('success','Laboratorio creado exitosamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratorio  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorio $laboratorio): View
    {
        // Total de Formularios Externos
        $totalFormulariosExternos = $laboratorio->formulariosExternos()->whereNull('deleted_at')->count();
        
        // Formularios por laboratorio con estado (enviados vs retornados)
        $formulariosEnviados = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_envio')
            ->count();
            
        $formulariosRetornados = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_retorno')
            ->count();
            
        $formulariosPendientes = $formulariosEnviados - $formulariosRetornados;
        
        // Formularios por tipo de origen (orden vs formulario) - asegurar que sumen al total
        $formulariosDeOrdenes = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('orden_id')
            ->whereNull('formulario_id') // Asegurar que es exclusivamente de órdenes
            ->count();
            
        $formulariosDeFormularios = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('formulario_id')
            ->whereNull('orden_id') // Asegurar que es exclusivamente de formularios
            ->count();
            
        // Verificar si hay registros con ambos IDs o ninguno
        $formulariosMixtos = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->where(function($query) {
                $query->where(function($q) {
                    // Tiene ambos IDs
                    $q->whereNotNull('orden_id')->whereNotNull('formulario_id');
                })->orWhere(function($q) {
                    // No tiene ningún ID
                    $q->whereNull('orden_id')->whereNull('formulario_id');
                });
            })
            ->count();
        
        // Estadísticas de órdenes externas (desde órdenes)
        $ordenesExternas = $laboratorio->formulariosExternos()
            ->whereNull('formulario_laboratorios.deleted_at')
            ->whereNotNull('orden_id')
            ->join('ordens', 'formulario_laboratorios.orden_id', '=', 'ordens.id')
            ->whereNull('ordens.deleted_at')
            ->join('tipo_tratamientos', 'ordens.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->join('tipo_lentes', 'ordens.tipo_lente_id', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_tratamientos.tipo_tratamiento, tipo_lentes.tipo_lente, COUNT(*) as total')
            ->groupBy('tipo_tratamientos.tipo_tratamiento', 'tipo_lentes.tipo_lente')
            ->get();
            
        // Estadísticas de formularios internos (desde formularios)
        $formulariosInternos = $laboratorio->formulariosExternos()
            ->whereNull('formulario_laboratorios.deleted_at')
            ->whereNotNull('formulario_id')
            ->join('formularios', 'formulario_laboratorios.formulario_id', '=', 'formularios.id')
            ->whereNull('formularios.deleted_at')
            ->join('tipo_tratamientos', 'formularios.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->join('tipo_lentes', 'formularios.tipo', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_tratamientos.tipo_tratamiento, tipo_lentes.tipo_lente, formularios.estatus, COUNT(*) as total')
            ->groupBy('tipo_tratamientos.tipo_tratamiento', 'tipo_lentes.tipo_lente', 'formularios.estatus')
            ->get();
        
        // Tiempo promedio de procesamiento (días entre envío y retorno)
        $tiempoPromedio = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_envio')
            ->whereNotNull('fecha_retorno')
            ->selectRaw('AVG(DATEDIFF(fecha_retorno, fecha_envio)) as promedio_dias')
            ->first();
            
        // Formularios por mes (últimos 6 meses)
        $formulariosPorMes = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_envio')
            ->where('fecha_envio', '>=', now()->subMonths(6))
            ->selectRaw('YEAR(fecha_envio) as año, MONTH(fecha_envio) as mes, COUNT(*) as total')
            ->groupBy('año', 'mes')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->get();
        
        return view('laboratorios.show', compact(
            'laboratorio',
            'totalFormulariosExternos',
            'formulariosEnviados',
            'formulariosRetornados',
            'formulariosPendientes',
            'formulariosDeOrdenes',
            'formulariosDeFormularios',
            'formulariosMixtos',
            'ordenesExternas',
            'formulariosInternos',
            'tiempoPromedio',
            'formulariosPorMes'
        ));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratorio  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorio $laboratorio): View
    {
        return view('laboratorios.edit',compact('laboratorio'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorio $laboratorio): RedirectResponse
    {
        /* request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]); */

        $request->request->remove('personasTable_length');

        $laboratorio->update($request->all());
    
        return redirect()->route('laboratorios.index')
                        ->with('success','Laboratorio actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id): View
    {
        $laboratorio = Laboratorio::find($id);
        return view('laboratorios.delete',compact('laboratorio'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorio $laboratorio): RedirectResponse
    {
        $laboratorio->delete();
    
        return redirect()->route('laboratorios.index')
                        ->with('success','Laboratorio eliminado exitosamente.');
    }

    public function generatePdf($id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        
        // Total de Formularios Externos
        $totalFormulariosExternos = $laboratorio->formulariosExternos()->whereNull('deleted_at')->count();
        
        // Formularios por laboratorio con estado (enviados vs retornados)
        $formulariosEnviados = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_envio')
            ->count();
            
        $formulariosRetornados = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_retorno')
            ->count();
            
        $formulariosPendientes = $formulariosEnviados - $formulariosRetornados;
        
        // Formularios por tipo de origen (orden vs formulario)
        $formulariosDeOrdenes = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('orden_id')
            ->whereNull('formulario_id')
            ->count();
            
        $formulariosDeFormularios = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('formulario_id')
            ->whereNull('orden_id')
            ->count();
        
        // Estadísticas de órdenes externas agrupadas por tipo
        $ordenesExternasPorTipo = $laboratorio->formulariosExternos()
            ->whereNull('formulario_laboratorios.deleted_at')
            ->whereNotNull('orden_id')
            ->join('ordens', 'formulario_laboratorios.orden_id', '=', 'ordens.id')
            ->whereNull('ordens.deleted_at')
            ->join('tipo_tratamientos', 'ordens.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->join('tipo_lentes', 'ordens.tipo_lente_id', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_tratamientos.tipo_tratamiento, tipo_lentes.tipo_lente, COUNT(*) as total')
            ->groupBy('tipo_tratamientos.tipo_tratamiento', 'tipo_lentes.tipo_lente')
            ->orderBy('tipo_tratamientos.tipo_tratamiento')
            ->orderBy('tipo_lentes.tipo_lente')
            ->get();
            
        // Estadísticas de formularios internos agrupadas por tipo y estatus
        $formulariosInternosPorTipo = $laboratorio->formulariosExternos()
            ->whereNull('formulario_laboratorios.deleted_at')
            ->whereNotNull('formulario_id')
            ->join('formularios', 'formulario_laboratorios.formulario_id', '=', 'formularios.id')
            ->whereNull('formularios.deleted_at')
            ->join('tipo_tratamientos', 'formularios.tipo_tratamiento_id', '=', 'tipo_tratamientos.id')
            ->join('tipo_lentes', 'formularios.tipo', '=', 'tipo_lentes.id')
            ->selectRaw('tipo_tratamientos.tipo_tratamiento, tipo_lentes.tipo_lente, formularios.estatus, COUNT(*) as total')
            ->groupBy('tipo_tratamientos.tipo_tratamiento', 'tipo_lentes.tipo_lente', 'formularios.estatus')
            ->orderBy('tipo_tratamientos.tipo_tratamiento')
            ->orderBy('tipo_lentes.tipo_lente')
            ->orderBy('formularios.estatus')
            ->get();
        
        // Formularios por mes (últimos 6 meses)
        $formulariosPorMes = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_envio')
            ->where('fecha_envio', '>=', now()->subMonths(6))
            ->selectRaw('YEAR(fecha_envio) as año, MONTH(fecha_envio) as mes, COUNT(*) as total')
            ->groupBy('año', 'mes')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->get();
        
        // Tiempo promedio de procesamiento
        $tiempoPromedio = $laboratorio->formulariosExternos()
            ->whereNull('deleted_at')
            ->whereNotNull('fecha_envio')
            ->whereNotNull('fecha_retorno')
            ->selectRaw('AVG(DATEDIFF(fecha_retorno, fecha_envio)) as promedio_dias')
            ->first();

        $configuracion = Configuracion::find(1);
        
        $pdf = PDF::loadView('laboratorios.pdf', compact(
            'laboratorio',
            'totalFormulariosExternos',
            'formulariosEnviados',
            'formulariosRetornados',
            'formulariosPendientes',
            'formulariosDeOrdenes',
            'formulariosDeFormularios',
            'ordenesExternasPorTipo',
            'formulariosInternosPorTipo',
            'formulariosPorMes',
            'tiempoPromedio',
            'configuracion'
        ));
        
        return $pdf->download('laboratorio_' . $laboratorio->id . '.pdf');
    }
}
