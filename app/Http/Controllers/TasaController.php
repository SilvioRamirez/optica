<?php

namespace App\Http\Controllers;

use App\Services\TasaBCV;
use App\Services\TasaBinance;
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

    public function getBinance(TasaBinance $binanceService)
    {
        $tasaBinance = $binanceService->getTasaBinance();
        return response()->json($tasaBinance);
    }

    public function getLastTasaBinance(){
        $tasa = Tasa::getLastTasaBinance();
        return response()->json($tasa);
    }

    public function compararTasas(TasaBinance $binanceService)
    {
        $comparacion = $binanceService->compararConBCV();
        return response()->json($comparacion);
    }
}