@extends('landing.app.app')

@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
            <a class="navbar-brand" href="#" >
                <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2 mb-4" alt="..." height="180">
            </a>
            <h1 class="text-body-emphasis">Verificación de Facebook</h1>
            <p class="col-lg-6 mx-auto mb-4">
                ¡Hola! Mi nombre es <strong>Duberlys Sanchez</strong> soy dueña del negocio <strong>OPTIRANGO, C.A.</strong> Somos una óptica comprometida con la salud visual de nuestros clientes, ofreciendo servicios profesionales y productos de alta calidad.
                Deseo verificar mi cuenta de administrador comercial con numero de identificación <strong>950812703335736</strong>
            </p> 
            <p class="col-lg-6 mx-auto mb-4">
                Anexo la información para completar mi solicitud:
            </p>

            <p class="col-lg-6 mx-auto mb-4 text-start">
                <strong>Nombre: </strong> DUBERLYS NATHALY SANCHEZ QUINTERO
                <br>
                <strong>IDENTIFICACIÓN FISCAL (RIF): </strong> 20428744
                <br>
                <strong>Correo electrónico: </strong> admin@optirango.com
                <br>
                <strong>Teléfono: </strong> +584241841649
                <br>
                <strong>Dirección: </strong> Avenida Urdaneta, Esquinas de Ibarras a Pelota, Centro Profesional Urdaneta, Piso 7, Oficina 7-D, Parroquia Altagracia, Distrito Capital, Caracas 1030, Venezuela
                <br>
                <strong>Nombre del Negocio: </strong> OPTIRANGO, C.A.
                <br>
                <strong>Id del Administrador Comercial: </strong> 950812703335736
            </p>

            <section class="mb-5 col-lg-6 mx-auto">
                <h2 class="h4 mb-4">USO DE WHATSAPP BUSINESS</h2>
                <p class="mb-4">
                    En OPTIRANGO, C.A., utilizamos WhatsApp Business como canal de comunicación con nuestros clientes. Al proporcionarnos tu número de teléfono y darnos tu consentimiento explícito, aceptas recibir mensajes a través de WhatsApp relacionados con nuestros productos y servicios.
                </p>
                
                <div class="text-center mb-4">
                    <a href="{{ url('/politica-whatsapp') }}" class="btn btn-primary">
                        <i class="fa-brands fa-whatsapp me-2"></i>Ver política completa de WhatsApp Business
                    </a>
                </div>
                
                <p class="mb-3">
                    Para más información detallada sobre cómo utilizamos WhatsApp Business, cómo obtenemos tu consentimiento, tus derechos, formas de cancelación y protección de datos en WhatsApp, por favor consulta nuestra política específica de WhatsApp Business a través del enlace anterior.
                </p>

                <div class="alert alert-info">
                    <i class="fa fa-info-circle me-2"></i>
                    Utilizamos WhatsApp Business en cumplimiento con los Términos de Servicio de WhatsApp Business y la Política de Mensajería Empresarial de WhatsApp.
                </div>
            </section>
            
            <button class="btn btn-primary px-5 mb-2" type="button">
                <i class="fa fa-home me-1"></i> Inicio
            </button>
        </div>
    </div>

    
@endsection

@push('scripts')
@endpush
