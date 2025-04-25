<?php

namespace App\Http\Controllers;

use App\Models\ImagenContrato;
use App\Http\Requests\StoreImagenContratoRequest;
use App\Http\Requests\UpdateImagenContratoRequest;
use App\Models\Formulario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageFormat;

class ImagenContratoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImagenContratoRequest $request)
    {
        try {
            // La validación ya está en el StoreImagenContratoRequest
            // Añadimos validación extra para el tamaño máximo
            $request->validate([
                'file' => 'max:11000' // 5MB máximo
            ]);

            $file = $request->file('file');
            $nombre = Str::random(10) . $file->getClientOriginalName();
            $ruta = public_path() . '/storage/img/contratos/' . $nombre;

            // Optimizamos la imagen reduciendo su tamaño
            Image::read($file)
                ->scaleDown(height: 800)
                ->save($ruta);

            ImagenContrato::create([
                'path' => '/storage/img/contratos/'. $nombre,
                'formulario_id' => $request->formulario_imagen_id
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function ver(ImagenContrato $imagenContrato)
    {
        /* $imagenContrato = ImagenContrato::where('formulario_id', $imagenContrato->formulario_id)->get(); */
        /* return response()->json($imagenContrato); */

        $imagenContrato = ImagenContrato::where('formulario_id', $imagenContrato->formulario_id)->paginate(2);

        return view('', compact('imagenContrato'));
        
    }

    public function show(Formulario $formulario){

        return $imagenContrato = ImagenContrato::where('formulario_id', $formulario->id)
            ->get([
                'id',
                'formulario_id',
                'path',
                'order'
            ])
            ->toJson();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $imagenContrato= ImagenContrato::find($id);
        
        $imagenContrato->delete();

        Storage::delete(str_replace('/storage/', 'public/', $imagenContrato->path)) ;
        
        return response()->json([
            'message' => 'Imagen eliminada'
        ]);
        
    }
}
