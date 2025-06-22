@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-5xl tw-mx-auto tw-relative tw-p-8 sm:tw-p-12 tw-bg-white tw-border-2 tw-border-dashed tw-border-gray-300 tw-rounded-3xl">
            <div class="tw-text-center tw-mb-16">
                <div class="tw-flex tw-justify-center tw-mb-8">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="tw-h-44 tw-object-contain" alt="Logo Optirango">
                </div>
                <h1 class="tw-text-4xl tw-font-bold tw-text-gray-900 tw-mb-4">POLÍTICA DE ELIMINACIÓN DE DATOS</h1>
                <h4 class="tw-text-xl tw-text-gray-700">Última actualización: 20/05/2025</h4>
            </div>

            <div class="tw-max-w-4xl tw-mx-auto">
                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">INTRODUCCIÓN</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        En OPTIRANGO, C.A., respetamos tu derecho a la privacidad y al control de tus datos personales. Esta política describe el proceso para solicitar la eliminación de tus datos personales de nuestros sistemas, en cumplimiento con las normativas de protección de datos y los requisitos de Facebook Developers.
                    </p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">PROCESO DE ELIMINACIÓN DE DATOS</h2>
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg">
                        <div class="tw-p-8">
                            <h5 class="tw-text-xl tw-font-semibold tw-mb-8">Pasos para solicitar la eliminación de tus datos:</h5>
                            <ol class="tw-space-y-8">
                                <li>
                                    <div class="tw-flex tw-items-start tw-gap-4">
                                        <span class="tw-flex-shrink-0 tw-flex tw-items-center tw-justify-center tw-w-8 tw-h-8 tw-bg-blue-600 tw-text-white tw-rounded-full tw-text-lg tw-font-semibold">1</span>
                                        <div class="tw-flex-1">
                                            <strong class="tw-block tw-text-gray-900 tw-text-lg tw-mb-2">Envía tu solicitud</strong>
                                            <div class="tw-text-gray-600 tw-space-y-1">
                                                <p>Correo electrónico: admin@optirango.com</p>
                                                <p>Asunto: "Solicitud de eliminación de datos"</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="tw-flex tw-items-start tw-gap-4">
                                        <span class="tw-flex-shrink-0 tw-flex tw-items-center tw-justify-center tw-w-8 tw-h-8 tw-bg-blue-600 tw-text-white tw-rounded-full tw-text-lg tw-font-semibold">2</span>
                                        <div class="tw-flex-1">
                                            <strong class="tw-block tw-text-gray-900 tw-text-lg tw-mb-2">Información requerida:</strong>
                                            <ul class="tw-ml-6 tw-space-y-2 tw-list-disc tw-text-gray-600">
                                                <li>Nombre completo</li>
                                                <li>Número de identificación</li>
                                                <li>Correo electrónico asociado a tu cuenta</li>
                                                <li>Razón de la solicitud (opcional)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="tw-flex tw-items-start tw-gap-4">
                                        <span class="tw-flex-shrink-0 tw-flex tw-items-center tw-justify-center tw-w-8 tw-h-8 tw-bg-blue-600 tw-text-white tw-rounded-full tw-text-lg tw-font-semibold">3</span>
                                        <div class="tw-flex-1">
                                            <strong class="tw-block tw-text-gray-900 tw-text-lg tw-mb-2">Confirmación de solicitud</strong>
                                            <p class="tw-text-gray-600">Recibirás un correo de confirmación en las próximas 48 horas.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="tw-flex tw-items-start tw-gap-4">
                                        <span class="tw-flex-shrink-0 tw-flex tw-items-center tw-justify-center tw-w-8 tw-h-8 tw-bg-blue-600 tw-text-white tw-rounded-full tw-text-lg tw-font-semibold">4</span>
                                        <div class="tw-flex-1">
                                            <strong class="tw-block tw-text-gray-900 tw-text-lg tw-mb-2">Procesamiento</strong>
                                            <p class="tw-text-gray-600">Tu solicitud será procesada en un plazo máximo de 15 días hábiles.</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">INFORMACIÓN IMPORTANTE</h2>
                    <div class="tw-bg-yellow-50 tw-border-l-4 tw-border-yellow-400 tw-p-8 tw-rounded-xl">
                        <div class="tw-flex tw-gap-4">
                            <div class="tw-flex-shrink-0">
                                <i class="fas fa-exclamation-triangle tw-text-2xl tw-text-yellow-600"></i>
                            </div>
                            <div class="tw-flex-1">
                                <strong class="tw-block tw-text-gray-900 tw-text-lg tw-mb-4">Antes de solicitar la eliminación:</strong>
                                <ul class="tw-space-y-3 tw-text-gray-600">
                                    <li class="tw-flex tw-items-center">
                                        <span class="tw-w-2 tw-h-2 tw-bg-yellow-400 tw-rounded-full tw-mr-3"></span>
                                        Este proceso es irreversible
                                    </li>
                                    <li class="tw-flex tw-items-center">
                                        <span class="tw-w-2 tw-h-2 tw-bg-yellow-400 tw-rounded-full tw-mr-3"></span>
                                        Recomendamos solicitar una copia de tus datos antes de proceder
                                    </li>
                                    <li class="tw-flex tw-items-center">
                                        <span class="tw-w-2 tw-h-2 tw-bg-yellow-400 tw-rounded-full tw-mr-3"></span>
                                        La eliminación puede afectar servicios activos
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">EXCEPCIONES</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">
                        Algunos datos pueden ser retenidos por obligaciones legales o regulatorias, incluyendo:
                    </p>
                    <ul class="tw-space-y-4 tw-pl-4">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Registros de facturación y transacciones financieras</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Historiales médicos según requisitos legales</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Información necesaria para garantías vigentes</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">CONTACTO</h2>
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
