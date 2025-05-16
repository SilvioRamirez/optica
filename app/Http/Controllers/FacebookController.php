<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function verificacion()
    {
        $configuracion = Configuracion::first();

        return view('facebook.index', compact('configuracion'));
    }
}
