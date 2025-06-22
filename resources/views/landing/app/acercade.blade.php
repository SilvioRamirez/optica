@extends('landing.app.landing')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-my-20">
        <div class="tw-max-w-5xl tw-mx-auto tw-relative tw-p-8 sm:tw-p-12 tw-bg-white tw-border-2 tw-border-dashed tw-border-gray-300 tw-rounded-3xl">
            <div class="tw-text-center tw-mb-16">
                <div class="tw-flex tw-justify-center tw-mb-8">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="tw-h-44 tw-object-contain" alt="Logo Optirango">
                </div>
                <h1 class="tw-text-4xl tw-font-bold tw-text-gray-900 tw-mb-4">ACERCA DE NOSOTROS</h1>
                <h4 class="tw-text-xl tw-text-gray-700">OPTIRANGO, C.A.</h4>
            </div>

            <div class="tw-max-w-4xl tw-mx-auto">
                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">QUIÉNES SOMOS</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        En OPTIRANGO, somos más que una óptica; somos un equipo comprometido con tu salud visual. Con años de experiencia en el sector, nos hemos convertido en un referente en servicios ópticos de calidad en Venezuela, ofreciendo soluciones visuales integrales y personalizadas para cada uno de nuestros pacientes.
                    </p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">NUESTRA MISIÓN</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        Proporcionar servicios ópticos de alta calidad y soluciones visuales accesibles, mejorando la calidad de vida de nuestros pacientes a través de una atención profesional personalizada y productos de primera calidad, con opciones de financiamiento que se adapten a sus necesidades.
                    </p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">NUESTRA VISIÓN</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        Ser reconocidos como la óptica líder en Venezuela, destacando por nuestra excelencia en servicio, innovación en soluciones visuales y compromiso con el bienestar de nuestros pacientes, manteniendo siempre los más altos estándares de calidad y profesionalismo.
                    </p>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">NUESTROS VALORES</h2>
                    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6">
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-transition-transform hover:tw-scale-105">
                            <div class="tw-p-6">
                                <h5 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">Profesionalismo</h5>
                                <p class="tw-text-gray-600">Nuestro equipo está altamente capacitado y en constante actualización para ofrecer el mejor servicio.</p>
                            </div>
                        </div>
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-transition-transform hover:tw-scale-105">
                            <div class="tw-p-6">
                                <h5 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">Compromiso</h5>
                                <p class="tw-text-gray-600">Nos dedicamos a encontrar la mejor solución visual para cada paciente, adaptándonos a sus necesidades.</p>
                            </div>
                        </div>
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-transition-transform hover:tw-scale-105">
                            <div class="tw-p-6">
                                <h5 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">Calidad</h5>
                                <p class="tw-text-gray-600">Trabajamos con los mejores productos y tecnología para garantizar resultados óptimos.</p>
                            </div>
                        </div>
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-transition-transform hover:tw-scale-105">
                            <div class="tw-p-6">
                                <h5 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-4">Accesibilidad</h5>
                                <p class="tw-text-gray-600">Ofrecemos planes de financiamiento flexibles para que la salud visual esté al alcance de todos.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">NUESTRO EQUIPO</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-mb-6">
                        Contamos con profesionales altamente calificados y comprometidos con tu salud visual:
                    </p>
                    <div class="tw-ml-6">
                        <div class="tw-mb-6">
                            <h5 class="tw-text-xl tw-font-semibold tw-text-gray-900 tw-mb-2">Duberlys Nathaly Sánchez Quintero</h5>
                            <p class="tw-text-gray-500">Directora General y Optometrista Principal</p>
                        </div>
                    </div>
                </section>

                <section class="tw-mb-16">
                    <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-8">NUESTRAS INSTALACIONES</h2>
                    <p class="tw-text-lg tw-text-gray-600 tw-leading-relaxed">
                        Disponemos de instalaciones modernas y equipadas con la última tecnología en diagnóstico y medición visual. Nuestro espacio está diseñado para brindar una experiencia confortable y profesional a todos nuestros pacientes.
                    </p>
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
