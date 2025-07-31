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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Payment;

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

    public function abonoWeb(Request $request)
    {
        
        $this->validate($request, [
            'saldo' => 'required',
            'saldo_bs' => 'required',
            'total' => 'required',
            'tasa_cambio' => 'required',
            'fecha' => 'required',
            'paciente' => 'required',
            'numero_orden' => 'required',
            'telefono' => 'required',
            'banco_emisor' => 'required',
            'referencia' => 'required',
            'monto' => 'required',
            'fecha_pago' => 'required',
            'monto_usd' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
        ]);

        $data = $request->all();
        $data['created_by'] = 'Web';
        $data['updated_by'] = 'Web';
        $data['status'] = 'PENDIENTE';
        $data['formulario_id'] = $request->id;
        $data['saldo'] = $request->saldo;
        $data['saldo_bs'] = $request->saldo_bs;
        $data['total'] = $request->total;
        $data['tasa_cambio'] = $request->tasa_cambio;
        $data['fecha'] = $request->fecha;
        $data['paciente'] = $request->paciente;
        $data['numero_orden'] = $request->numero_orden;
        $data['cedula'] = $request->cedula;
        $data['edad'] = $request->edad;
        $data['telefono'] = $request->telefono;
        $data['banco_emisor'] = $request->banco_emisor;
        $data['referencia'] = $request->referencia;
        $data['monto'] = $request->monto;
        $data['fecha_pago'] = $request->fecha_pago;
        $data['monto_usd'] = $request->monto_usd;

        if ($request->hasFile('file')) {
            // Eliminar imagen anterior si existe
            if ($data['file'] && Storage::exists($data['file'])) {
                Storage::delete($data['file']);
            }

            $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

            $ruta = public_path() . '/storage/img/pagos/' . $nombre;

            Image::read($request->file('file'))
                ->scaleDown(height: 1000)
                ->save($ruta);

            // Guardar nueva imagen
            $data['file'] = '/storage/img/pagos/'. $nombre;

        }

        $pago = Payment::create($data);

        return redirect()->route('consulta')->with('success', '¡Gracias! Su pago ha sido registrado correctamente, en un plazo de 48 horas se confirmara el estado del pago.');
    }

    public function show(Pago $pago)
    {
        $pago->load('tipo', 'formulario');
        return view('pagos.show', compact('pago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePagoRequest $request)
    {

        $formulario_id = $request->saldo_formulario_id; // Asigna el valor a una variable
        $data = $request->except('saldo_formulario_id'); // Excluye el campo saldo_formulario_id
        $data['formulario_id'] = $formulario_id;
        $data['origen_id'] = $request->origen_id;
        $pago = Pago::create($data);

        $pago->formulario->calculoPagos();

        return response()->json(['message' => 'Pago registrado correctamente', 'formulario_id' => $formulario_id]);
    }

    public function consultaPagos($id)
    {
        $pagos = Pago::with('tipo')->where('formulario_id', $id)->get();

        return response()->json($pagos->map(function($pago) {
            return [
                'id' => $pago->id,
                'formulario_id' => $pago->formulario_id,
                'monto' => $pago->monto,
                'pago_fecha' => $pago->pago_fecha,
                'tipo' => $pago->tipo ? $pago->tipo->tipo : 'N/A',
                'origen' => $pago->origen ? $pago->origen->nombre : 'N/A',
                'referencia' => $pago->referencia,
                'image_path' => $pago->image_path,
                'created_at' => $pago->created_at,
                'updated_at' => $pago->updated_at
            ];
        }));

    }

    public function calculoPagos($id)
    {
        $pagos = Pago::where('formulario_id', $id)->get();

        $formulario = Formulario::where('id', $id)->first();

        $totalPagos = $pagos->sum('monto');

        $totalFormulario = $formulario->total;

        $saldo = $totalFormulario - $totalPagos;

        if ($totalFormulario == 0) {
            $porcentaje = 100;
        } else {
            $porcentaje = round(($totalPagos / $totalFormulario) * 100);
        }

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

            $formulario->calculoPagos();

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

    public function cargarImagen(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|max:10240', // máximo 10mb
                'pago_id' => 'required|exists:pagos,id'
            ]);

            $pago = Pago::findOrFail($request->pago_id);

            if ($request->hasFile('image')) {
                // Eliminar imagen anterior si existe
                if ($pago->image_path && Storage::exists($pago->image_path)) {
                    Storage::delete($pago->image_path);
                }

                $nombre = Str::random(10) . $request->file('image')->getClientOriginalName();

                $ruta = public_path() . '/storage/img/pagos/' . $nombre;

                Image::read($request->file('image'))
                    ->scaleDown(height: 1000)
                    ->save($ruta);

                // Guardar nueva imagen
                $pago->image_path = '/storage/img/pagos/'. $nombre;
                $pago->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Imagen cargada correctamente',
                    'path' => $ruta
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No se encontró ninguna imagen'
            ], 400);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar la imagen: ' . $e->getMessage()
            ], 500);
        }
    }
}
