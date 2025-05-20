@extends('landing.app.app')

@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 bg-body border border-dashed rounded-5">
            <div class="text-center mb-5">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2 mb-4" alt="Logo Optirango" height="180">
                </a>
                <h1 class="text-body-emphasis">TÉRMINOS Y CONDICIONES DE SERVICIO</h1>
                <h4 class="text-body-emphasis mb-4">Última actualización: 20/05/2025</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <section class="mb-5">
                        <h2 class="h4 mb-4">1. ACEPTACIÓN DE LOS TÉRMINOS</h2>
                        <p class="mb-4">
                            Al utilizar los servicios de OPTIRANGO, C.A., usted acepta estos términos y condiciones en su totalidad. Por favor, lea detenidamente este documento antes de utilizar nuestros servicios.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">2. SERVICIOS OFRECIDOS</h2>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Exámenes visuales completos</li>
                            <li class="mb-2">• Venta de lentes y monturas</li>
                            <li class="mb-2">• Adaptación de lentes de contacto</li>
                            <li class="mb-2">• Mantenimiento y ajuste de lentes</li>
                            <li class="mb-2">• Asesoría profesional en salud visual</li>
                            <li class="mb-2">• Planes de financiamiento</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">3. CITAS Y CONSULTAS</h2>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Las citas deben ser programadas con anticipación</li>
                            <li class="mb-2">• Se requiere confirmación 24 horas antes</li>
                            <li class="mb-2">• En caso de cancelación, avisar con mínimo 12 horas de anticipación</li>
                            <li class="mb-2">• El tiempo de consulta está sujeto a las necesidades específicas del paciente</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">4. PAGOS Y FINANCIAMIENTO</h2>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Aceptamos diferentes métodos de pago (efectivo, tarjetas, transferencias)</li>
                            <li class="mb-2">• Ofrecemos planes de financiamiento flexibles</li>
                            <li class="mb-2">• Los precios están sujetos a cambios sin previo aviso</li>
                            <li class="mb-2">• Se requiere un anticipo para pedidos especiales</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">5. GARANTÍAS</h2>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Garantía por formulación en caso de que este fuera de los parametros establecidos dentro de los 15 días</li>
                            <li class="mb-2">• Garantía por defectos de fabricación 30 días</li>
                            <li class="mb-2">• Ajustes y mantenimiento gratuito 30 días</li>
                            <li class="mb-2">• La garantía no cubre daños por mal uso o accidentes</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">6. DEVOLUCIONES Y CAMBIOS</h2>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• No se aceptan devoluciones en productos personalizados</li>
                            <li class="mb-2">• Los cambios deben realizarse dentro de los primeros 30 días</li>
                            <li class="mb-2">• El producto debe estar en perfectas condiciones</li>
                            <li class="mb-2">• Se requiere presentar factura original</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">7. RESPONSABILIDADES DEL CLIENTE</h2>
                        <ul class="list-unstyled ms-4">
                            <li class="mb-2">• Proporcionar información médica precisa y actualizada</li>
                            <li class="mb-2">• Seguir las recomendaciones del profesional</li>
                            <li class="mb-2">• Cumplir con las citas programadas</li>
                            <li class="mb-2">• Mantener al día los pagos acordados</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">8. LIMITACIÓN DE RESPONSABILIDAD</h2>
                        <p>
                            OPTIRANGO, C.A. no será responsable por daños resultantes del mal uso de los productos o el incumplimiento de las recomendaciones profesionales proporcionadas durante la consulta.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 mb-4">9. CONTACTO</h2>
                        <p class="mb-4">Para cualquier consulta sobre estos términos y condiciones:</p>
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
                        <h2 class="h4 mb-4">10. MODIFICACIONES DE LOS TÉRMINOS</h2>
                        <p>OPTIRANGO, C.A. se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Los cambios entrarán en vigor inmediatamente después de su publicación.</p>
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
