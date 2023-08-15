@extends('layouts.app')

@section('content')

    @foreach ($resultados as $item)
        <h3>Paciente:</h3>
        <p>{{ $item->paciente->nombres. " " .$item->paciente->apellidos }}</p>
        <h3>Bioanalista:</h3>
        <p>{{ $item->bioanalista->nombres. " " .$item->bioanalista->apellidos }}</p>
        <h3>Examen:</h3>
        <p>{{ $item->examen->nombre }}</p>
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th>Caracteristica</th>
                    <th>Resultado</th>
                    <th>Referencia Inferior</th>
                    <th>Referencia Superior</th>
                    <th>Unidad de Medida</th>
                </tr>
            </thead>
            @foreach ($item->resultadosDetalle as $result)
                <tr>
                    <td>{{ $result->caracteristicas->caracteristica }}</td>
                    <td><b>{{ $result->resultado }}</b></td>
                    <td>{{ $result->caracteristicas->ref_inferior }}</td>
                    <td>{{ $result->caracteristicas->ref_superior }}</td>
                    <td>{{ $result->caracteristicas->unidad }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach

@endsection
