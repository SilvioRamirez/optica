<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Tasa;
use Carbon\Carbon;
class TasaEuro
{
    private string $apiKey;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('app.api_key_tasa');
        $this->baseUrl = config('app.api_tasa_euro_url');
    }

    private function callApi(string $event, array $params = []): array
    {
        $data = array_merge(['evt' => $event, 'api-key' => $this->apiKey], $params);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl, $data);

        if ($response->failed()) {
            throw new \Exception("Error al llamar API Tasa Euro: " . $response->body());
        }

        return $response->json();
    }

    public function getTasaActivaHoy(): array
    {
        $data = $this->callApi('tasa_activa_hoy');

        if (isset($data[0]['tasa'], $data[0]['effective_date'])) {
            $this->guardarTasaEuro($data[0]['tasa']);
        }

        return $data;
    }

    public function getTasaActiva1(): array
    {
        return $this->callApi('tasa_activa_1');
    }

    public function getTasaActivaFecha(string $fecha): array
    {
        return $this->callApi('tasa_activa_fecha', ['fecha' => $fecha]);
    }

    public function getTasaActivaN(int $n): array
    {
        return $this->callApi('tasa_activa_n', ['n' => $n]);
    }

    private function guardarTasaEuro(float $precio): void
    {
        Tasa::create([
            'valor' => $precio,
            'fecha' => Carbon::now()->format('Y-m-d'),
            'fuente' => 'Euro'
        ]);
    }

    public function getLastTasaEuro(): ?Tasa
    {
        return Tasa::where('fuente', 'Euro')
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function compararConBCV(): array
    {
        $tasaEuro = $this->getLastTasaEuro();
        $tasaBCV = Tasa::where('fuente', 'BCV')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$tasaEuro || !$tasaBCV) {
            return [
                'success' => false,
                'error' => 'No se encontraron tasas para comparar'
            ];
        }

        $diferencia = $tasaEuro->valor - $tasaBCV->valor;
        $porcentajeDiferencia = ($diferencia / $tasaBCV->valor) * 100;

        return [
            'success' => true,
            'tasa_euro' => $tasaEuro->valor,
            'tasa_bcv' => $tasaBCV->valor,
            'diferencia' => $diferencia,
            'porcentaje_diferencia' => round($porcentajeDiferencia, 2),
            'fecha_euro' => $tasaEuro->created_at->format('Y-m-d H:i:s'),
            'fecha_bcv' => $tasaBCV->created_at->format('Y-m-d H:i:s')
        ];
    }
}