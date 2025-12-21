<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class GroqAIService
{
    protected ?string $apiKey;
    protected string $model;
    protected string $baseUrl;
    protected float $temperature;
    protected int $maxTokens;
    protected int $timeout;

    public function __construct()
    {
        $this->apiKey = config('services.groq.api_key');
        $this->model = config('services.groq.model', 'llama-3.3-70b-versatile');
        $this->baseUrl = config('services.groq.base_url', 'https://api.groq.com/openai/v1');
        $this->temperature = config('services.groq.temperature', 0.7);
        $this->maxTokens = config('services.groq.max_tokens', 8000);
        $this->timeout = config('services.groq.timeout', 60);
    }

    /**
     * Verifica si el servicio está configurado correctamente
     */
    protected function isConfigured(): bool
    {
        return !empty($this->apiKey);
    }

    /**
     * Llama a la API de Groq (compatible con OpenAI)
     */
    protected function llamarGroqAPI(string $prompt): array
    {
        try {
            $url = "{$this->baseUrl}/chat/completions";

            $response = Http::timeout($this->timeout)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$this->apiKey}",
                ])
                ->post($url, [
                    'model' => $this->model,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Eres un optometrista especialista con amplia experiencia en diagnóstico y tratamiento de patologías oculares. Genera mensajes profesionales y cortos para whatsapp para una óptica llamada Optirango.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => $this->temperature,
                    'max_tokens' => $this->maxTokens,
                    'top_p' => (float) config('services.groq.top_p', 0.95),
                    'stream' => false
                ]);

            if (!$response->successful()) {
                Log::error('Error en respuesta de Groq API', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return [
                    'success' => false,
                    'error' => 'Error en la API de Groq: ' . $response->body(),
                ];
            }

            $data = $response->json();

            // Extraer el contenido generado (formato compatible con OpenAI)
            $contenido = $data['choices'][0]['message']['content'] ?? null;

            if (!$contenido) {
                return [
                    'success' => false,
                    'error' => 'No se pudo extraer contenido de la respuesta de Groq',
                ];
            }

            // Calcular tokens usados
            $tokensUsados = $data['usage']['total_tokens'] ?? 0;

            return [
                'success' => true,
                'contenido' => $contenido,
                'tokens_usados' => $tokensUsados,
                'prompt_tokens' => $data['usage']['prompt_tokens'] ?? 0,
                'completion_tokens' => $data['usage']['completion_tokens'] ?? 0,
            ];

        } catch (\Exception $e) {
            Log::error('Excepción al llamar a Groq API', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Genera un mensaje de confirmación de pago para WhatsApp
     * 
     * @param array $datosPago Información del pago confirmado
     * @return array
     */
    public function generarMensajeConfirmacionPago(array $datosPago): array
    {
        // Si no está configurada la API, usar mensaje predeterminado
        if (!$this->isConfigured()) {
            Log::warning('Groq API no configurada. Variable GROQ_API_KEY no encontrada en .env');
            
            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoConfirmacionPago($datosPago),
                'es_ia' => false,
                'motivo' => 'API no configurada',
            ];
        }

        try {
            $prompt = $this->construirPromptConfirmacionPago($datosPago);
            
            $response = $this->llamarGroqAPI($prompt);
            
            if (!$response['success']) {
                // Si falla la IA, devolver un mensaje predeterminado
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoConfirmacionPago($datosPago),
                    'es_ia' => false,
                    'motivo' => 'Error en API',
                ];
            }

            // Limpiar el mensaje (quitar posibles saltos de línea excesivos o formato)
            $mensaje = trim($response['contenido']);
            
            // Si el mensaje es muy largo (WhatsApp tiene límite), usar predeterminado
            if (strlen($mensaje) > 1000) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoConfirmacionPago($datosPago),
                    'es_ia' => false,
                    'motivo' => 'Mensaje muy largo',
                ];
            }

            return [
                'success' => true,
                'mensaje' => $mensaje,
                'tokens_usados' => $response['tokens_usados'] ?? 0,
                'es_ia' => true,
            ];

        } catch (\Exception $e) {
            Log::error('Error generando mensaje de confirmación de pago', [
                'error' => $e->getMessage(),
            ]);

            // En caso de error, devolver mensaje predeterminado
            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoConfirmacionPago($datosPago),
                'es_ia' => false,
                'motivo' => 'Excepción: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Construye el prompt para el mensaje de confirmación de pago
     */
    protected function construirPromptConfirmacionPago(array $datos): string
    {
        $nombrePaciente = $datos['nombre_paciente'] ?? 'Cliente';
        $monto = $datos['monto'] ?? '0.00';
        $referencia = $datos['referencia'] ?? 'N/A';
        $fechaPago = $datos['fecha_pago'] ?? date('Y-m-d');
        $numeroOrden = $datos['numero_orden'] ?? 'N/A';

        $prompt = "Eres un asistente corporativo profesional de una clínica oftalmológica. ";
        $prompt .= "Genera un mensaje de WhatsApp elegante, cordial y profesional para confirmar un pago recibido.\n\n";
        
        $prompt .= "## INFORMACIÓN DEL PAGO\n";
        $prompt .= "- Paciente: {$nombrePaciente}\n";
        $prompt .= "- Monto: \${$monto} USD\n";
        $prompt .= "- Referencia: {$referencia}\n";
        $prompt .= "- Fecha de pago: {$fechaPago}\n";
        $prompt .= "- Número de orden: {$numeroOrden}\n\n";
        
        $prompt .= "## INSTRUCCIONES\n";
        $prompt .= "1. El mensaje debe ser profesional pero cálido y cercano\n";
        $prompt .= "2. Confirma que el pago ha sido recibido exitosamente\n";
        $prompt .= "3. Incluye los datos principales del pago (monto, referencia)\n";
        $prompt .= "4. Agradece la confianza del paciente\n";
        $prompt .= "5. Ofrece disponibilidad para cualquier consulta\n";
        $prompt .= "6. Usa emojis de forma moderada y profesional (máximo 2-3)\n";
        $prompt .= "7. El mensaje debe ser CORTO (máximo 600 caracteres)\n";
        $prompt .= "8. Usa formato WhatsApp: *negritas*, _cursivas_ si es necesario\n";
        $prompt .= "9. NO uses HTML ni código\n";
        $prompt .= "10. El tono debe ser de una óptica llamada Optirango\n\n";
        $prompt .= "11. Indicale que puede revisar también el estatus de su orden en optirango.com\n";
        
        $prompt .= "Genera SOLO el mensaje, sin introducción ni explicación adicional.";

        return $prompt;
    }

    /**
     * Mensaje predeterminado en caso de fallo de la IA
     */
    protected function mensajePredeterminadoConfirmacionPago(array $datos): string
    {
        $nombrePaciente = $datos['nombre_paciente'] ?? 'Cliente';
        $monto = $datos['monto'] ?? '0.00';
        $referencia = $datos['referencia'] ?? 'N/A';

        $mensaje = "✅ *Confirmación de Pago Recibido*\n\n";
        $mensaje .= "Estimado/a *{$nombrePaciente}*,\n\n";
        $mensaje .= "Le confirmamos que hemos recibido su pago exitosamente:\n\n";
        $mensaje .= "💵 *Monto:* \${$monto} USD\n";
        $mensaje .= "📝 *Referencia:* {$referencia}\n\n";
        $mensaje .= "Agradecemos su confianza. Si tiene alguna consulta, estamos a su disposición.\n\n";
        $mensaje .= "_Optirango_";

        return $mensaje;
    }

    /**
     * Genera un mensaje de bienvenida para una nueva orden
     * 
     * @param array $datosOrden Información de la orden creada
     * @return array
     */
    public function generarMensajeBienvenidaNuevaOrden(array $datosOrden): array
    {
        // Si no está configurada la API, usar mensaje predeterminado
        if (!$this->isConfigured()) {
            Log::warning('Groq API no configurada. Variable GROQ_API_KEY no encontrada en .env');
            
            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoBienvenida($datosOrden),
                'es_ia' => false,
                'motivo' => 'API no configurada',
            ];
        }

        try {
            $prompt = $this->construirPromptBienvenidaNuevaOrden($datosOrden);
            
            $response = $this->llamarGroqAPI($prompt);
            
            if (!$response['success']) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoBienvenida($datosOrden),
                    'es_ia' => false,
                    'motivo' => 'Error en API',
                ];
            }

            $mensaje = trim($response['contenido']);
            
            // Si el mensaje es muy largo (WhatsApp tiene límite), usar predeterminado
            if (strlen($mensaje) > 1000) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoBienvenida($datosOrden),
                    'es_ia' => false,
                    'motivo' => 'Mensaje muy largo',
                ];
            }

            return [
                'success' => true,
                'mensaje' => $mensaje,
                'tokens_usados' => $response['tokens_usados'] ?? 0,
                'es_ia' => true,
            ];

        } catch (\Exception $e) {
            Log::error('Error generando mensaje de bienvenida', [
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoBienvenida($datosOrden),
                'es_ia' => false,
                'motivo' => 'Excepción: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Construye el prompt para el mensaje de bienvenida
     */
    protected function construirPromptBienvenidaNuevaOrden(array $datos): string
    {
        $nombrePaciente = $datos['nombre_paciente'] ?? 'Cliente';
        $numeroOrden = $datos['numero_orden'] ?? 'N/A';
        $fecha = $datos['fecha'] ?? date('Y-m-d');
        $total = $datos['total'] ?? '0.00';

        $prompt = "Eres un asistente corporativo profesional de una óptica llamada Optirango. ";
        $prompt .= "Genera un mensaje de WhatsApp cálido, profesional y acogedor para dar la bienvenida a un nuevo cliente que acaba de realizar una orden.\n\n";
        
        $prompt .= "## INFORMACIÓN DE LA ORDEN\n";
        $prompt .= "- Paciente: {$nombrePaciente}\n";
        $prompt .= "- Número de orden: {$numeroOrden}\n";
        $prompt .= "- Fecha: {$fecha}\n";
        $prompt .= "- Total: \${$total} USD\n\n";
        
        $prompt .= "## INSTRUCCIONES\n";
        $prompt .= "1. El mensaje debe ser profesional, cálido y cercano\n";
        $prompt .= "2. Da la bienvenida y agradece la confianza en Optirango\n";
        $prompt .= "3. Confirma que la orden ha sido registrada exitosamente\n";
        $prompt .= "4. Incluye el número de orden para referencia\n";
        $prompt .= "5. Menciona que se le notificará cuando su pedido esté listo\n";
        $prompt .= "6. Ofrece disponibilidad para cualquier consulta\n";
        $prompt .= "7. Usa emojis de forma moderada y profesional (máximo 2-3)\n";
        $prompt .= "8. El mensaje debe ser CORTO (máximo 600 caracteres)\n";
        $prompt .= "9. Usa formato WhatsApp: *negritas*, _cursivas_ si es necesario\n";
        $prompt .= "10. NO uses HTML ni código\n";
        $prompt .= "11. El tono debe transmitir confianza y cercanía\n\n";
        $prompt .= "12. Indicale que puede revisar también el estatus de su orden en optirango.com\n";
        
        $prompt .= "Genera SOLO el mensaje, sin introducción ni explicación adicional.";

        return $prompt;
    }

    /**
     * Mensaje predeterminado de bienvenida
     */
    protected function mensajePredeterminadoBienvenida(array $datos): string
    {
        $nombrePaciente = $datos['nombre_paciente'] ?? 'Cliente';
        $numeroOrden = $datos['numero_orden'] ?? 'N/A';

        $mensaje = "👋 *¡Bienvenido/a a Optirango!*\n\n";
        $mensaje .= "Estimado/a *{$nombrePaciente}*,\n\n";
        $mensaje .= "Le damos la bienvenida y agradecemos su confianza. Su orden ha sido registrada exitosamente:\n\n";
        $mensaje .= "📋 *Orden:* {$numeroOrden}\n\n";
        $mensaje .= "Le notificaremos cuando su pedido esté listo para retirar. Si tiene alguna consulta, estamos a su disposición.\n\n";
        $mensaje .= "_Optirango - Cuidamos tu visión_";

        return $mensaje;
    }

    /**
     * Genera un mensaje de notificación cuando la orden está lista
     * 
     * @param array $datosOrden Información de la orden lista
     * @return array
     */
    public function generarMensajeOrdenLista(array $datosOrden): array
    {
        // Si no está configurada la API, usar mensaje predeterminado
        if (!$this->isConfigured()) {
            Log::warning('Groq API no configurada. Variable GROQ_API_KEY no encontrada en .env');
            
            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoOrdenLista($datosOrden),
                'es_ia' => false,
                'motivo' => 'API no configurada',
            ];
        }

        try {
            $prompt = $this->construirPromptOrdenLista($datosOrden);
            
            $response = $this->llamarGroqAPI($prompt);
            
            if (!$response['success']) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoOrdenLista($datosOrden),
                    'es_ia' => false,
                    'motivo' => 'Error en API',
                ];
            }

            $mensaje = trim($response['contenido']);
            
            // Si el mensaje es muy largo, usar predeterminado
            if (strlen($mensaje) > 1000) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoOrdenLista($datosOrden),
                    'es_ia' => false,
                    'motivo' => 'Mensaje muy largo',
                ];
            }

            return [
                'success' => true,
                'mensaje' => $mensaje,
                'tokens_usados' => $response['tokens_usados'] ?? 0,
                'es_ia' => true,
            ];

        } catch (\Exception $e) {
            Log::error('Error generando mensaje de orden lista', [
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoOrdenLista($datosOrden),
                'es_ia' => false,
                'motivo' => 'Excepción: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Construye el prompt para el mensaje de orden lista
     */
    protected function construirPromptOrdenLista(array $datos): string
    {
        $nombrePaciente = $datos['nombre_paciente'] ?? 'Cliente';
        $numeroOrden = $datos['numero_orden'] ?? 'N/A';
        $estatus = $datos['estatus'] ?? 'LISTO';
        $fechaEntrega = $datos['fecha_entrega'] ?? null;
        $rutaEntrega = $datos['ruta_entrega'] ?? null;

        $prompt = "Eres un asistente corporativo profesional de una óptica llamada Optirango. ";
        $prompt .= "Genera un mensaje de WhatsApp profesional y entusiasta para notificar que el pedido del cliente está listo.\n\n";
        
        $prompt .= "## INFORMACIÓN DE LA ORDEN\n";
        $prompt .= "- Paciente: {$nombrePaciente}\n";
        $prompt .= "- Número de orden: {$numeroOrden}\n";
        $prompt .= "- Estatus: {$estatus}\n";
        
        if ($fechaEntrega) {
            $prompt .= "- Fecha de entrega: {$fechaEntrega}\n";
        }
        
        if ($rutaEntrega) {
            $prompt .= "- Ruta de entrega: {$rutaEntrega}\n";
        }
        
        $prompt .= "\n## INSTRUCCIONES\n";
        $prompt .= "1. El mensaje debe ser profesional pero entusiasta\n";
        $prompt .= "2. Notifica que su pedido está listo para retirar/entregar\n";
        $prompt .= "3. Incluye el número de orden\n";
        
        if ($fechaEntrega) {
            $prompt .= "4. Menciona la fecha de entrega programada\n";
        }
        
        if ($rutaEntrega) {
            $prompt .= "5. Indica la ruta de entrega si aplica\n";
        }
        
        $prompt .= "6. Invita al cliente a retirar su pedido o confirma la entrega\n";
        $prompt .= "7. Agradece su paciencia y confianza\n";
        $prompt .= "8. Usa emojis de forma moderada (máximo 2-3)\n";
        $prompt .= "9. El mensaje debe ser CORTO (máximo 600 caracteres)\n";
        $prompt .= "10. Usa formato WhatsApp: *negritas*, _cursivas_ si es necesario\n";
        $prompt .= "11. NO uses HTML ni código\n";
        $prompt .= "12. El tono debe ser positivo y generar satisfacción\n\n";
        $prompt .= "13. Indicale que puede revisar también el estatus de su orden en optirango.com\n";
        
        $prompt .= "Genera SOLO el mensaje, sin introducción ni explicación adicional.";

        return $prompt;
    }

    /**
     * Mensaje predeterminado de orden lista
     */
    protected function mensajePredeterminadoOrdenLista(array $datos): string
    {
        $nombrePaciente = $datos['nombre_paciente'] ?? 'Cliente';
        $numeroOrden = $datos['numero_orden'] ?? 'N/A';
        $estatus = $datos['estatus'] ?? 'LISTO';
        $fechaEntrega = $datos['fecha_entrega'] ?? null;

        $mensaje = "✅ *¡Buenas noticias!*\n\n";
        $mensaje .= "Estimado/a *{$nombrePaciente}*,\n\n";
        $mensaje .= "Su pedido está *{$estatus}*:\n\n";
        $mensaje .= "📋 *Orden:* {$numeroOrden}\n";
        
        if ($fechaEntrega) {
            $mensaje .= "📅 *Fecha de entrega:* {$fechaEntrega}\n";
        }
        
        $mensaje .= "\nPuede pasar a retirar su pedido. Agradecemos su confianza en Optirango.\n\n";
        $mensaje .= "_Optirango - La Claridad Que Tus Ojos Merecen _";

        return $mensaje;
    }

    /**
     * Genera un mensaje de bienvenida para una nueva orden
     * 
     * @param array $datosOrden Información de la orden creada
     * @return array
     */
    public function generarMensajeBienvenidaRefractante(array $datosOrden): array
    {
        // Si no está configurada la API, usar mensaje predeterminado
        if (!$this->isConfigured()) {
            Log::warning('Groq API no configurada. Variable GROQ_API_KEY no encontrada en .env');
            
            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoBienvenidaRefractante($datosOrden),
                'es_ia' => false,
                'motivo' => 'API no configurada',
            ];
        }

        try {
            $prompt = $this->construirPromptBienvenidaRefractante($datosOrden);
            
            $response = $this->llamarGroqAPI($prompt);
            
            if (!$response['success']) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoBienvenidaRefractante($datosOrden),
                    'es_ia' => false,
                    'motivo' => 'Error en API',
                ];
            }

            $mensaje = trim($response['contenido']);
            
            // Si el mensaje es muy largo (WhatsApp tiene límite), usar predeterminado
            if (strlen($mensaje) > 1000) {
                return [
                    'success' => true,
                    'mensaje' => $this->mensajePredeterminadoBienvenidaRefractante($datosOrden),
                    'es_ia' => false,
                    'motivo' => 'Mensaje muy largo',
                ];
            }

            return [
                'success' => true,
                'mensaje' => $mensaje,
                'tokens_usados' => $response['tokens_usados'] ?? 0,
                'es_ia' => true,
            ];

        } catch (\Exception $e) {
            Log::error('Error generando mensaje de bienvenida refractante', [
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => true,
                'mensaje' => $this->mensajePredeterminadoBienvenidaRefractante($datosOrden),
                'es_ia' => false,
                'motivo' => 'Excepción: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Construye el prompt para el mensaje de bienvenida
     */
    protected function construirPromptBienvenidaRefractante(array $datos): string
    {
        $nombreRefractante = $datos['nombre_refractante'] ?? 'Refractante';
        $telefono = $datos['telefono'] ?? 'N/A';
        $fechaNacimiento = $datos['fecha_nacimiento'] ?? null;
        $genero = $datos['genero'] ?? null;

        $prompt = "Eres un asistente corporativo profesional de una óptica llamada Optirango. ";
        $prompt .= "Genera un mensaje de WhatsApp cálido, profesional y acogedor para dar la bienvenida a un nuevo refractante (paciente atendido pero no ha realizado una orden, es un cliente potencial).\n\n";
        
        $prompt .= "## INFORMACIÓN DEL REFRACTANTE\n";
        $prompt .= "- Paciente: {$nombreRefractante}\n";
        $prompt .= "- Teléfono: {$telefono}\n";
        $prompt .= "- Fecha de nacimiento: {$fechaNacimiento}\n";
        $prompt .= "- Genero: {$genero}\n\n";
        
        $prompt .= "## INSTRUCCIONES\n";
        $prompt .= "1. El mensaje debe ser profesional, cálido y cercano\n";
        $prompt .= "2. Da la bienvenida y agradece la confianza en Optirango\n";
        $prompt .= "3. Ofrece disponibilidad para cualquier consulta\n";
        $prompt .= "4. Usa emojis de forma moderada y profesional (máximo 2-3)\n";
        $prompt .= "5. El mensaje debe ser CORTO (máximo 600 caracteres)\n";
        $prompt .= "6. Usa formato WhatsApp: *negritas*, _cursivas_ si es necesario\n";
        $prompt .= "7. NO uses HTML ni código\n";
        $prompt .= "8. El tono debe transmitir confianza y cercanía\n\n";
        
        $prompt .= "Genera SOLO el mensaje, sin introducción ni explicación adicional.";

        return $prompt;
    }

    /**
     * Mensaje predeterminado de bienvenida
     */
    protected function mensajePredeterminadoBienvenidaRefractante(array $datos): string
    {
        $nombreRefractante = $datos['nombre_refractante'] ?? 'Refractante';
        $telefono = $datos['telefono'] ?? 'N/A';
        $fechaNacimiento = $datos['fecha_nacimiento'] ?? null;
        $genero = $datos['genero'] ?? null;

        $mensaje = "👋 *¡Bienvenido/a a Optirango!*\n\n";
        $mensaje .= "Estimado/a *{$nombreRefractante}*,\n\n";
        $mensaje .= "Le damos la bienvenida y agradecemos su confianza. Si tiene alguna consulta, estamos a su disposición.\n\n";
        $mensaje .= "📞 *Teléfono:* {$telefono}\n";
        $mensaje .= "📅 *Fecha de nacimiento:* {$fechaNacimiento}\n";
        $mensaje .= "👤 *Genero:* {$genero}\n\n";
        $mensaje .= "_Optirango - Cuidamos tu visión_";

        return $mensaje;
    }
}

