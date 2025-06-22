@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-5xl tw-mx-auto tw-relative tw-p-8 sm:tw-p-12 tw-bg-white tw-border-2 tw-border-dashed tw-border-gray-300 tw-rounded-3xl tw-text-center">
            <div class="tw-flex tw-justify-center tw-mb-8">
                <img src="{{ asset('storage/img/logo_h.png') }}" class="tw-h-44 tw-object-contain" alt="Logo Optirango">
            </div>
            
            <h1 class="tw-text-4xl tw-font-bold tw-text-gray-900 tw-mb-8">Verificación de Facebook</h1>
            
            <div class="tw-max-w-2xl tw-mx-auto tw-mb-8">
                <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                    ¡Hola! Mi nombre es <strong class="tw-text-gray-900">Duberlys Sanchez</strong> soy dueña del negocio <strong class="tw-text-gray-900">OPTIRANGO, C.A.</strong> Somos una óptica comprometida con la salud visual de nuestros clientes, ofreciendo servicios profesionales y productos de alta calidad.
                    Deseo verificar mi cuenta de administrador comercial con numero de identificación <strong class="tw-text-gray-900">950812703335736</strong>
                </p>
            </div>

            <div class="tw-max-w-2xl tw-mx-auto tw-mb-8">
                <p class="tw-text-lg tw-text-gray-600">
                    Anexo la información para completar mi solicitud:
                </p>
            </div>

            <div class="tw-max-w-2xl tw-mx-auto tw-mb-12 tw-bg-white tw-rounded-xl tw-shadow-lg">
                <div class="tw-p-8 tw-space-y-4">
                    <div class="tw-grid tw-grid-cols-1 tw-gap-4 tw-text-left">
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">Nombre:</strong>
                            <span class="tw-text-gray-600">DUBERLYS NATHALY SANCHEZ QUINTERO</span>
                        </p>
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">IDENTIFICACIÓN FISCAL (RIF):</strong>
                            <span class="tw-text-gray-600">20428744</span>
                        </p>
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">Correo electrónico:</strong>
                            <span class="tw-text-gray-600">admin@optirango.com</span>
                        </p>
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">Teléfono:</strong>
                            <span class="tw-text-gray-600">+584241841649</span>
                        </p>
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">Dirección:</strong>
                            <span class="tw-text-gray-600">Avenida Urdaneta, Esquinas de Ibarras a Pelota, Centro Profesional Urdaneta, Piso 7, Oficina 7-D, Parroquia Altagracia, Distrito Capital, Caracas 1030, Venezuela</span>
                        </p>
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">Nombre del Negocio:</strong>
                            <span class="tw-text-gray-600">OPTIRANGO, C.A.</span>
                        </p>
                        <p class="tw-mb-2">
                            <strong class="tw-text-gray-900 tw-block tw-mb-1">Id del Administrador Comercial:</strong>
                            <span class="tw-text-gray-600">950812703335736</span>
                        </p>
                    </div>
                </div>
            </div>

            <section class="tw-max-w-2xl tw-mx-auto tw-mb-12">
                <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-6">USO DE WHATSAPP BUSINESS</h2>
                <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed tw-mb-8">
                    En OPTIRANGO, C.A., utilizamos WhatsApp Business como canal de comunicación con nuestros clientes. Al proporcionarnos tu número de teléfono y darnos tu consentimiento explícito, aceptas recibir mensajes a través de WhatsApp relacionados con nuestros productos y servicios.
                </p>
                
                <div class="tw-text-center tw-mb-8">
                    <a href="{{ url('/politica-whatsapp') }}" class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                        <i class="fa-brands fa-whatsapp tw-mr-3"></i>Ver política completa de WhatsApp Business
                    </a>
                </div>
                
                <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed tw-mb-8">
                    Para más información detallada sobre cómo utilizamos WhatsApp Business, cómo obtenemos tu consentimiento, tus derechos, formas de cancelación y protección de datos en WhatsApp, por favor consulta nuestra política específica de WhatsApp Business a través del enlace anterior.
                </p>

                <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg">
                    <div class="tw-flex tw-gap-4">
                        <div class="tw-flex-shrink-0">
                            <i class="fa fa-info-circle tw-text-2xl tw-text-blue-600"></i>
                        </div>
                        <div class="tw-text-gray-600">
                            Utilizamos WhatsApp Business en cumplimiento con los Términos de Servicio de WhatsApp Business y la Política de Mensajería Empresarial de WhatsApp.
                        </div>
                    </div>
                </div>
            </section>
            
            <a href="{{ url('/') }}" class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                <i class="fas fa-home tw-mr-3"></i>Inicio
            </a>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
