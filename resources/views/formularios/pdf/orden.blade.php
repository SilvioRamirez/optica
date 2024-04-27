<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Orden Nro. {{ $orden->numero_orden }}</title>
    
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        @page{
            margin: 0cm 0.0cm 0.0cm 0.0cm;
        }

        #header{
            position: fixed;
            top: -0.0cm;
            left: 0.0cm;
        }

        .border-bottom-solid{
            border-bottom: 1px solid;
            top: -0.0cm;
        }

        .page-break-auto{
            page-break-inside: auto
        }

        .page-break-avoid{
            page-break-inside: avoid
        }

        .imgHeader{
            float: inherit;
            width: 1.4cm;
            margin-top: 0.0cm;
        }

        #info-header{
            float: inherit;
            width: 100%;
            /* height: 100%; */
            margin-left: 0.5cm;
            margin-top: 0.1cm;
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
            /* border: 0.5px solid red; */
        }

        #img-qrcode{
            float: fixed;
            margin-left: 2.5cm;
            margin-top: 5.3cm;
            /* border: 0.5px solid red; */
        }
        

        th, td {
            border: 0.5px solid black;
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
            height: 0.3cm;
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
<body class="page-break-avoid">
    <div id="header">
        <img class="imgHeader" src="{{ public_path('storage/img/logo.png') }}">
    </div>

    <div id="img-qrcode">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(60)->generate('https://optirango.com/formularios/'."$orden->id".'/'."$orden->numero_orden".'/qrcode')) !!} ">
    </div>

    <div id="info-header">
        <div class="font-size-10 text-center"><strong>{{ 'OPTIRANGO, C.A.' }}</strong></div>
        <div class="font-size-5 text-center "><strong>{{ 'VISIÓN SALUD Y FUTURO' }}</strong></div>
        <div class="font-size-4 text-center "><strong>{{ 'Av. Urdaneta Esq Pelota Edif Profesional Urdaneta' }}</strong></div>
        <div class="font-size-4 text-center "><strong>{{ 'Piso 7 Of D Urb Catedral Caracas Distrito Capital' }}</strong></div>
        <div class="font-size-4 text-center "><strong>{{ 'Telefono: 0412-642.67.97 /0424-640.67.97 IG: @opti_rango' }}</strong></div>
    </div>
    <hr class="">
    <div id="body-1" class="">
        <p class="font-size-5">Número de Orden: <strong>{{ $orden->numero_orden }}</strong></p>
        <p class="font-size-5">Fecha: <strong>{{ $orden->fecha }}</strong></p>
        <p class="font-size-5">Paciente: <strong>{{ $orden->paciente }}</strong></p>
        <p class="font-size-5">Dirección / Operativo: <strong>{{ $orden->direccion_operativo }}</strong></p>
        <p class="font-size-5">Teléfono: <strong>{{ $orden->telefono }}</strong></p>
        <p class="font-size-5">Cedula: <strong>{{ $orden->cedula }}</strong></p>
        <p class="font-size-5">Edad: <strong>{{ $orden->edad }}</strong></p>
        <p class="font-size-5">Tipo de Lente: <strong>{{ $tipoLente->tipo_lente }}</strong></p>
    </div>

    <div id="table-formula-1" style="width:100%" class="table">
        <table>
            <thead>
                
            </thead>
            <tbody>
                <tr>
                    <td class="font-size-5"></td>
                    <td class="font-size-5"><strong>Esf.</strong></td>
                    <td class="font-size-5"><strong>Cil.</strong></td>
                    <td class="font-size-5"><strong>Eje.</strong></td>
                </tr>
                <tr>
                    <td class="font-size-4"><strong>OD</strong></td>
                    <td class="font-size-4">{{ $orden->od_esf }}</td>
                    <td class="font-size-4">{{ $orden->od_cil }}</td>
                    <td class="font-size-4">{{ $orden->od_eje }}</td>
                </tr>
                <tr>
                    <td class="font-size-4"><strong>OI</strong></td>
                    <td class="font-size-4">{{ $orden->oi_esf }}</td>
                    <td class="font-size-4">{{ $orden->oi_cil }}</td>
                    <td class="font-size-4">{{ $orden->oi_eje }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="table-formula-2" style="width:100%" class="table">
        <table>
            <tbody>
                <tr>
                    <td class="font-size-4"><strong>ADD</strong></td>
                    <td class="font-size-4">{{ $orden->add }}</td>
                    <td class="font-size-4"><strong>DP</strong></td>
                    <td class="font-size-4">{{ $orden->dp }}</td>
                    <td class="font-size-4"><strong>ALT</strong></td>
                    <td class="font-size-4">{{ $orden->alt }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="body-2" class="">
        <p class="font-size-5">Observaciones Extras: <strong>{{ $orden->observaciones_extras }}</strong></p>
        <p class="font-size-5">Total: <strong>{{ $orden->total }}</strong></p>
        <p class="font-size-5">Abono: <strong>{{ $orden->abono_1 }}</strong></p>
        <p class="font-size-5">Saldo: <strong>{{ $orden->saldo }}</strong></p>
        <p class="font-size-5">Especialista: <strong>{{ $orden->especialista }}</strong></p>
    </div>

    
    
    {{-- <img src="{!!$orden->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}"> --}}
        
        {{-- <div class="infoHeader">            
            <table>
                <tbody class="table-border">
                    <tr>
                        <td class="text-center titulo-fuente"><strong>{{ 'OPTIRANGO, C.A.' }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center subtitulo-fuente">{{ 'VISIÓN SALUD Y FUTURO' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center subtitulo-fuente">{{ 'AV. URDANETA ESQ PELOTA EDIF PROFESIONAL URDANETA PISO 7' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center subtitulo-fuente">{{ ' OF D URB CATEDRAL CARACAS DISTRITO CAPITAL' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center subtitulo-fuente">Telf. {{ '0212-642.67.97' }}, {{ '0424-640.67.97' }} {{'IG: @opti_rango'}}</td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
    

    {{-- <div class="border-bottom-solid"> 
    </div> --}}

    {{-- <div class="mt-1">
        <strong>Fecha: </strong>{{ $orden->fecha }} <strong>Numero de Orden: </strong>{{ $orden->numero_orden }}
    </div>

    <div class="mt-1">
        <strong>PACIENTE: </strong>{{ $orden->paciente }} <strong> FECHA DE NACIMIENTO: </strong> {{ $orden->edad }}
    </div> --}}
    {{-- @foreach($paciente as $paciente)
        <div class="">
            <strong>PACIENTE: </strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}   <strong>     FECHA DE NACIMIENTO: </strong>{{ $paciente->fechaNacimiento }}
        </div>
        @foreach($paciente->resultados as $index => $resultado)
            <div class="{{ $index == 0 ? 'page-break-auto' : 'page-break-auto'}}">
    
                <div class="text-center margint-top-10">
                    <strong>{{ $resultado->examen->nombre }} {{ $index }}</strong>
                </div>
    
                <div class="text-center  margint-bottom-10">
                    <strong>MUESTRA: </strong>{{ $resultado->muestra->nombre }}     <strong>FECHA: </strong>{{ $resultado->examen->created_at }}
                </div>
                
                <table class="table table-border">
                    <thead class="text-center table-border">
                        <th class="text-center table-border">EXAMEN</th>
                        <th class="text-center table-border">RESULTADO</th>
                        @if($resultado->examen->unidad == 1)
                            <th class="text-center table-border">Unidad de Medida</th>
                        @endif
                        @if($resultado->ref_inferior == 1)
                            <th class="text-center table-border">Ref. Inferior</th>
                        @endif
                        @if($resultado->ref_superior == 1)
                            <th class="text-center table-border">Ref. Superior</th>
                        @endif
                    </thead>
                        <tbody class="text-center table-border"> 
                            @foreach($resultado->resultadosDetalle as $item)
                                @isset($item->resultado)
                                    <tr class="text-center table-border">
                                        <td class="text-center table-border">{{ $item->caracteristicas->caracteristica }}</td>
                                        <td class="text-center table-border"><strong>{{ $item->resultado}}</strong></td>
                                        @if($resultado->examen->unidad == 1)
                                            <td class="text-center table-border">{{ $item->caracteristicas->unidad }}</td>
                                        @endif
                                        @if($resultado->examen->ref_inferior == 1)
                                            <td class="text-center table-border">{{ $item->caracteristicas->ref_inferior }}</td>
                                        @endif
                                        @if($resultado->examen->ref_superior == 1)
                                            <td class="text-center table-border">{{ $item->caracteristicas->ref_superior }}</td>
                                        @endif
                                    </tr>
                                @endisset
                            @endforeach
                        </tbody>
                    </table>
        @endforeach
                <div id="">
                    <p class="pie-pagina-bioanalista">BIOANALISTA</p>
                </div>
            </div>
    @endforeach --}}
    

</body>
</html>