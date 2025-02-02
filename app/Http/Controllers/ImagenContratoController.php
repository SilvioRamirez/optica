<?php

namespace App\Http\Controllers;

use App\Models\ImagenContrato;
use App\Http\Requests\StoreImagenContratoRequest;
use App\Http\Requests\UpdateImagenContratoRequest;
use App\Models\Formulario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImagenContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreImagenContratoRequest $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\img\contratos/' . $nombre;

        Image::read($request->file('file'))
                ->scaleDown(height: 1000)
                ->save($ruta);

        ImagenContrato::create([
            'path' => '/storage/img/contratos/'. $nombre,
            'formulario_id' => $request->formulario_imagen_id
        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenContrato $imagenContrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImagenContratoRequest $request, ImagenContrato $imagenContrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenContrato $imagenContrato)
    {
        Storage::delete(str_replace('/storage/', 'public/', $imagenContrato->path)) ;
        $imagenContrato->delete();
        
        return response()->json([
            'message' => 'Imagen eliminada'
        ]);
    }
}
