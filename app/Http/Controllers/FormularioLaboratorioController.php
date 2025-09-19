<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioLaboratorio;
use App\Models\Formulario;
use App\Models\Laboratorio;
use App\Models\Orden;
use App\DataTables\FormularioLaboratoriosDataTable;
class FormularioLaboratorioController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(FormularioLaboratoriosDataTable $dataTable)
    {
        return $dataTable->render('formularioLaboratorios.index');
    }

    public function store(Request $request, Formulario $formulario)
    {
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
    }

    public function update(Request $request, Formulario $formulario, $envioId)
    {
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
    }

    public function ultimo(Formulario $formulario)
    {
        $ultimo = $formulario->laboratoriosExternos()
            ->with('laboratorio')
            ->latest('created_at')
            ->first();

        return response()->json([
            'success' => true,
            'envio' => $ultimo
        ]);
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
