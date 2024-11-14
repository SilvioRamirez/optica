<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>

</style>
</head>

<body>
    <div id="app">
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card border-light mb-3 mt-4 shadow">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('storage/img/logo.png') }}" class="rounded" style="display: inline-block" alt="..." width="300" >
                                    </div>
                                    <p class="mt-2">{{ 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital'}} <br>{{'Telefono: 0412-642.67.97 /0424-640.67.97 ' }}</p>
                                    <a class="btn btn-primary" href="https://www.instagram.com/opti_rango/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i> Instagram</a>
                                    <a class="btn btn-primary" href="https://www.facebook.com/profile.php?id=61551175972400" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i> Facebook</a>
                                    <a class="btn btn-primary" href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                                    @foreach($orden as $item)
                                        <hr>
                                        <h3>Información de la Orden Nro: <strong>{{ $item->numero_orden }}</strong></h3>
                                        <p>Estatus: <strong>{{ $item->estatus }}</strong>
                                        <br>Paciente: <strong>{{ $item->paciente }}</strong>
                                        <br>Cedula: <strong>{{ $item->cedula }}</strong>
                                        <br>Edad: <strong>{{ $item->edad }}</strong>
                                        <br>Teléfono: <strong>{{ $item->telefono }}</strong>
                                        <br>Fecha: <strong>{{ $item->fecha }}</strong>
                                        <br>Dirección / Operativo: <strong>{{ $item->direccion_operativo }}</strong>
                                        <br>Tipo de Lente: <strong>{{ $item->tipoLente->tipo_lente }}</strong>
                                        <br>Tipo de Tratamiento: <strong>{{ $item->tipoTratamiento->tipo_tratamiento }}</strong>
                                        <br>Especialista: <strong>{{ $item->especialistaLente->nombre }}</strong></p>
                                    @endforeach

                                    <a href="{{ url('/') }}" class="btn btn-success btn-sm"><i class="fa fa-home"></i> Inicio</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<script>

</script>
</body>
</html>
