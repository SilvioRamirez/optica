<?php

namespace App\Http\Controllers;

use App\Models\Resultados;
use App\Models\ResultadosDetalle;
use Illuminate\Http\Request;


class RelacionController extends Controller
{
    public function index(){
        $resultado = Resultados::find(1);
        $detalle = ResultadosDetalle::find(1);

        return view('relacion', compact('resultado', 'detalle'));

    }
}
