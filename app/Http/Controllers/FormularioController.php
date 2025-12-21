<?php

namespace App\Http\Controllers;

use App\DataTables\FormulariosDataTable;
use App\Models\Formulario;
use App\Models\Especialista;
use App\Models\Estatus;
use App\Models\Laboratorio;
use App\Models\Operativo;
use App\Models\RutaEntrega;
use App\Models\Tipo;
use App\Models\TipoLente;
use App\Models\TipoTratamiento;
use App\Models\Descuento;
use App\Models\Origen;
use App\Models\Refractante;
use App\Exports\FormulariosExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\StoreFormularioRequest;
use App\Http\Requests\UpdateFormularioRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

use App\Services\WhatsAppApiService;
use App\Services\GroqAIService;
use Carbon\Carbon;

class FormularioController extends Controller
{

    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:formulario-list|formulario-create|formulario-edit|formulario-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:formulario-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:formulario-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:formulario-delete', ['only' => ['delete', 'destroy']]);
        $this->middleware('permission:formulario-estatus', ['only' => ['estatusFormulario', 'cambiarEstatus']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(FormulariosDataTable $dataTable)
    {

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        $estatuses = Estatus::pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');

        $rutaEntregas = RutaEntrega::orderBy('ruta_entrega', 'asc')->pluck('ruta_entrega', 'id')->prepend('-- Seleccione --', '');

        $tipos = Tipo::orderBy('tipo', 'asc')->pluck('tipo', 'id')->prepend('-- Seleccione --', '');

        $origens = Origen::orderBy('nombre', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        $laboratorios_externos = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'id')->prepend('-- Seleccione --', '');

        return $dataTable->render('formularios.index', compact('laboratorios', 'estatuses', 'rutaEntregas', 'tipos', 'origens', 'laboratorios_externos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* Se llenan los Desplegables */


        $tipos = Tipo::pluck('tipo', 'tipo')->prepend('-- Seleccione --', '');

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        $estatuses = Estatus::orderBy('estatus', 'asc')->pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');

        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);

        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'asc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');

        $rutaEntregas = RutaEntrega::orderBy('ruta_entrega', 'asc')->pluck('ruta_entrega', 'id')->prepend('-- Seleccione --', '');

        $especialistas = Especialista::orderBy('id', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        /* $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'id')->prepend('-- Seleccione --', ''); */

        $origens = Origen::orderBy('nombre', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        $refractantes = Refractante::orderBy('id', 'desc')
            ->select('id', 'nombre_apellido', 'telefono', 'operativo_id')
            ->take(100)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre_apellido . ' (' . $item->telefono . ')',
                    'telefono' => $item->telefono,
                    'nombre_apellido' => $item->nombre_apellido,
                    'operativo_id' => $item->operativo_id
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --', 'telefono' => 0, 'nombre_apellido' => 0, 'operativo_id' => 0]);

        $operativos = Operativo::orderBy('id', 'desc')
            ->select('id', 'nombre_operativo')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre_operativo,
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --']);

        $descuentos = Descuento::orderBy('id', 'asc')
            ->select('id', 'nombre', 'porcentaje')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre . ' (' . $item->porcentaje . '%)',
                    'porcentaje' => $item->porcentaje
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --', 'porcentaje' => 0]);

        return view('formularios.create', compact('operativos', 'tipos', 'laboratorios', 'estatuses', 'tipoLentes', 'tipoTratamientos', 'rutaEntregas', 'especialistas', 'descuentos', 'origens', 'refractantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormularioRequest $request): RedirectResponse
    {

        $data = $request->except(
            'refractante_id',
            'tipo_tratamiento_hidden_id',
            'saldo',
            'porcentaje_pago',
            'abono_1_decimal',
            'abono_2_decimal',
            'abono_3_decimal',
            'abono_4_decimal',
            'abono_5_decimal',
            'abono_fecha_1',
            'abono_fecha_2',
            'abono_fecha_3',
            'abono_fecha_4',
            'abono_fecha_5',
            'tipo_pago_1',
            'tipo_pago_2',
            'tipo_pago_3',
            'tipo_pago_4',
            'tipo_pago_5',
            'ref_pago_1',
            'ref_pago_2',
            'ref_pago_3',
            'ref_pago_4',
            'ref_pago_5'

        );
        //$data['status'] = $request->status ? 1 : 0;
        $data['saldo'] = $request->total;

        $formulario = Formulario::create($data);

        $formulario->calculoPagos();

        // Enviar mensaje de bienvenida por WhatsApp
        try {
            if ($formulario->telefono && $formulario->whatsappSend()) {
                $groqService = app(GroqAIService::class);
                $mensajeResult = $groqService->generarMensajeBienvenidaNuevaOrden([
                    'nombre_paciente' => $formulario->paciente,
                    'numero_orden' => $formulario->numero_orden,
                    'fecha' => Carbon::parse($formulario->fecha)->format('d/m/Y'),
                    'total' => number_format($formulario->total, 2),
                ]);

                if ($mensajeResult['success'] && !empty($mensajeResult['mensaje'])) {
                    $whatsappService = app(WhatsAppApiService::class);
                    $whatsappService->sendMessage($formulario->telefono, $mensajeResult['mensaje']);

                    Log::info('Mensaje de bienvenida enviado', [
                        'orden' => $formulario->numero_orden,
                        'telefono' => $formulario->telefono,
                        'es_ia' => $mensajeResult['es_ia'] ?? false,
                    ]);
                }
            }
        } catch (\Exception $e) {
            // No detener el flujo si falla el envío del mensaje
            Log::error('Error al enviar mensaje de bienvenida', [
                'orden' => $formulario->numero_orden,
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()->route('formularios.index', $formulario->id)
            ->with('success', 'Registro creado exitosamente. Orden Nro. ' . $formulario->numero_orden . '.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formulario $formulario): View
    {
        /* $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'id')->prepend('-- Seleccione --', ''); */

        $tipos = Tipo::pluck('tipo', 'tipo')->prepend('-- Seleccione --', '');

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        $estatuses = Estatus::orderBy('estatus', 'asc')->pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');

        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);

        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'asc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');

        $rutaEntregas = RutaEntrega::orderBy('ruta_entrega', 'asc')->pluck('ruta_entrega', 'id')->prepend('-- Seleccione --', '');

        $especialistas = Especialista::orderBy('id', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        $origens = Origen::orderBy('nombre', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        $refractantes = Refractante::orderBy('id', 'desc')
            ->select('id', 'nombre_apellido', 'telefono', 'operativo_id')
            ->take(100)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre_apellido . ' (' . $item->telefono . ')',
                    'telefono' => $item->telefono,
                    'nombre_apellido' => $item->nombre_apellido,
                    'operativo_id' => $item->operativo_id
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --', 'telefono' => 0, 'nombre_apellido' => 0, 'operativo_id' => 0]);

        $operativos = Operativo::orderBy('id', 'desc')
            ->select('id', 'nombre_operativo')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre_operativo,
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --']);

        $descuentos = Descuento::orderBy('id', 'asc')
            ->select('id', 'nombre', 'porcentaje')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre . ' (' . $item->porcentaje . '%)',
                    'porcentaje' => $item->porcentaje
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --', 'porcentaje' => 0]);

        $formulario->calculoPagos();

        return view('formularios.show', compact('formulario', 'laboratorios', 'tipos', 'operativos', 'estatuses', 'tipoLentes', 'tipoTratamientos', 'rutaEntregas', 'especialistas', 'descuentos', 'origens', 'refractantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulario $formulario): View
    {
        /* $operativos = Operativo::orderBy('id', 'desc')->pluck('nombre_operativo', 'id')->prepend('-- Seleccione --', ''); */

        $tipos = Tipo::pluck('tipo', 'tipo')->prepend('-- Seleccione --', '');

        $laboratorios = Laboratorio::orderBy('id', 'desc')->pluck('razon_social', 'razon_social')->prepend('-- Seleccione --', '');

        $estatuses = Estatus::orderBy('estatus', 'asc')->pluck('estatus', 'estatus')->prepend('-- Seleccione --', '');

        $tipoLentes = TipoLente::get(['id', 'tipo_lente']);

        $tipoTratamientos = TipoTratamiento::orderBy('tipo_tratamiento', 'asc')->pluck('tipo_tratamiento', 'id')->prepend('-- Seleccione --', '');

        $rutaEntregas = RutaEntrega::orderBy('ruta_entrega', 'asc')->pluck('ruta_entrega', 'id')->prepend('-- Seleccione --', '');

        $especialistas = Especialista::orderBy('id', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        $origens = Origen::orderBy('nombre', 'asc')->pluck('nombre', 'id')->prepend('-- Seleccione --', '');

        $refractantes = Refractante::orderBy('id', 'desc')
            ->select('id', 'nombre_apellido', 'telefono', 'operativo_id')
            ->take(100)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre_apellido . ' (' . $item->telefono . ')',
                    'telefono' => $item->telefono,
                    'nombre_apellido' => $item->nombre_apellido,
                    'operativo_id' => $item->operativo_id
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --', 'telefono' => 0, 'nombre_apellido' => 0, 'operativo_id' => 0]);

        $operativos = Operativo::orderBy('id', 'desc')
            ->select('id', 'nombre_operativo')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre_operativo,
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --']);

        $descuentos = Descuento::orderBy('id', 'asc')
            ->select('id', 'nombre', 'porcentaje')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->nombre . ' (' . $item->porcentaje . '%)',
                    'porcentaje' => $item->porcentaje
                ];
            })
            ->prepend(['id' => '', 'text' => '-- Seleccione --', 'porcentaje' => 0]);

        $formulario->calculoPagos();

        return view('formularios.edit', compact('formulario', 'operativos', 'tipos', 'laboratorios', 'estatuses', 'tipoLentes', 'tipoTratamientos', 'rutaEntregas', 'especialistas', 'descuentos', 'origens', 'refractantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormularioRequest $request, Formulario $formulario): RedirectResponse
    {

        $data = $request->except('tipo_tratamiento_hidden_id', 'refractante_id');

        $data['saldo'] = $request->total;

        if (!$formulario->update($data)) {
            return redirect()->back()
                ->with('danger', 'Registro no actualizado.');
        }

        $formulario->calculoPagos();

        return redirect()->route('formularios.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Show de form to confirm the remove from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function delete($id): View
    {
        $formulario = Formulario::find($id);
        return view('formularios.delete', compact('formulario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulario $formulario): RedirectResponse
    {
        $formulario->delete();
        return redirect()->route('formularios.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }

    public function estatusFormulario(Formulario $formulario)
    {
        return $formulario = Formulario::where('id', $formulario->id)
            ->get([
                'id',
                'numero_orden',
                'paciente',
                'estatus',
                'ruta_entrega_id',
                'laboratorio',
                'total',
                'saldo',
                'porcentaje_pago',
                'operativo_id',
                'observaciones_extras',
                'edad',
                'fecha',
                'fecha_entrega',
                'origen_id'
            ])
            ->first()->toJson();
    }

    public function cambiarEstatus(Formulario $formulario, Request $request)
    {
        $estatusAnterior = $formulario->estatus;
        $nuevoEstatus = $request->params['estatus'];

        $formulario->update([
            'estatus'           => $nuevoEstatus,
            'ruta_entrega_id'   => $request->params['ruta_entrega_id'],
            'laboratorio'       => $request->params['laboratorio'],
            'fecha_entrega'     => $request->params['fecha_entrega'],
        ]);

        $formulario->calculoPagos();

        // Enviar mensaje cuando el estatus cambie a LISTO o POR ENTREGAR
        $estatusParaNotificar = ['LISTO', 'POR ENTREGAR'];

        if (in_array($nuevoEstatus, $estatusParaNotificar) && $estatusAnterior !== $nuevoEstatus) {
            try {
                if ($formulario->telefono && $formulario->whatsappSend()) {
                    $groqService = app(GroqAIService::class);

                    $datosOrden = [
                        'nombre_paciente' => $formulario->paciente,
                        'numero_orden' => $formulario->numero_orden,
                        'estatus' => $nuevoEstatus,
                        'fecha_entrega' => $formulario->fecha_entrega ? Carbon::parse($formulario->fecha_entrega)->format('d/m/Y') : null,
                        'ruta_entrega' => $formulario->rutaEntrega ? $formulario->rutaEntrega->ruta_entrega : null,
                    ];

                    $mensajeResult = $groqService->generarMensajeOrdenLista($datosOrden);

                    if ($mensajeResult['success'] && !empty($mensajeResult['mensaje'])) {
                        $whatsappService = app(WhatsAppApiService::class);
                        $whatsappService->sendMessage($formulario->telefono, $mensajeResult['mensaje']);

                        Log::info('Mensaje de orden lista enviado', [
                            'orden' => $formulario->numero_orden,
                            'estatus' => $nuevoEstatus,
                            'telefono' => $formulario->telefono,
                            'es_ia' => $mensajeResult['es_ia'] ?? false,
                        ]);
                    }
                }
            } catch (\Exception $e) {
                // No detener el flujo si falla el envío del mensaje
                Log::error('Error al enviar mensaje de orden lista', [
                    'orden' => $formulario->numero_orden,
                    'estatus' => $nuevoEstatus,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return $formulario->toJson();
    }

    /**
     * Write code on Method
     *
     * @return Laboratorio
     */
    public function fetchLaboratorio(Request $request)
    {
        //Se utiliza params por los parametros de la peticion axios
        $data['laboratorios'] = Laboratorio::get(["razon_social", "razon_social"]);
        return response()->json($data);
    }

    /* Consulta de Pagos Formulario */
    public function saldoFormulario(Formulario $formulario)
    {
        return $formulario = Formulario::where('id', $formulario->id)
            ->get([
                'id',
                'numero_orden',
                'paciente',
                'estatus',
                'total',
                'saldo',
                'porcentaje_pago',
                'operativo_id',
                'cashea',
                'origen_id'
            ])
            ->first()->toJson();
    }

    public function export()
    {
        return Excel::download(new FormulariosExport, 'formularios.xlsx');
    }
}
