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
                                <img src="{{ asset('storage/img/logo.png') }}" class="rounded" alt="..." width="300" >
                                <p class="mt-2">{{ 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta Piso 7 Of D Urb Catedral Caracas Distrito Capital'}} <br>{{'Telefono: 0412-642.67.97 /0424-640.67.97 ' }}</p>
                                <a class="btn btn-primary" href="https://www.instagram.com/opti_rango/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i> Instagram</a>
                                <a class="btn btn-primary" href="https://www.facebook.com/profile.php?id=61551175972400" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i> Facebook</a>
                                <a class="btn btn-primary" href="https://wa.link/cdtl37" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>

                                <hr>
                                <h3>Información de la Orden Nro: <strong>{{ $orden->numero_orden }}</strong></h3>
                                <p>Paciente: <strong>{{ $orden->paciente }}</strong>
                                <br>Cedula: <strong>{{ $orden->cedula }}</strong>
                                <br>Edad: <strong>{{ $orden->edad }}</strong>
                                <br>Teléfono: <strong>{{ $orden->telefono }}</strong>
                                <br>Fecha: <strong>{{ $orden->fecha }}</strong>
                                <br>Dirección / Operativo: <strong>{{ $orden->direccion_operativo }}</strong>
                                <br>Tipo de Lente: <strong>{{ $tipoLente->tipo_lente }}</strong></p>

                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><strong>Esf.</strong></th>
                                                    <th><strong>Cil.</strong></th>
                                                    <th><strong>Eje.</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>OD</strong></td>
                                                    <td>{{ $orden->od_esf }}</td>
                                                    <td>{{ $orden->od_cil }}</td>
                                                    <td>{{ $orden->od_eje }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>OI</strong></td>
                                                    <td>{{ $orden->oi_esf }}</td>
                                                    <td>{{ $orden->oi_cil }}</td>
                                                    <td>{{ $orden->oi_eje }}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>

                                        <table class="table table-hover table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>ADD</strong></td>
                                                    <td>{{ $orden->add }}</td>
                                                    <td><strong>DP</strong></td>
                                                    <td>{{ $orden->dp }}</td>
                                                    <td><strong>ALT</strong></td>
                                                    <td>{{ $orden->alt }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <p>Observaciones Extras: <strong>{{ $orden->observaciones_extras }}</strong>
                                        <br>Total: <strong>{{ $orden->total }}</strong>
                                        <br>Abono: <strong>{{ $orden->abono_1 }}</strong>
                                        <br>Saldo: <strong>{{ $orden->saldo }}</strong>
                                        <br>Especialista: <strong>{{ $orden->especialista }}</strong></p>
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
