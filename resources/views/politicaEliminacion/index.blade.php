@extends('landing.app.app')

@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <div class="text-center mb-5">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2 mb-4" alt="Logo Optirango" height="180">
                </a>
                <h1 class="text-body-emphasis">POLÍTICA DE ELIMINACIÓN DE DATOS</h1>
                <h4 class="text-body-emphasis mb-4">Última actualización: 20/05/2025</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <section class="mb-5">
                        <h2 class="h4 mb-4">INTRODUCCIÓN</h2>
                        <p class="mb-4">
                            En OPTIRANGO, C.A., respetamos tu derecho a la privacidad y al control de tus datos personales. Esta política describe el proceso para solicitar la eliminación de tus datos personales de nuestros sistemas, en cumplimiento con las normativas de protección de datos y los requisitos de Facebook Developers.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">PROCESO DE ELIMINACIÓN DE DATOS</h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Pasos para solicitar la eliminación de tus datos:</h5>
                                <ol class="list-unstyled">
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">1</span>
                                            <div>
                                                <strong>Envía tu solicitud</strong><br>
                                                Correo electrónico: admin@optirango.com<br>
                                                Asunto: "Solicitud de eliminación de datos"
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">2</span>
                                            <div>
                                                <strong>Información requerida:</strong>
                                                <ul class="ms-4 mt-2">
                                                    <li>Nombre completo</li>
                                                    <li>Número de identificación</li>
                                                    <li>Correo electrónico asociado a tu cuenta</li>
                                                    <li>Razón de la solicitud (opcional)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">3</span>
                                            <div>
                                                <strong>Confirmación de solicitud</strong><br>
                                                Recibirás un correo de confirmación en las próximas 48 horas.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-primary rounded-pill me-2">4</span>
                                            <div>
                                                <strong>Procesamiento</strong><br>
                                                Tu solicitud será procesada en un plazo máximo de 15 días hábiles.
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">INFORMACIÓN IMPORTANTE</h2>
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            <strong>Antes de solicitar la eliminación:</strong>
                            <ul class="mt-2 mb-0">
                                <li>Este proceso es irreversible</li>
                                <li>Recomendamos solicitar una copia de tus datos antes de proceder</li>
                                <li>La eliminación puede afectar servicios activos</li>
                            </ul>
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">EXCEPCIONES</h2>
                        <p class="mb-3">
                            Algunos datos pueden ser retenidos por obligaciones legales o regulatorias, incluyendo:
                        </p>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Registros de facturación y transacciones financieras</li>
                            <li class="mb-2">• Historiales médicos según requisitos legales</li>
                            <li class="mb-2">• Información necesaria para garantías vigentes</li>
                        </ul>
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
