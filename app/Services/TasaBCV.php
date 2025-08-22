<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TasaBCV
{
    private string $apiKey;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('app.api_key_tasa');
        $this->baseUrl = config('app.api_tasa_url');
    }

    private function callApi(string $event, array $params = []): array
    {
        $data = array_merge(['evt' => $event, 'api-key' => $this->apiKey], $params);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl, $data);

        if ($response->failed()) {
            throw new \Exception("Error al llamar API Tasa: " . $response->body());
        }

        return $response->json();
    }

    public function getTasaActivaHoy(): array
    {
        return $this->callApi('tasa_activa_hoy');
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
}