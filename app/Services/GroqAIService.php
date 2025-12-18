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
     * Genera un informe médico completo usando Groq AI
     */
    public function generarInformeMedico(array $datosPaciente, string $motivoConsulta): array
    {
        // Verificar si está configurada la API
        if (!$this->isConfigured()) {
            Log::warning('Groq API no configurada. Variable GROQ_API_KEY no encontrada en .env');
            
            return [
                'success' => false,
                'error' => 'El servicio de IA no está configurado. Por favor, configure GROQ_API_KEY en el archivo .env',
                'contenido' => null,
            ];
        }

        try {
            $prompt = $this->construirPromptInformeMedico($datosPaciente, $motivoConsulta);
            
            $response = $this->llamarGroqAPI($prompt);
            
            if (!$response['success']) {
                return [
                    'success' => false,
                    'error' => $response['error'],
                    'contenido' => null,
                ];
            }

            return [
                'success' => true,
                'contenido' => $response['contenido'],
                'tokens_usados' => $response['tokens_usados'] ?? 0,
                'modelo' => $this->model,
            ];

        } catch (\Exception $e) {
            Log::error('Error generando informe médico con Groq', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'error' => 'Error al conectar con el servicio de IA: ' . $e->getMessage(),
                'contenido' => null,
            ];
        }
    }

    /**
     * Construye el prompt para el informe médico
     */
    protected function construirPromptInformeMedico(array $datos, string $motivoConsulta): string
    {
        $paciente = $datos['datos_paciente'];
        $agudeza = $datos['agudeza_visual'];
        $evaluacionMotora = $datos['evaluacion_motora'];
        $examenExterno = $datos['examen_externo'];
        $antecedentes = $datos['antecedentes'];

        $prompt = "Eres un médico oftalmólogo especialista con amplia experiencia. Genera un informe médico completo, profesional y detallado en formato HTML (sin las etiquetas <html>, <body>, solo el contenido interno) basado en los siguientes datos del paciente:\n\n";

        $prompt .= "## INFORMACIÓN DEL PACIENTE\n";
        $prompt .= "Nombre: {$paciente['nombre_completo']}\n";
        $prompt .= "Edad: {$paciente['edad']} años\n";
        $prompt .= "Género: {$paciente['genero']}\n";
        $prompt .= "Documento: {$paciente['documento']}\n\n";

        $prompt .= "## MOTIVO DE CONSULTA\n";
        $prompt .= $motivoConsulta . "\n\n";

        // Antecedentes
        if ($antecedentes['tiene_datos']) {
            $prompt .= "## ANTECEDENTES MÉDICOS\n";
            
            if (isset($antecedentes['categorizados'])) {
                foreach ($antecedentes['categorizados'] as $categoria => $items) {
                    $prompt .= "### $categoria\n";
                    foreach ($items as $item) {
                        if ($item['es_positivo']) {
                            $prompt .= "- {$item['nombre']}";
                            if ($item['detalles']) {
                                $prompt .= ": {$item['detalles']}";
                            }
                            $prompt .= "\n";
                        }
                    }
                }
            }
            $prompt .= "\n";
        }

        // Agudeza Visual
        if ($agudeza['tiene_datos']) {
            $prompt .= "## AGUDEZA VISUAL\n";
            $ultima = $agudeza['ultima_evaluacion'];
            $prompt .= "Fecha de evaluación: {$ultima['fecha']}\n\n";
            
            $prompt .= "### Visión de Lejos:\n";
            $prompt .= "**OD (Ojo Derecho):**\n";
            $prompt .= "- Sin corrección: {$ultima['vision_lejos']['od']['sin_correccion']}\n";
            $prompt .= "- Con corrección: {$ultima['vision_lejos']['od']['con_correccion']}\n";
            $prompt .= "**OI (Ojo Izquierdo):**\n";
            $prompt .= "- Sin corrección: {$ultima['vision_lejos']['oi']['sin_correccion']}\n";
            $prompt .= "- Con corrección: {$ultima['vision_lejos']['oi']['con_correccion']}\n\n";

            $prompt .= "### Visión de Cerca:\n";
            $prompt .= "**OD:** SC: {$ultima['vision_cerca']['od']['sin_correccion']}, CC: {$ultima['vision_cerca']['od']['con_correccion']}\n";
            $prompt .= "**OI:** SC: {$ultima['vision_cerca']['oi']['sin_correccion']}, CC: {$ultima['vision_cerca']['oi']['con_correccion']}\n\n";
        }

        // Examen Externo
        if ($examenExterno['tiene_datos']) {
            $prompt .= "## EXAMEN EXTERNO\n";
            $prompt .= "Fecha: {$examenExterno['fecha']}\n";
            $prompt .= "**Postura:** {$examenExterno['postura']['corporal']} / {$examenExterno['postura']['cabeza']}\n";
            $prompt .= "**Párpados OD/OI:** {$examenExterno['parpados']['od']} / {$examenExterno['parpados']['oi']}\n";
            $prompt .= "**Conjuntiva OD/OI:** {$examenExterno['conjuntiva']['od']} / {$examenExterno['conjuntiva']['oi']}\n";
            $prompt .= "**Córnea OD/OI:** {$examenExterno['cornea']['od']} / {$examenExterno['cornea']['oi']}\n";
            $prompt .= "**Iris OD/OI:** {$examenExterno['iris']['od']} / {$examenExterno['iris']['oi']}\n";
            $prompt .= "**Pupilas OD/OI:** {$examenExterno['pupilas']['od']} / {$examenExterno['pupilas']['oi']}\n\n";
        }

        // Evaluación Motora
        if ($evaluacionMotora['tiene_datos']) {
            $prompt .= "## EVALUACIÓN MOTORA\n";
            $prompt .= "Fecha: {$evaluacionMotora['fecha_evaluacion']}\n";
            $prompt .= "Estado: {$evaluacionMotora['estado']}\n\n";

            // Motilidad Ocular
            if ($evaluacionMotora['motilidad_ocular']['tiene_datos']) {
                $motilidad = $evaluacionMotora['motilidad_ocular'];
                $prompt .= "### Motilidad Ocular (9 posiciones de mirada)\n";
                
                if ($motilidad['resumen']['hay_hallazgos_anormales']) {
                    $prompt .= "**Hallazgos anormales en:** " . implode(', ', $motilidad['resumen']['posiciones_con_hallazgos']) . "\n";
                } else {
                    $prompt .= "Motilidad ocular normal en todas las posiciones.\n";
                }
                $prompt .= "\n";
            }

            // Cover Test
            if ($evaluacionMotora['cover_tests']['tiene_datos']) {
                $coverTests = $evaluacionMotora['cover_tests'];
                $prompt .= "### Cover Test\n";
                
                foreach ($coverTests['tests_realizados'] as $test) {
                    $prompt .= "**{$test['tipo_test']}** a {$test['distancia']}:\n";
                    $prompt .= "- OD: {$test['ojo_derecho']['resultado']}\n";
                    $prompt .= "- OI: {$test['ojo_izquierdo']['resultado']}\n";
                    
                    if ($test['tiene_desviacion']) {
                        $prompt .= "- Desviación: {$test['magnitud_desviacion']} {$test['unidad_medida']}\n";
                    }
                }
                $prompt .= "\n";
            }

            // Punto Próximo de Convergencia
            if ($evaluacionMotora['punto_proximo_convergencia']['tiene_datos']) {
                $ppc = $evaluacionMotora['punto_proximo_convergencia'];
                $prompt .= "### Punto Próximo de Convergencia (PPC)\n";
                $prompt .= "- Medición: {$ppc['medicion_cm']} cm\n";
                $prompt .= "- Clasificación: {$ppc['interpretacion']}\n";
                
                if ($ppc['sintomas']['tiene_sintomas']) {
                    $prompt .= "- Síntomas: " . implode(', ', $ppc['sintomas']['lista']) . "\n";
                }
                $prompt .= "\n";
            }

            // Test de Hirschberg
            if ($evaluacionMotora['test_hirschberg']['tiene_datos']) {
                $hirsch = $evaluacionMotora['test_hirschberg'];
                $prompt .= "### Test de Hirschberg\n";
                $prompt .= "- Estado: {$hirsch['estado']}\n";
                
                if ($hirsch['tiene_desviacion']) {
                    $prompt .= "- OD: {$hirsch['ojo_derecho']['tipo_desviacion']} ({$hirsch['ojo_derecho']['desviacion_estimada']})\n";
                    $prompt .= "- OI: {$hirsch['ojo_izquierdo']['tipo_desviacion']} ({$hirsch['ojo_izquierdo']['desviacion_estimada']})\n";
                }
                $prompt .= "\n";
            }

            // Reflejo Pupilar
            if ($evaluacionMotora['reflejo_pupilar']['tiene_datos']) {
                $reflejo = $evaluacionMotora['reflejo_pupilar'];
                $prompt .= "### Reflejos Pupilares\n";
                $prompt .= "**Reflejo Directo:** OD: {$reflejo['reflejo_directo']['od']}, OI: {$reflejo['reflejo_directo']['oi']}\n";
                $prompt .= "**Reflejo Consensual:** OD: {$reflejo['reflejo_consensual']['od']}, OI: {$reflejo['reflejo_consensual']['oi']}\n";
                $prompt .= "**Tamaño Pupilar en Luz:** OD: {$reflejo['tamano_pupilar']['od_luz']}mm, OI: {$reflejo['tamano_pupilar']['oi_luz']}mm\n";
                
                if ($reflejo['anisocoria']['presente']) {
                    $prompt .= "**Anisocoria:** Presente ({$reflejo['anisocoria']['diferencia_mm']}mm)\n";
                }
                $prompt .= "\n";
            }
        }

        // Órdenes de lentes previas
        if (isset($datos['ordenes_lentes']) && $datos['ordenes_lentes']['tiene_datos']) {
            $orden = $datos['ordenes_lentes']['ultima_orden'];
            $prompt .= "## PRESCRIPCIÓN ACTUAL DE LENTES\n";
            $prompt .= "Tipo: {$orden['tipo']}\n";
            $prompt .= "OD: Esf {$orden['ojo_derecho']['esfera']} Cil {$orden['ojo_derecho']['cilindro']} Eje {$orden['ojo_derecho']['eje']}\n";
            $prompt .= "OI: Esf {$orden['ojo_izquierdo']['esfera']} Cil {$orden['ojo_izquierdo']['cilindro']} Eje {$orden['ojo_izquierdo']['eje']}\n";
            $prompt .= "DP: {$orden['distancia_pupilar']}\n\n";
        }

        $prompt .= "\n## INSTRUCCIONES PARA EL INFORME\n";
        $prompt .= "Genera un informe médico oftalmológico completo y profesional que incluya:\n\n";
        $prompt .= "1. **Resumen de la consulta**: Breve descripción del motivo y hallazgos principales\n";
        $prompt .= "2. **Diagnóstico**: Diagnóstico clínico basado en los hallazgos (mínimo 2-3 párrafos detallados)\n";
        $prompt .= "3. **Plan de tratamiento**: Recomendaciones terapéuticas específicas\n";
        $prompt .= "4. **Recomendaciones**: Consejos para el paciente\n";
        $prompt .= "5. **Seguimiento**: Indicaciones de control\n\n";
        $prompt .= "IMPORTANTE:\n";
        $prompt .= "- Usa terminología médica profesional pero comprensible\n";
        $prompt .= "- Sé específico con los hallazgos y correlaciónalos con los datos\n";
        $prompt .= "- El diagnóstico debe ser coherente con los datos presentados\n";
        $prompt .= "- Usa formato HTML con etiquetas <h2>, <h3>, <p>, <ul>, <li>, <strong>, etc.\n";
        $prompt .= "- NO incluyas etiquetas <html>, <head>, o <body>, solo el contenido\n";
        $prompt .= "- Incluye estilos inline si es necesario para mejorar la presentación\n";

        return $prompt;
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
                            'content' => 'Eres un médico oftalmólogo especialista con amplia experiencia en diagnóstico y tratamiento de patologías oculares. Genera informes médicos profesionales, detallados y estructurados.'
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
     * Mejora o regenera una sección del informe
     */
    public function mejorarSeccion(string $seccion, string $contexto): array
    {
        $prompt = "Eres un médico oftalmólogo experto. Mejora la siguiente sección del informe médico:\n\n";
        $prompt .= "SECCIÓN ACTUAL:\n{$seccion}\n\n";
        $prompt .= "CONTEXTO:\n{$contexto}\n\n";
        $prompt .= "Genera una versión mejorada de esta sección en formato HTML, más detallada y profesional.";

        return $this->llamarGroqAPI($prompt);
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
        $prompt .= "10. El tono debe ser de una clínica médica profesional\n\n";
        
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
}

