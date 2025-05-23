@extends('landing.app.app')

@section('title', 'Política de WhatsApp Business - OPTIRANGO')
@section('meta_description', 'Política de uso de WhatsApp Business de OPTIRANGO. Información sobre cómo utilizamos WhatsApp para comunicarnos contigo y tus derechos como usuario.')
@section('meta_keywords', 'WhatsApp Business, mensajería, política, opt-in, opt-out, comunicación, OPTIRANGO')

@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <div class="text-center mb-5">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2 mb-4" alt="Logo Optirango" height="180">
                </a>
                <h1 class="text-body-emphasis">POLÍTICA DE USO DE WHATSAPP BUSINESS</h1>
                <h4 class="text-body-emphasis mb-4">Última actualización: 20/05/2025</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <section class="mb-5">
                        <h2 class="h4 mb-4">INTRODUCCIÓN</h2>
                        <p class="mb-4">
                            En OPTIRANGO, C.A., utilizamos WhatsApp Business como canal de comunicación con nuestros clientes, cumpliendo con los Términos de Servicio de WhatsApp Business y la Política de Mensajería Empresarial de WhatsApp. Este documento explica cómo utilizamos WhatsApp, cómo obtenemos tu consentimiento, y tus derechos respecto a nuestras comunicaciones.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">TIPOS DE MENSAJES</h2>
                        <p class="mb-4">
                            A través de WhatsApp Business, podemos enviarte los siguientes tipos de mensajes:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• <strong>Mensajes de servicio:</strong> Información sobre tus pedidos, citas, estado de tus lentes, y otros servicios que hayas solicitado</li>
                            <li class="mb-2">• <strong>Mensajes de atención al cliente:</strong> Respuestas a tus consultas y solicitudes de asistencia</li>
                            <li class="mb-2">• <strong>Mensajes informativos:</strong> Avisos sobre cambios en nuestros servicios o políticas</li>
                            <li class="mb-2">• <strong>Mensajes promocionales:</strong> Ofertas y promociones especiales (solo si has dado tu consentimiento específico para este tipo de mensajes)</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">CÓMO OBTENEMOS TU CONSENTIMIENTO</h2>
                        <p class="mb-3">
                            En cumplimiento con las políticas de WhatsApp Business y la normativa de protección de datos, obtenemos tu consentimiento explícito antes de enviarte mensajes a través de WhatsApp. Las formas en las que podemos obtener tu consentimiento incluyen:
                        </p>
                        <div class="card mb-4">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">1</span>
                                            <div>
                                                <strong>Formularios en nuestra web o tienda física</strong><br>
                                                Marcando la casilla específica que autoriza la comunicación por WhatsApp
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">2</span>
                                            <div>
                                                <strong>Iniciando una conversación</strong><br>
                                                Cuando tú inicias una conversación con nosotros a través de WhatsApp
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">3</span>
                                            <div>
                                                <strong>Verificación telefónica</strong><br>
                                                Cuando confirmas verbalmente tu deseo de recibir comunicaciones por WhatsApp
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle me-2"></i>
                            <strong>Importante:</strong> Nunca enviaremos mensajes a través de WhatsApp sin tu consentimiento previo, y solo utilizaremos el número de teléfono que nos hayas proporcionado.
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">TUS DERECHOS Y CÓMO CANCELAR</h2>
                        <p class="mb-3">
                            Respetamos tu derecho a decidir cómo te comunicamos contigo. Puedes cancelar tu suscripción a nuestros mensajes de WhatsApp en cualquier momento mediante los siguientes métodos:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Respondiendo "CANCELAR" o "STOP" a cualquiera de nuestros mensajes</li>
                            <li class="mb-2">• Enviando un correo electrónico a admin@optirango.com con el asunto "Cancelar WhatsApp"</li>
                            <li class="mb-2">• Llamando a nuestro número de servicio al cliente +584241841649</li>
                            <li class="mb-2">• Visitando nuestra tienda y solicitándolo personalmente</li>
                        </ul>
                        <p class="mb-4">
                            Una vez recibida tu solicitud, dejaremos de enviarte mensajes a través de WhatsApp en un plazo máximo de 72 horas.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">PROTECCIÓN DE DATOS EN WHATSAPP</h2>
                        <p class="mb-3">
                            Toda la información compartida a través de WhatsApp está protegida por:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Acceso restringido solo a personal autorizado</li>
                            <li class="mb-2">• Almacenamiento seguro y cifrado</li>
                            <li class="mb-2">• No compartimos tus conversaciones o información con terceros sin tu consentimiento explícito</li>
                            <li class="mb-2">• Aplicamos las mismas medidas de seguridad descritas en nuestra <a href="{{ url('/politica-privacidad') }}">política de privacidad</a></li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">CALIDAD DEL SERVICIO</h2>
                        <p class="mb-4">
                            Para garantizar una experiencia de calidad en nuestras comunicaciones por WhatsApp:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Respondemos a tus mensajes en un plazo máximo de 24 horas en días laborables</li>
                            <li class="mb-2">• Utilizamos un lenguaje claro y respetuoso</li>
                            <li class="mb-2">• Enviamos mensajes en horarios razonables (de 8:00 AM a 7:00 PM)</li>
                            <li class="mb-2">• Limitamos el número de mensajes promocionales para evitar comunicaciones excesivas</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">CONTACTO PARA CONSULTAS</h2>
                        <p class="mb-4">Para cualquier consulta relacionada con nuestra política de uso de WhatsApp Business:</p>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-2"><strong>Nombre del Negocio:</strong> OPTIRANGO, C.A.</p>
                                <p class="mb-2"><strong>Representante:</strong> DUBERLYS NATHALY SANCHEZ QUINTERO</p>
                                <p class="mb-2"><strong>RIF:</strong> 20428744</p>
                                <p class="mb-2"><strong>Correo electrónico:</strong> admin@optirango.com</p>
                                <p class="mb-2"><strong>Teléfono:</strong> +584241841649</p>
                                <p class="mb-2"><strong>Dirección:</strong> Avenida Urdaneta, Esquinas de Ibarras a Pelota, Centro Profesional Urdaneta, Piso 7, Oficina 7-D, Parroquia Altagracia, Distrito Capital, Caracas 1030, Venezuela</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/') }}" class="btn btn-primary px-4 me-2">
                    <i class="fa fa-home me-2"></i>Inicio
                </a>
                <a href="{{ url('/politica-privacidad') }}" class="btn btn-secondary px-4">
                    <i class="fa fa-lock me-2"></i>Política de Privacidad
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush 