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
        $pagos = Pago::with('tipo')->where('formulario_id', $id)->get();

        return response()->json($pagos->map(function($pago) {
            return [
                'id' => $pago->id,
                'formulario_id' => $pago->formulario_id,
                'monto' => $pago->monto,
                'pago_fecha' => $pago->pago_fecha,
                'tipo' => $pago->tipo ? $pago->tipo->tipo : 'N/A',
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
