@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-5xl tw-mx-auto tw-relative tw-p-8 sm:tw-p-12 tw-bg-white tw-border-2 tw-border-dashed tw-border-gray-300 tw-rounded-3xl">
            <div class="tw-text-center tw-mb-16">
                <div class="tw-flex tw-justify-center tw-mb-8">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="tw-h-44 tw-object-contain" alt="Logo Optirango">
                </div>
                <h1 class="tw-text-4xl tw-font-bold tw-text-gray-900 tw-mb-4">POLÍTICA DE PRIVACIDAD</h1>
                <h4 class="tw-text-xl tw-text-gray-700">Última actualización: 20/05/2025</h4>
            </div>

            <div class="tw-max-w-4xl tw-mx-auto">
                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">1. INFORMACIÓN GENERAL</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">
                        En OPTIRANGO, C.A., nos comprometemos a proteger y respetar tu privacidad. Esta política describe cómo recopilamos, utilizamos y protegemos tu información personal cuando:
                    </p>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Visitas nuestra tienda física</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Utilizas nuestro sitio web</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Te realizas exámenes visuales</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Adquieres productos o servicios</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Te registras para planes de crédito</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">2. INFORMACIÓN QUE RECOPILAMOS</h2>
                    
                    <div class="tw-space-y-8">
                        <div>
                            <h3 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">2.1 Datos personales:</h3>
                            <ul class="tw-space-y-3 tw-ml-6">
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Nombre completo</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Dirección</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Número de teléfono</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Correo electrónico</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Fecha de nacimiento</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Identificación oficial</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">2.2 Información médica:</h3>
                            <ul class="tw-space-y-3 tw-ml-6">
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Historial médico visual</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Resultados de exámenes visuales</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Prescripciones ópticas</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Medidas y parámetros visuales</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">2.3 Información financiera:</h3>
                            <ul class="tw-space-y-3 tw-ml-6">
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Datos necesarios para procesar pagos</span>
                                </li>
                                <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                                    <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                                    <span>Información para planes de crédito</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">3. USO DE LA INFORMACIÓN</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">Utilizamos tu información para:</p>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Proporcionar servicios de optometría</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Gestionar tu historial clínico</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Procesar tus pedidos de lentes y monturas</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Gestionar planes de pago y crédito</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Enviarte recordatorios de citas</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Informarte sobre promociones y servicios</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Cumplir con obligaciones legales y regulatorias</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">4. PROTECCIÓN DE DATOS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">Implementamos medidas de seguridad para proteger tu información:</p>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Almacenamiento seguro de datos</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Acceso restringido a información sensible</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Sistemas de seguridad informática</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Capacitación de personal en protección de datos</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">5. COMPARTIR INFORMACIÓN</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">Podemos compartir tu información con:</p>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Laboratorios ópticos (para fabricación de lentes)</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Proveedores de servicios de pago</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Entidades financieras (para planes de crédito)</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Autoridades competentes cuando sea legalmente requerido</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">6. TUS DERECHOS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">Tienes derecho a:</p>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Acceder a tu información personal</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Corregir datos inexactos</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Solicitar la eliminación de tus datos</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Limitar el procesamiento de tu información</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Recibir una copia de tus datos</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Presentar una queja ante las autoridades de protección de datos</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">7. FACEBOOK Y REDES SOCIALES</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">
                        En OPTIRANGO, C.A., utilizamos Facebook y otras redes sociales para interactuar con nuestros clientes y proporcionar un mejor servicio. Al seguirnos o interactuar con nuestras redes sociales, es importante que conozcas cómo manejamos la información en estas plataformas.
                    </p>
                    
                    <div class="tw-text-center tw-mb-8">
                        <a href="{{ url('/facebook') }}" class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                            <i class="fab fa-facebook tw-mr-3"></i>Ver política de Facebook
                        </a>
                    </div>
                    
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">
                        Para obtener información detallada sobre cómo utilizamos Facebook, cómo manejamos tu información en esta plataforma, y tus derechos como usuario, por favor consulta nuestra política específica de Facebook a través del enlace anterior.
                    </p>

                    <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg">
                        <div class="tw-flex tw-gap-4">
                            <div class="tw-flex-shrink-0">
                                <i class="fa fa-info-circle tw-text-2xl tw-text-blue-600"></i>
                            </div>
                            <p class="tw-text-gray-600">
                                Nuestra presencia en Facebook cumple con las Políticas de la Plataforma de Facebook y los Términos de Servicio para Empresas.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">8. USO DE WHATSAPP BUSINESS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">
                        En OPTIRANGO, C.A., utilizamos WhatsApp Business como canal de comunicación con nuestros clientes. Al proporcionarnos tu número de teléfono y darnos tu consentimiento explícito, aceptas recibir mensajes a través de WhatsApp relacionados con nuestros productos y servicios.
                    </p>
                    
                    <div class="tw-text-center tw-mb-8">
                        <a href="{{ url('/politica-whatsapp') }}" class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                            <i class="fa-brands fa-whatsapp tw-mr-3"></i>Ver política completa de WhatsApp Business
                        </a>
                    </div>
                    
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">
                        Para más información detallada sobre cómo utilizamos WhatsApp Business, cómo obtenemos tu consentimiento, tus derechos, formas de cancelación y protección de datos en WhatsApp, por favor consulta nuestra política específica de WhatsApp Business a través del enlace anterior.
                    </p>

                    <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg">
                        <div class="tw-flex tw-gap-4">
                            <div class="tw-flex-shrink-0">
                                <i class="fa fa-info-circle tw-text-2xl tw-text-blue-600"></i>
                            </div>
                            <p class="tw-text-gray-600">
                                Utilizamos WhatsApp Business en cumplimiento con los Términos de Servicio de WhatsApp Business y la Política de Mensajería Empresarial de WhatsApp.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">9. ELIMINACIÓN DE DATOS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">
                        En cumplimiento con las normativas de protección de datos y los requisitos de Facebook Developers, hemos establecido un proceso claro para la eliminación de datos personales.
                    </p>
                    <div class="tw-text-center">
                        <a href="{{ url('/politica-eliminacion') }}" class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                            <i class="fa fa-trash tw-mr-3"></i>Ver política de eliminación de datos
                        </a>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">10. COOKIES Y TECNOLOGÍAS SIMILARES</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">Si utilizamos un sitio web, empleamos cookies para:</p>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Mejorar la experiencia del usuario</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Analizar el uso del sitio</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Personalizar contenido</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Gestionar sesiones</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">11. CAMBIOS EN LA POLÍTICA</h2>
                    <p class="tw-text-lg tw-text-gray-600">Nos reservamos el derecho de actualizar esta política cuando sea necesario. Te notificaremos cualquier cambio significativo.</p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">12. CONTACTO</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">Para ejercer tus derechos o realizar consultas sobre esta política:</p>
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg">
                        <div class="tw-p-8 tw-space-y-4">
                            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6">
                                <div>
                                    <p class="tw-mb-4"><strong class="tw-text-gray-900 tw-block tw-mb-1">Nombre del Negocio:</strong> <span class="tw-text-gray-600">OPTIRANGO, C.A.</span></p>
                                    <p class="tw-mb-4"><strong class="tw-text-gray-900 tw-block tw-mb-1">Representante:</strong> <span class="tw-text-gray-600">DUBERLYS NATHALY SANCHEZ QUINTERO</span></p>
                                    <p class="tw-mb-4"><strong class="tw-text-gray-900 tw-block tw-mb-1">RIF:</strong> <span class="tw-text-gray-600">20428744</span></p>
                                </div>
                                <div>
                                    <p class="tw-mb-4"><strong class="tw-text-gray-900 tw-block tw-mb-1">Correo electrónico:</strong> <span class="tw-text-gray-600">admin@optirango.com</span></p>
                                    <p class="tw-mb-4"><strong class="tw-text-gray-900 tw-block tw-mb-1">Teléfono:</strong> <span class="tw-text-gray-600">+584241841649</span></p>
                                </div>
                            </div>
                            <div>
                                <p><strong class="tw-text-gray-900 tw-block tw-mb-1">Dirección:</strong> <span class="tw-text-gray-600">Avenida Urdaneta, Esquinas de Ibarras a Pelota, Centro Profesional Urdaneta, Piso 7, Oficina 7-D, Parroquia Altagracia, Distrito Capital, Caracas 1030, Venezuela</span></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">13. CONSENTIMIENTO</h2>
                    <p class="tw-text-lg tw-text-gray-600">Al proporcionarnos tus datos personales, aceptas esta política de privacidad y autorizas el tratamiento de tu información según lo descrito.</p>
                </section>
            </div>

            <div class="tw-text-center tw-mt-16">
                <a href="{{ url('/') }}" class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                    <i class="fas fa-home tw-mr-3"></i>Inicio
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
