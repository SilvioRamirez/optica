<?php

namespace App\Http\Controllers;

use App\DataTables\RefractantesDataTable;
use App\Models\Refractante;
use App\Http\Requests\StoreRefractanteRequest;
use App\Http\Requests\UpdateRefractanteRequest;
use App\Models\Operativo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Services\GroqAIService;
use App\Services\WhatsAppApiService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class RefractanteController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:refractante-list|refractante-create|refractante-edit|refractante-delete', ['only' => ['index','show']]);
        $this->middleware('permission:refractante-create', ['only' => ['create','store']]);
        $this->middleware('permission:refractante-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:refractante-delete', ['only' => ['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RefractantesDataTable $dataTable)
    {
        return $dataTable->render('refractantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'id')->prepend('-- Seleccione --', '');

        return view('refractantes.create', compact('operativos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRefractanteRequest $request): RedirectResponse
    {

        $data = $request->all();

        $refractante = Refractante::create($data);

        // Enviar mensaje de bienvenida por WhatsApp
        try {
            if ($refractante->telefono && $refractante->whatsappSend()) {
                $groqService = app(GroqAIService::class);
                $mensajeResult = $groqService->generarMensajeBienvenidaRefractante([
                    'nombre_refractante' => $refractante->nombre_apellido,
                    'telefono' => $refractante->telefono,
                    'fecha_nacimiento' => $refractante->fecha_nacimiento,
                    'genero' => $refractante->genero,
                ]);

                if ($mensajeResult['success'] && !empty($mensajeResult['mensaje'])) {
                    $whatsappService = app(WhatsAppApiService::class);
                    $whatsappService->sendMessage($refractante->telefono, $mensajeResult['mensaje']);

                    Log::info('Mensaje de bienvenida enviado', [
                        'refractante' => $refractante->nombre_apellido,
                        'telefono' => $refractante->telefono,
                        'es_ia' => $mensajeResult['es_ia'] ?? false,
                    ]);
                }
            }
        } catch (\Exception $e) {
            // No detener el flujo si falla el envío del mensaje
            Log::error('Error al enviar mensaje de bienvenida', [
                'refractante' => $refractante->nombre_apellido,
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()->route('refractantes.index', $refractante->id)
                            ->with('success','Registro creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Refractante $refractante): View
    {
        $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'id')->prepend('-- Seleccione --', '');

        return view('refractantes.show', compact('refractante', 'operativos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refractante $refractante): View
    {
        $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'id')->prepend('-- Seleccione --', '');
        return view('refractantes.edit',compact('refractante', 'operativos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRefractanteRequest $request, Refractante $refractante): RedirectResponse
    {
        $data = $request->all();

        if(!$refractante->update($data)){
            return redirect()->back()
                            ->with('danger','Registro no actualizado.');
        }

        return redirect()->route('refractantes.index')
                            ->with('success','Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete($id): View
    {
        $refractante = Refractante::find($id);
        return view('refractantes.delete',compact('refractante'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refractante $refractante): RedirectResponse
    {
        $refractante->delete();
        return redirect()->route('refractantes.index')
                            ->with('success','Registro eliminado exitosamente.');
    }
}
