<?php

namespace App\Http\Controllers;

use App\Services\TasaBCV;
use App\Models\Tasa;

class TasaController extends Controller
{
    public function index(TasaBCV $tasaService)
    {
        $tasaHoy = $tasaService->getTasaActivaHoy();

        return response()->json($tasaHoy);
    }

    public function getLastTasa(){
        $tasa = Tasa::getLastTasa();
        return response()->json($tasa);
    }
}