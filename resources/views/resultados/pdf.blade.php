<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paciente: {{ $paciente->nombres}} {{ $paciente->apellidos }}</title>
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        
        @font-face{
            font-family: "Roboto";
            src: url('{{storage_path('fonts/Roboto-Light.ttf')}}') format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face{
            font-family: "Roboto";
            src: url('{{storage_path('fonts/Roboto-Regular.ttf')}}') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face{
            font-family: "Roboto";
            src: url('{{storage_path('fonts/Roboto-Bold.ttf')}}') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        .ligera{
            font-family: "Roboto";
            font-weight: 100;
        }

        .normal{
            font-family: "Roboto";
            font-weight: 400;
        }

        .bold{
            font-family: "Roboto";
            font-weight: 700;
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
            bottom: -1cm;
            top: -1cm;
            /* background-color: green; */
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
                        <td class="titulo-fuente"><strong>Laboratorio Clínico "San Benito de Palermo"</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center">Lcda. Xiomara Molina</td>
                    </tr>
                    <tr>
                        <td class="text-center">BIOANALISTA</td>
                    </tr>
                    <tr>
                        <td class="text-center">Av. 10 Entre Calles 11 y 12 Edif. Ana Maria Piso 1 Valera</td>
                    </tr>
                    <tr>
                        <td class="text-center">Estado Trujillo – Telf. 0271-2218905, 0426-4277034</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <hr >
    <div>
        <table>
            <tbody>
                <tr>
                    <td class=""><strong>PACIENTE: </strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}</td>
                </tr>
                <tr>
                    <td class=""><strong>FECHA: </strong>{{ $examen->created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
        <p class="text-center"><strong>{{ $examen->nombre }}</strong></p>

        <div class="">
            <table class="table-border">
                <thead class="text-center table-border">
                    <th class="text-center table-border">EXAMEN</th>
                    <th class="text-center table-border">RESULTADO</th>
                    <th class="text-center table-border">Unidad de Medida</th>
                    <th class="text-center table-border">Ref. Inferior</th>
                    <th class="text-center table-border">Ref. Superior</th>
                </thead>
                <tbody class="text-center table-border"> 
                    @foreach($resultado->resultadosDetalle as $item)
                        @isset($item->caracteristicas->caracteristica)
                            <tr class="text-center table-border">
                                <td class="text-center table-border">{{ $item->caracteristicas->caracteristica }}</td>
                                <td class="text-center table-border"><strong>{{ $item->resultado}}</strong></td>
                                <td class="text-center table-border">{{ $item->caracteristicas->unidad }}</td>
                                <td class="text-center table-border">{{ $item->caracteristicas->ref_inferior }}</td>
                                <td class="text-center table-border">{{ $item->caracteristicas->ref_superior }}</td>
                            </tr>
                        @endisset
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="">
            <p class="pie-pagina-bioanalista">BIOANALISTA</p>
        </div> 

    {{-- <div id="footer">
        <p class="textFooter">BIOANALISTA</p>
    </div> --}}

    {{-- <div class="container">
        @for ($i=0; $i<40; $i++)
            <div class="hijo">
                {{$i}}
            </div>
        @endfor
    </div> --}}
</body>
</html>