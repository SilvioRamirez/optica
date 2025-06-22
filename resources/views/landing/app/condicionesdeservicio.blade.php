@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-5xl tw-mx-auto tw-relative tw-p-8 sm:tw-p-12 tw-bg-white tw-border-2 tw-border-dashed tw-border-gray-300 tw-rounded-3xl">
            <div class="tw-text-center tw-mb-16">
                <div class="tw-flex tw-justify-center tw-mb-8">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="tw-h-44 tw-object-contain" alt="Logo Optirango">
                </div>
                <h1 class="tw-text-4xl tw-font-bold tw-text-gray-900 tw-mb-4">TÉRMINOS Y CONDICIONES DE SERVICIO</h1>
                <h4 class="tw-text-xl tw-text-gray-700">Última actualización: 20/05/2025</h4>
            </div>

            <div class="tw-max-w-4xl tw-mx-auto">
                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">1. ACEPTACIÓN DE LOS TÉRMINOS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        Al utilizar los servicios de OPTIRANGO, C.A., usted acepta estos términos y condiciones en su totalidad. Por favor, lea detenidamente este documento antes de utilizar nuestros servicios.
                    </p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">2. SERVICIOS OFRECIDOS</h2>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Exámenes visuales completos</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Venta de lentes y monturas</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Adaptación de lentes de contacto</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Mantenimiento y ajuste de lentes</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Asesoría profesional en salud visual</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Planes de financiamiento</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">3. CITAS Y CONSULTAS</h2>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Las citas deben ser programadas con anticipación</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Se requiere confirmación 24 horas antes</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>En caso de cancelación, avisar con mínimo 12 horas de anticipación</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>El tiempo de consulta está sujeto a las necesidades específicas del paciente</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">4. PAGOS Y FINANCIAMIENTO</h2>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Aceptamos diferentes métodos de pago (efectivo, tarjetas, transferencias)</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Ofrecemos planes de financiamiento flexibles</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Los precios están sujetos a cambios sin previo aviso</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Se requiere un anticipo para pedidos especiales</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">5. GARANTÍAS</h2>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Garantía por formulación en caso de que este fuera de los parametros establecidos dentro de los 15 días</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Garantía por defectos de fabricación 30 días</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Ajustes y mantenimiento gratuito 30 días</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>La garantía no cubre daños por mal uso o accidentes</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">6. DEVOLUCIONES Y CAMBIOS</h2>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>No se aceptan devoluciones en productos personalizados</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Los cambios deben realizarse dentro de los primeros 30 días</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>El producto debe estar en perfectas condiciones</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Se requiere presentar factura original</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">7. RESPONSABILIDADES DEL CLIENTE</h2>
                    <ul class="tw-space-y-3 tw-ml-6">
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Proporcionar información médica precisa y actualizada</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Seguir las recomendaciones del profesional</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Cumplir con las citas programadas</span>
                        </li>
                        <li class="tw-flex tw-items-center tw-gap-3 tw-text-gray-600">
                            <span class="tw-w-2 tw-h-2 tw-bg-blue-600 tw-rounded-full"></span>
                            <span>Mantener al día los pagos acordados</span>
                        </li>
                    </ul>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">8. LIMITACIÓN DE RESPONSABILIDAD</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        OPTIRANGO, C.A. no será responsable por daños resultantes del mal uso de los productos o el incumplimiento de las recomendaciones profesionales proporcionadas durante la consulta.
                    </p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">9. CONTACTO</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-8">Para cualquier consulta sobre estos términos y condiciones:</p>
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
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">10. MODIFICACIONES DE LOS TÉRMINOS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        OPTIRANGO, C.A. se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Los cambios entrarán en vigor inmediatamente después de su publicación.
                    </p>
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
