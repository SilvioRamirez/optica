<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Tasa;
use Carbon\Carbon;

class TasaBinance
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('app.api_tasa_binance_url');
    }

    public function getTasaBinance(): array
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl, [
                'asset' => 'USDT',
                'fiat' => 'VES',
                'tradeType' => 'BUY',
                'page' => 1,
                'rows' => 10
            ]);

            if ($response->failed()) {
                throw new \Exception("Error al consultar API Binance: " . $response->body());
            }

            $data = $response->json();

            if (!isset($data['data']) || empty($data['data'])) {
                throw new \Exception("No se encontraron datos de tasa en Binance");
            }

            // Tomar el precio del primer resultado
            $precio = floatval($data['data'][1]['adv']['price']);

            // Guardar en base de datos
            $this->guardarTasaBinance($precio);

            return [
                'success' => true,
                'precio' => $precio,
                'fecha' => Carbon::now()->format('Y-m-d H:i:s'),
                'fuente' => 'Binance'
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'precio' => 0
            ];
        }
    }

    private function guardarTasaBinance(float $precio): void
    {
        Tasa::create([
            'valor' => $precio,
            'fecha' => Carbon::now()->format('Y-m-d'),
            'fuente' => 'Binance'
        ]);
    }

    public function getLastTasaBinance(): ?Tasa
    {
        return Tasa::where('fuente', 'Binance')
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function compararConBCV(): array
    {
        $tasaBinance = $this->getLastTasaBinance();
        $tasaBCV = Tasa::where('fuente', 'BCV')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$tasaBinance || !$tasaBCV) {
            return [
                'success' => false,
                'error' => 'No se encontraron tasas para comparar'
            ];
        }

        $diferencia = $tasaBinance->valor - $tasaBCV->valor;
        $porcentajeDiferencia = ($diferencia / $tasaBCV->valor) * 100;

        return [
            'success' => true,
            'tasa_binance' => $tasaBinance->valor,
            'tasa_bcv' => $tasaBCV->valor,
            'diferencia' => $diferencia,
            'porcentaje_diferencia' => round($porcentajeDiferencia, 2),
            'fecha_binance' => $tasaBinance->created_at->format('Y-m-d H:i:s'),
            'fecha_bcv' => $tasaBCV->created_at->format('Y-m-d H:i:s')
        ];
    }
}