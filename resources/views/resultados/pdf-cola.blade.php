<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cola de Impresión</title>
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        @page{
            margin: 3cm 0.5cm 1.5cm 0.5cm;
        }

        #header{
            position: fixed;
            top: -2.8cm;
            left: 0.5cm;
        }

        .imgHeader{
            float: left;
            width: 5cm;
            margin-top: 0.4cm;
        }

        .infoHeader{
            float: left;
            margin-left: -0.25cm;
        }

        .text-center{
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
            font-size: 26px;
        }

        .logo{
            
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
            border: 1px solid;
            width: 100%;
            left: 0.25cm;
            border-collapse: collapse;
        }

        hr{
            border: 0.5px solid black;
            border-radius: 5px;
            top: -0.25cm;
        }
    </style>
</head>
<body>
    <div id="header">
        <img class="imgHeader" src="{{ public_path('storage/img/logo.png') }}">

        <div class="infoHeader">            
            <table>
                <tbody>
                    <tr>
                        <td class="titulo-fuente"><strong>{{ $configOrganizacion->nombre_organizacion }}</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $configOrganizacion->representante_organizacion }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $configOrganizacion->representante_cargo }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $configOrganizacion->direccion }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">Telf. {{ $configOrganizacion->telefono_uno }}, {{ $configOrganizacion->telefono_dos }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <hr>
    @foreach($paciente as $paciente)
        <div class="text-center">
            <strong>PACIENTE: </strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}   <strong>     FECHA DE NACIMIENTO: </strong>{{ $paciente->fechaNacimiento }}
        </div>
        @foreach($paciente->resultados as $resultado)

            <div class="text-center margint-top-10">
                <strong>{{ $resultado->examen->nombre }}</strong>
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
    @endforeach

</body>
</html>