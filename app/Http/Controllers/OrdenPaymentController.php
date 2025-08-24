<?php

namespace App\Http\Controllers;

use App\Models\OrdenPayment;
use App\Http\Requests\StoreOrdenPaymentRequest;
use App\Http\Requests\UpdateOrdenPaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\OrdenPaymentsDataTable;

class OrdenPaymentController extends Controller
{
    /**
     * Realiza las validaciones en los permisos de spatie
     *
     */
    function __construct()
    {
        $this->middleware('permission:orden-payment-list|orden-payment-create|orden-payment-edit|orden-payment-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:orden-payment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:orden-payment-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:orden-payment-delete', ['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(OrdenPaymentsDataTable $dataTable)
    {
        return $dataTable->render('ordenPayments.index');
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
    public function store(StoreOrdenPaymentRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = auth()->user()->name;
        $data['updated_by'] = auth()->user()->name;
        $ordenPayment = OrdenPayment::create($data);

        $ordenPayment->orden->calculoPagos();

        return response()->json(['message' => 'Pago registrado correctamente', 'orden_id' => $ordenPayment->orden_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenPayment $ordenPayment)
    {
        return view('ordenPayments.show', compact('ordenPayment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenPayment $ordenPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenPaymentRequest $request, OrdenPayment $ordenPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenPayment $ordenPayment)
    {
        $ordenPayment->delete();

        $ordenPayment->orden->calculoPagos();

        return response()->json(['message' => 'Pago de orden eliminado correctamente']);
    }

    public function cargarImagen(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|max:10240', // máximo 10mb
                'payment_id' => 'required|exists:pagos,id'
            ]);

            $pago = OrdenPayment::findOrFail($request->payment_id);

            if ($request->hasFile('image')) {
                // Eliminar imagen anterior si existe
                if ($pago->image_path && Storage::exists($pago->image_path)) {
                    Storage::delete($pago->image_path);
                }

                $nombre = Str::random(10) . $request->file('image')->getClientOriginalName();

                // Crear el directorio si no existe
                $directorio = public_path() . '/storage/img/OrdenPayments/';
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0755, true);
                }

                $ruta = $directorio . $nombre;

                Image::read($request->file('image'))
                    ->scaleDown(height: 1000)
                    ->save($ruta);

                // Guardar nueva imagen
                $pago->image_path = '/storage/img/OrdenPayments/'. $nombre;
                $pago->save();

                $pago->load(['orden' => function($query){
                    $query
                    ->with('cliente')
                    ->with('tipoTratamiento')
                    ->with('tipoLente')
                    ->with('ordenPayments', function($query){
                        $query->with('origen')
                        ->with('tipo');
                    });
                }]);

                return response()->json([
                    'success' => true,
                    'message' => 'Imagen cargada correctamente',
                    'path' => $ruta,
                    'orden' => $pago->orden
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
