<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <title>Orden Nro. {{ $orden->numero_orden }}</title> --}}
    
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        @page{
            margin-top: 0cm;
            margin-bottom: 0cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;

        }

        #header{
            position: fixed;
            top: -0.0cm;
            left: 1.0cm;
        }

        .border-bottom-solid{
            border-bottom: 3px solid;
            top: -0.0cm;
        }

        .line-block{
            border-bottom: 3px solid;
            margin-top: 0.1cm;
            margin-bottom: 0.3cm;

        }

        .imgHeader{
            float: inherit;
            width: 3cm;
            margin-top: 0.0cm;
        }

        #img-logo{
            float: fixed;
            margin-left: 0.87cm;
            margin-top: 0.0cm;
            /* border: 0.5px solid red; */
        }

        /* .center-img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        } */


        #info-header{
            float: inherit;
            width: 100%;
            /* height: 100%; */
            margin-left: 0.0cm;
            margin-top: 2.3cm;
            /* border: 0.5px solid red; */
        }

        #body-1{
            float: inherit;
            width: 100%;
            /* height: 100%; */
            margin-left: 0.0cm;
            margin-top: -0.25cm;
            /* border: 0.5px solid red; */
        }

        #body-2{
            float: inherit;
            width: 100%;
            /* height: 100%; */
            margin-left: 0.0cm;
            margin-top: -0.0cm;
            /* border: 0.5px solid red; */
        }

        #table-formula-1{
            float: inherit;
            width: 100%;
            margin-left: 0.0cm;
            margin-top: 0.0cm;
            /* border: 0.5px solid red; */
        }

        #table-formula-2{
            float: inherit;
            width: 100%;
            margin-left: 0.0cm;
            margin-top: 0.05cm;
        }

        #img-qrcode{
            float: fixed;
            margin-left: 0.26cm;
            margin-top: 16.5cm;
            /* border: 0.5px solid red; */
        }
        

        th, td {
            border: 2.5px solid black;
        }

        table {
            /* border-collapse: collapse; */
            border-spacing: 0pt;
            border-collapse: separate;
            width: 100%;
        }

        table tr:first-child th:first-child,
        table tr:first-child td:first-child {
            border-top-left-radius: 5px;
        }

        table tr:first-child th:last-child,
        table tr:first-child td:last-child {
            border-top-right-radius: 5px;
        }

        table tr:last-child th:first-child,
        table tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
        }

        table tr:last-child th:last-child,
        table tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
        }

        .table-no-border tr td th{
            border : none;
        }

        td {
            height: 0.5cm;
            vertical-align: middle;
            text-align: center;
        }

        .border-1{
            border: 0.5px solid;
            /* width: 50px; */
            /* left: -0.25cm; */
            border-collapse: collapse;
        }

        .text-center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            /* background-color: green; */
        }

        .margint-top-10{
            margin-top: 10px;
        }

        .margint-bottom-10{
            margin-bottom: 10px;
        }

        .titulo{
            color: black;
            vertical-align: text-top;
            display: inline;
            font-size: 22px;
        }

        .titulo-fuente{
            font-size: 10px;
        }

        .subtitulo-fuente{
            font-size: 5px;
            margin-top: -10px;
            margin-bottom: -10px;
        }

        .font-size-15{
            font-size: 15px;
        }

        .font-size-10{
            font-size: 10px;
        }

        .font-size-5{
            font-size: 5px;
        }

        .font-size-4{
            font-size: 4px;
        }

        .font-size-3{
            font-size: 3px;
        }

        #footer{
            position: fixed;
            bottom: -1.5cm;
            left: 0cm;
            width: 100%;
            background-color: red;
            text-align: center;
        }

        .pie-pagina-bioanalista{
            position: fixed;
            width: 100%;
            text-align: center;
        }

        .hijo{
            width: 2cm;
            height: 1cm;
            margin: 0.2cm;
            background-color: yellow;
        }

        .table-border {
            border: 0.5px solid;
            width: 50px;
            /* left: -0.25cm; */
            border-collapse: collapse;
        }

        hr{
            float: inherit;
            border: 0.5px solid black;
            border-radius: 5px;
        }

        .mt-m-5{
            margin-top: -5px;
        }

        .mt-m-1{
            margin-top: -1px;
        }

        .mt-m-2{
            margin-top: -2px;
        }

        .mt-m-5{
            margin-top: -5px;
        }

        .mt-0{
            margin-top: 0px;
        }

        .mt-1{
            margin-top: 10px;
        }

        .mt-2{
            margin-top: 20px;
        }

        .mt-3{
            margin-top: 30px;
        }

        .mt-4{
            margin-top: 40px;
        }

        .mt-5{
            margin-top: 50px;
        }

        .mr-1{
            margin-right: 10px;
        }

        .mr-2{
            margin-right: 20px;
        }

        .mr-3{
            margin-right: 30px;
        }
    </style>
</head>
<body class="">
    <div id="img-logo">
        <img class="imgHeader" src="{{ public_path('storage/img/logo_negro.png') }}">
    </div>
    
    <div id="img-qrcode">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate('https://optirango.com/formularios/'."$orden->id".'/'."$orden->numero_orden".'/qrcode')) !!} ">
    </div>

    <div id="info-header">
        <div class="font-size-15 text-center"><strong>{{ $configuracion->nombre_organizacion ?? '' }}</strong></div>
        <div class="font-size-15 text-center "><strong>{{ $configuracion->descripcion_1 ?? '' }}</strong></div>
        <div class="font-size-15 text-center "><strong>{{ $configuracion->direccion ?? '' }}</strong></div>
        <div class="font-size-15 text-center "><strong>{{ $configuracion->direccion_2 ?? '' }}</strong></div>
        <div class="font-size-15 text-center "><strong>{{ 'Teléfono: '.$configuracion->telefono_uno ?? '' }} {{'IG: '.$configuracion->instagram ?? '' }}</strong></div>
        <div class="font-size-15 text-center "><strong>{{ 'WEB: '.$configuracion->pagina_web ?? '' }}</strong></div>
    </div>
    <div class="line-block"></div>
    <div id="body-1" class="">
        <p class="font-size-15">Número de Orden: <strong>{{ $orden->numero_orden ?? '' }}</strong></p>
        <p class="font-size-15">Fecha: <strong>{{ $orden->fecha ?? '' }}</strong></p>
        <p class="font-size-15">Prox. Cita Gratuita: <strong>{{ $orden->fecha_proxima_cita ?? '' }}</strong></p>
        <p class="font-size-15">Paciente: <strong>{{ $orden->paciente ?? '' }}</strong></p>
        <p class="font-size-15">Dirección / Operativo: <strong>{{ $orden->direccion_operativo ?? '' }}</strong></p>
        <p class="font-size-15">Teléfono: <strong>{{ $orden->telefono ?? '' }}</strong></p>
        <p class="font-size-15">Cedula: <strong>{{ $orden->cedula ?? '' }}</strong></p>
        <p class="font-size-15">Edad: <strong>{{ $orden->edad ?? '' }}</strong></p>
        <p class="font-size-15">Tipo de Lente: <strong>{{ $tipoLente->tipo_lente ?? '' }}</strong></p>
        <p class="font-size-15">Tipo de Tratamiento: <strong>{{ $tipoTratamiento->tipo_tratamiento ?? '' }}</strong></p>
    </div>

    <div id="table-formula-1" style="width:100%" class="table">
        <table>
            <thead>
            </thead>
            <tbody>
                <tr>
                    <td class="font-size-15"></td>
                    <td class="font-size-15"><strong>Esf.</strong></td>
                    <td class="font-size-15"><strong>Cil.</strong></td>
                    <td class="font-size-15"><strong>Eje.</strong></td>
                </tr>
                <tr>
                    <td class="font-size-15"><strong>OD</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->od_esf ?? '' }}</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->od_cil ?? '' }}</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->od_eje ?? '' }}</strong></td>
                </tr>
                <tr>
                    <td class="font-size-15"><strong>OI</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->oi_esf ?? '' }}</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->oi_cil ?? '' }}</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->oi_eje ?? '' }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="table-formula-2" style="width:100%" class="table">
        <table>
            <tbody>
                <tr>
                    <td class="font-size-15"><strong>ADD</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->add ?? '' }}</strong></td>
                    <td class="font-size-15"><strong>DP</strong></td>
                    <td class="font-size-15"><strong>{{ $orden->dp ?? '' }}</strong></td>
                    <td class="font-size-15"><strong>ALT</strong></td>
                    <td class="font-size-15"><strong><{{ $orden->alt ?? '' }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="body-2" class="">
        <p class="font-size-15">Observaciones Extras: <strong>{{ $orden->observaciones_extras ?? '' }}</strong></p>
{{--         <p class="font-size-5">Total: <strong>{{ $orden->total }}</strong></p>
        <p class="font-size-5">Abono: <strong>{{ $orden->abono_1 }}</strong></p>
        <p class="font-size-5">Saldo: <strong>{{ $orden->saldo }}</strong></p> --}}
        <p class="font-size-15">Especialista: <strong>{{ $especialista->nombre ?? '' }}</strong></p>
        <p class="font-size-15">Fecha de Entrega: <strong>{{ $orden->fecha_entrega ?? '' }}</strong></p>
    </div>


</body>
</html>