@extends('landing.app.app')

@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <div class="text-center mb-5">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2 mb-4" alt="Logo Optirango" height="180">
                </a>
                <h1 class="text-body-emphasis">POLÍTICA DE PRIVACIDAD</h1>
                <h4 class="text-body-emphasis mb-4">Última actualización: 20/05/2025</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <section class="mb-5">
                        <h2 class="h4 mb-4">1. INFORMACIÓN GENERAL</h2>
                        <p class="mb-4">
                            En OPTIRANGO, C.A., nos comprometemos a proteger y respetar tu privacidad. Esta política describe cómo recopilamos, utilizamos y protegemos tu información personal cuando:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Visitas nuestra tienda física</li>
                            <li class="mb-2">• Utilizas nuestro sitio web</li>
                            <li class="mb-2">• Te realizas exámenes visuales</li>
                            <li class="mb-2">• Adquieres productos o servicios</li>
                            <li class="mb-2">• Te registras para planes de crédito</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">2. INFORMACIÓN QUE RECOPILAMOS</h2>
                        
                        <h3 class="h5 mb-3">2.1 Datos personales:</h3>
                        <ul class="list-unstyled ms-4 mb-4">
                            <li class="mb-2">• Nombre completo</li>
                            <li class="mb-2">• Dirección</li>
                            <li class="mb-2">• Número de teléfono</li>
                            <li class="mb-2">• Correo electrónico</li>
                            <li class="mb-2">• Fecha de nacimiento</li>
                            <li class="mb-2">• Identificación oficial</li>
                        </ul>

                        <h3 class="h5 mb-3">2.2 Información médica:</h3>
                        <ul class="list-unstyled ms-4 mb-4">
                            <li class="mb-2">• Historial médico visual</li>
                            <li class="mb-2">• Resultados de exámenes visuales</li>
                            <li class="mb-2">• Prescripciones ópticas</li>
                            <li class="mb-2">• Medidas y parámetros visuales</li>
                        </ul>

                        <h3 class="h5 mb-3">2.3 Información financiera:</h3>
                        <ul class="list-unstyled ms-4 mb-4">
                            <li class="mb-2">• Datos necesarios para procesar pagos</li>
                            <li class="mb-2">• Información para planes de crédito</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">3. USO DE LA INFORMACIÓN</h2>
                        <p class="mb-3">Utilizamos tu información para:</p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Proporcionar servicios de optometría</li>
                            <li class="mb-2">• Gestionar tu historial clínico</li>
                            <li class="mb-2">• Procesar tus pedidos de lentes y monturas</li>
                            <li class="mb-2">• Gestionar planes de pago y crédito</li>
                            <li class="mb-2">• Enviarte recordatorios de citas</li>
                            <li class="mb-2">• Informarte sobre promociones y servicios</li>
                            <li class="mb-2">• Cumplir con obligaciones legales y regulatorias</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">4. PROTECCIÓN DE DATOS</h2>
                        <p class="mb-3">Implementamos medidas de seguridad para proteger tu información:</p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Almacenamiento seguro de datos</li>
                            <li class="mb-2">• Acceso restringido a información sensible</li>
                            <li class="mb-2">• Sistemas de seguridad informática</li>
                            <li class="mb-2">• Capacitación de personal en protección de datos</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">5. COMPARTIR INFORMACIÓN</h2>
                        <p class="mb-3">Podemos compartir tu información con:</p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Laboratorios ópticos (para fabricación de lentes)</li>
                            <li class="mb-2">• Proveedores de servicios de pago</li>
                            <li class="mb-2">• Entidades financieras (para planes de crédito)</li>
                            <li class="mb-2">• Autoridades competentes cuando sea legalmente requerido</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">6. TUS DERECHOS</h2>
                        <p class="mb-3">Tienes derecho a:</p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Acceder a tu información personal</li>
                            <li class="mb-2">• Corregir datos inexactos</li>
                            <li class="mb-2">• Solicitar la eliminación de tus datos</li>
                            <li class="mb-2">• Limitar el procesamiento de tu información</li>
                            <li class="mb-2">• Recibir una copia de tus datos</li>
                            <li class="mb-2">• Presentar una queja ante las autoridades de protección de datos</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">7. COOKIES Y TECNOLOGÍAS SIMILARES</h2>
                        <p class="mb-3">Si utilizamos un sitio web, empleamos cookies para:</p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Mejorar la experiencia del usuario</li>
                            <li class="mb-2">• Analizar el uso del sitio</li>
                            <li class="mb-2">• Personalizar contenido</li>
                            <li class="mb-2">• Gestionar sesiones</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">8. CAMBIOS EN LA POLÍTICA</h2>
                        <p>Nos reservamos el derecho de actualizar esta política cuando sea necesario. Te notificaremos cualquier cambio significativo.</p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">9. CONTACTO</h2>
                        <p class="mb-4">Para ejercer tus derechos o realizar consultas sobre esta política:</p>
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

                    <section class="mb-5">
                        <h2 class="h4 mb-4">10. CONSENTIMIENTO</h2>
                        <p>Al proporcionarnos tus datos personales, aceptas esta política de privacidad y autorizas el tratamiento de tu información según lo descrito.</p>
                    </section>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/') }}" class="btn btn-primary px-5">
                    <i class="fa fa-home me-2"></i>Inicio
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
