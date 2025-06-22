@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-3xl tw-mx-auto">
            <div class="tw-bg-white tw-rounded-3xl tw-shadow-lg tw-border-2 tw-border-dashed tw-border-gray-300">
                <div class="tw-p-8">
                    <div class="tw-text-center">
                        <div class="tw-mb-8">
                            <img src="{{ asset('storage/img/logo.png') }}" class="tw-h-32 tw-object-contain tw-mx-auto"
                                alt="Logo Optirango">
                        </div>

                        <div class="tw-text-gray-600 tw-mb-8">
                            <p class="tw-text-lg">
                                {{ 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital'}}
                            </p>
                            <p class="tw-text-lg">{{ 'Telefonos: 0412-088.36.74 / 0412-642.67.97 / 0424-640.67.97 ' }}</p>
                        </div>

                        <div class="tw-flex tw-justify-center tw-gap-4 tw-mb-8">
                            <a href="https://www.instagram.com/opti_rango/" target="_blank" rel="noopener noreferrer"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa-brands fa-instagram tw-mr-2"></i> Instagram
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=61551175972400" target="_blank"
                                rel="noopener noreferrer"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa-brands fa-facebook tw-mr-2"></i> Facebook
                            </a>
                            <a href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                <i class="fa-brands fa-whatsapp tw-mr-2"></i> WhatsApp
                            </a>
                        </div>

                        @if($orden->isEmpty())
                            <div class="tw-border-t-2 tw-border-dashed tw-border-gray-200 tw-pt-8 tw-mt-8">
                                <div class="tw-bg-yellow-50 tw-border-l-4 tw-border-yellow-400 tw-p-6 tw-rounded-lg tw-mb-8">
                                    <div class="tw-flex tw-gap-4">
                                        <div class="tw-flex-shrink-0">
                                            <i class="fa fa-info-circle tw-text-2xl tw-text-yellow-600"></i>
                                        </div>
                                        <div class="tw-flex tw-flex-col tw-gap-2">
                                            <p class="tw-text-lg tw-font-semibold tw-text-gray-900">No se encontraron resultados
                                            </p>
                                            <p class="tw-text-gray-600">La cédula ingresada no se encuentra registrada en
                                                nuestro sistema. Si crees que esto es un error, por favor comunícate con
                                                nosotros.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tw-flex tw-justify-center tw-gap-4">
                                    <a href="{{ url('/consulta-web') }}"
                                        class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200">
                                        <i class="fa fa-search tw-mr-2"></i> Nueva Consulta
                                    </a>
                                    <a href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"
                                        class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-green-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-green-700 tw-transition-colors tw-duration-200">
                                        <i class="fa-brands fa-whatsapp tw-mr-2"></i> Contáctanos
                                    </a>
                                </div>
                            </div>
                        @endif

                        @foreach($orden as $item)
                            <div class="tw-border-t-2 tw-border-dashed tw-border-gray-200 tw-pt-8 tw-mt-8">
                                <div class="tw-mb-8">
                                    <h3 class="tw-text-2xl tw-font-bold tw-text-gray-900 tw-mb-2">Orden Nro. <span
                                            class="tw-text-blue-600">{{ $item->numero_orden }}</span></h3>
                                    <h3 class="tw-text-xl tw-font-semibold tw-text-gray-900">Estatus: <span
                                            class="tw-text-blue-600">{{ $item->estatus }}</span></h3>
                                </div>

                                <div class="tw-bg-gray-50 tw-rounded-2xl tw-p-6 tw-mb-8">
                                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6 tw-text-left">
                                        <div class="tw-space-y-3">
                                            <p class="tw-text-gray-600">Paciente: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->paciente }}</span></p>
                                            <p class="tw-text-gray-600">Cedula: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->cedula }}</span></p>
                                            <p class="tw-text-gray-600">Edad: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->edad }}</span></p>
                                            <p class="tw-text-gray-600">Teléfono: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->telefono }}</span></p>
                                            <p class="tw-text-gray-600">Fecha de Registro: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->fecha }}</span></p>
                                            <p class="tw-text-gray-600">Días desde Registro: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ \Carbon\Carbon::parse($item->fecha)->diffInDays(now(), 2) }}</span>
                                            </p>
                                        </div>
                                        <div class="tw-space-y-3">
                                            <p class="tw-text-gray-600">Próxima Cita Gratuita: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->fecha_proxima_cita }}</span>
                                            </p>
                                            <p class="tw-text-gray-600">Dirección / Operativo: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->operativo->nombre_operativo }}</span>
                                            </p>
                                            <p class="tw-text-gray-600">Tipo de Lente: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->tipoLente->tipo_lente }}</span>
                                            </p>
                                            @if($item->tipoTratamiento)
                                                <p class="tw-text-gray-600">Tipo de Tratamiento: <span
                                                        class="tw-font-semibold tw-text-gray-900">{{ $item->tipoTratamiento->tipo_tratamiento }}</span>
                                                </p>
                                            @endif
                                            <p class="tw-text-gray-600">Especialista: <span
                                                    class="tw-font-semibold tw-text-gray-900">{{ $item->especialistaLente->nombre }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tw-mt-6 tw-pt-6 tw-border-t tw-border-gray-200">
                                        <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4">
                                            <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                                <p class="tw-text-gray-600">Monto Total</p>
                                                <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->total }}</p>
                                            </div>
                                            <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                                <p class="tw-text-gray-600">Saldo Deudor</p>
                                                <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->saldo }}</p>
                                            </div>
                                            <div class="tw-text-center tw-p-4 tw-bg-white tw-rounded-xl tw-shadow-sm">
                                                <p class="tw-text-gray-600">Porcentaje Pagado</p>
                                                <p class="tw-text-xl tw-font-bold tw-text-blue-600">{{ $item->porcentaje_pago }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tw-bg-blue-50 tw-border-l-4 tw-border-blue-400 tw-p-6 tw-rounded-lg tw-mb-8">
                                    <div class="tw-text-center">
                                        <p class="tw-text-gray-600 tw-mb-4">Si deseas realizar un <strong
                                                class="tw-font-semibold">ABONO</strong> presiona este Link para comunicarte con
                                            nosotros</p>
                                        <a class="tw-inline-flex tw-no-underline tw-items-center tw-px-8 tw-py-4 tw-bg-blue-600 tw-text-white hover:tw-text-white tw-text-lg tw-font-semibold tw-rounded-xl hover:tw-bg-blue-700 tw-transition-colors tw-duration-200"
                                            href="https://wa.link/s5jouq" target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-whatsapp tw-mr-3"></i> WhatsApp
                                        </a>
                                    </div>
                                </div>

                                <p class="tw-text-xl tw-text-gray-600">¡Gracias por confiar su salud visual en nosotros! <span
                                        class="tw-text-green-500"><i class="fa fa-heart"></i></span></p>
                            </div>
                        @endforeach

                        <div class="tw-mt-8 tw-pt-8 tw-border-t-2 tw-border-dashed tw-border-gray-200">
                            <a href="{{ url('/') }}"
                                class="tw-inline-flex tw-no-underline tw-items-center tw-px-6 tw-py-3 tw-bg-green-600 tw-text-white hover:tw-text-white tw-font-semibold tw-rounded-xl hover:tw-bg-green-700 tw-transition-colors tw-duration-200">
                                <i class="fa fa-home tw-mr-2"></i> Inicio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

