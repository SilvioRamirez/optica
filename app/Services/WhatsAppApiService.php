<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppApiService
{
    protected string $baseUrl;
    protected string $apiKey;
    protected int $timeout;

    public function __construct()
    {
        $this->baseUrl = config('services.whatsapp.url', env('WHATSAPP_API_URL'));
        $this->apiKey = config('services.whatsapp.key', env('WHATSAPP_API_KEY'));
        $this->timeout = config('services.whatsapp.timeout', 30);
    }

    /**
     * Ejecutar una herramienta de la API
     */
    protected function callTool(string $toolName, array $arguments = []): array
    {
        try {
            $response = Http::timeout($this->timeout)
                ->withHeaders([
                    'X-API-Key' => $this->apiKey,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->post("{$this->baseUrl}/tools/call", [
                    'name' => $toolName,
                    'arguments' => $arguments,
                ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('WhatsApp API Error', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return [
                'error' => true,
                'message' => 'Error en la API: ' . $response->status()
            ];

        } catch (\Exception $e) {
            Log::error('WhatsApp API Exception', ['message' => $e->getMessage()]);
            
            return [
                'error' => true,
                'message' => 'Error de conexión: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Enviar un mensaje de WhatsApp
     * 
     * @param string $number Número en formato internacional (+521234567890)
     * @param string $message Contenido del mensaje
     */
    public function sendMessage(string $number, string $message): array
    {
        return $this->callTool('whatsapp_send_message', [
            'number' => $this->formatNumber($number),
            'message' => $message,
        ]);
    }

    /**
     * Verificar si un número existe en WhatsApp
     */
    public function checkNumber(string $number): array
    {
        return $this->callTool('whatsapp_check_number', [
            'number' => $this->formatNumber($number),
        ]);
    }

    /**
     * Obtener el estado de conexión de WhatsApp
     */
    public function getStatus(): array
    {
        return $this->callTool('whatsapp_get_status');
    }

    /**
     * Obtener mensajes de un número específico
     */
    public function getMessages(string $number, int $limit = 20): array
    {
        return $this->callTool('whatsapp_get_messages', [
            'number' => $this->formatNumber($number),
            'limit' => min($limit, 50),
        ]);
    }

    /**
     * Obtener lista de conversaciones
     */
    public function getConversations(int $limit = 20): array
    {
        return $this->callTool('whatsapp_get_conversations', [
            'limit' => min($limit, 50),
        ]);
    }

    /**
     * Marcar mensajes como leídos
     */
    public function markAsRead(string $number): array
    {
        return $this->callTool('whatsapp_mark_read', [
            'number' => $this->formatNumber($number),
        ]);
    }

    /**
     * Formatear número de teléfono
     */
    protected function formatNumber(string $number): string
    {
        // Eliminar caracteres no numéricos excepto +
        $number = preg_replace('/[^\d+]/', '', $number);
        
        // Agregar + si no lo tiene
        if (!str_starts_with($number, '+')) {
            $number = '+' . $number;
        }
        
        return $number;
    }
}