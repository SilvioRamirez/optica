@extends('landing.app.app')

@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <div class="text-center mb-5">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2 mb-4" alt="Logo Optirango" height="180">
                </a>
                <h1 class="text-body-emphasis">ACERCA DE NOSOTROS</h1>
                <h4 class="text-body-emphasis mb-4">OPTIRANGO, C.A.</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <section class="mb-5">
                        <h2 class="h4 mb-4">QUIÉNES SOMOS</h2>
                        <p class="mb-4">
                            En OPTIRANGO, somos más que una óptica; somos un equipo comprometido con tu salud visual. Con años de experiencia en el sector, nos hemos convertido en un referente en servicios ópticos de calidad en Venezuela, ofreciendo soluciones visuales integrales y personalizadas para cada uno de nuestros pacientes.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">NUESTRA MISIÓN</h2>
                        <p class="mb-4">
                            Proporcionar servicios ópticos de alta calidad y soluciones visuales accesibles, mejorando la calidad de vida de nuestros pacientes a través de una atención profesional personalizada y productos de primera calidad, con opciones de financiamiento que se adapten a sus necesidades.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">NUESTRA VISIÓN</h2>
                        <p class="mb-4">
                            Ser reconocidos como la óptica líder en Venezuela, destacando por nuestra excelencia en servicio, innovación en soluciones visuales y compromiso con el bienestar de nuestros pacientes, manteniendo siempre los más altos estándares de calidad y profesionalismo.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">NUESTROS VALORES</h2>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Profesionalismo</h5>
                                        <p class="card-text">Nuestro equipo está altamente capacitado y en constante actualización para ofrecer el mejor servicio.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Compromiso</h5>
                                        <p class="card-text">Nos dedicamos a encontrar la mejor solución visual para cada paciente, adaptándonos a sus necesidades.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Calidad</h5>
                                        <p class="card-text">Trabajamos con los mejores productos y tecnología para garantizar resultados óptimos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Accesibilidad</h5>
                                        <p class="card-text">Ofrecemos planes de financiamiento flexibles para que la salud visual esté al alcance de todos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">NUESTRO EQUIPO</h2>
                        <p class="mb-4">
                            Contamos con profesionales altamente calificados y comprometidos con tu salud visual:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-3">
                                <h5 class="mb-1">Duberlys Nathaly Sánchez Quintero</h5>
                                <p class="text-muted">Directora General y Optometrista Principal</p>
                            </li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">NUESTRAS INSTALACIONES</h2>
                        <p class="mb-4">
                            Disponemos de instalaciones modernas y equipadas con la última tecnología en diagnóstico y medición visual. Nuestro espacio está diseñado para brindar una experiencia confortable y profesional a todos nuestros pacientes.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">CONTACTO</h2>
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
                <a href="{{ url('/') }}" class="btn btn-primary px-5">
                    <i class="fa fa-home me-2"></i>Inicio
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
