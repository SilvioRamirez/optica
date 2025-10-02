<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioLaboratorio;
use App\Models\Formulario;
use App\Models\Laboratorio;
use App\Models\Orden;
use App\DataTables\FormularioLaboratoriosDataTable;
use Illuminate\Support\Facades\Log;
class FormularioLaboratorioController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:formulario-list|formulario-create|formulario-edit|formulario-delete', ['only' => ['index', 'show', 'store', 'update', 'ultimo']]);
        $this->middleware('permission:orden-list|orden-create|orden-edit|orden-delete', ['only' => ['storeOrden', 'updateOrden', 'ultimoOrden']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FormularioLaboratoriosDataTable $dataTable)
    {
        return $dataTable->render('formularioLaboratorios.index');
    }

    public function store(Request $request, $formularioId)
    {
        try {
            // Buscar el formulario explícitamente (incluyendo eliminados)
            $formulario = Formulario::withTrashed()->findOrFail($formularioId);
            
            $validated = $request->validate([
                'laboratorio_id' => 'required|exists:laboratorios,id',
                'fecha_envio' => 'required|date',
                'fecha_retorno' => 'nullable|date|after_or_equal:fecha_envio',
                'observacion' => 'nullable|string|max:500',
            ]);

            $envio = $formulario->laboratoriosExternos()->create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Formulario enviado al laboratorio correctamente',
                'envio' => $envio->load('laboratorio')
            ]);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Formulario no encontrado'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error al crear envío de laboratorio: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor'
            ], 500);
        }
    }

    public function update(Request $request, $formularioId, $envioId)
    {
        try {
            // Buscar el formulario explícitamente (incluyendo eliminados)
            $formulario = Formulario::withTrashed()->findOrFail($formularioId);
            
            $validated = $request->validate([
                'laboratorio_id' => 'required|exists:laboratorios,id',
                'fecha_envio' => 'required|date',
                'fecha_retorno' => 'nullable|date|after_or_equal:fecha_envio',
                'observacion' => 'nullable|string|max:500',
            ]);

            $envio = $formulario->laboratoriosExternos()->findOrFail($envioId);
            $envio->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Envío actualizado correctamente',
                'envio' => $envio->load('laboratorio')
            ]);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Formulario o envío no encontrado'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error al actualizar envío de laboratorio: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor'
            ], 500);
        }
    }

    public function ultimo($formularioId)
    {
        try {
            // Buscar el formulario explícitamente (incluyendo eliminados)
            $formulario = Formulario::withTrashed()->findOrFail($formularioId);
            
            $ultimo = $formulario->laboratoriosExternos()
                ->with('laboratorio')
                ->latest('created_at')
                ->first();

            return response()->json([
                'success' => true,
                'envio' => $ultimo
            ]);
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Formulario no encontrado'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error al consultar último envío: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor'
            ], 500);
        }
    }

    public function storeOrden(Request $request, Orden $orden)
    {
        $validated = $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'fecha_envio' => 'required|date',
            'fecha_retorno' => 'nullable|date|after_or_equal:fecha_envio',
            'observacion' => 'nullable|string|max:500',
        ]);

        $envio = $orden->laboratoriosExternos()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Orden enviado al laboratorio correctamente',
            'envio' => $envio->load('laboratorio')
        ]);
    }

    public function updateOrden(Request $request, Orden $orden, $envioId)
    {
        $validated = $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'fecha_envio' => 'required|date',
            'fecha_retorno' => 'nullable|date|after_or_equal:fecha_envio',
            'observacion' => 'nullable|string|max:500',
        ]);

        $envio = $orden->laboratoriosExternos()->findOrFail($envioId);
        $envio->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Envío actualizado correctamente',
            'envio' => $envio->load('laboratorio')
        ]);
    }

    public function ultimoOrden(Orden $orden)
    {
        $ultimo = $orden->laboratoriosExternos()
            ->with('laboratorio')
            ->latest('created_at')
            ->first();

        return response()->json([
            'success' => true,
            'envio' => $ultimo
        ]);
    }
}
