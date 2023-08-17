@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h1>Resultados</h1>
                <h3>Paciente: <span class="badge bg-primary">{{ $resultado->paciente->nombres }}</span></h3>
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-center text-white">
                        <th>Nombre de la Caracteristica</th>
                        <th>Resultado del Examen</th>
                        <th>Unidad de Medida</th>
                        <th>Ref Inferior</th>
                        <th>Ref Superior</th>
                    </thead>
                    <tbody>
                        @foreach($resultado->resultadosDetalle as $registro)
                            <tr>
                                <td>{{ $registro->caracteristicas->caracteristica }}</td>
                                <td>{{ $registro->resultado }}</td>
                                <th>{{ $registro->caracteristicas->unidad }}</th>
                                <th>{{ $registro->caracteristicas->ref_inferior }}</th>
                                <th>{{ $registro->caracteristicas->ref_superior }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Detalles --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h1>Detalles</h1>
                <h3>Paciente: <span class="badge bg-primary">{{ $detalle->caracteristica_id }}</span></h3>

                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-center text-white">
                        <th>Nombre de la Caracteristica</th>
                        <th>Resultado del Examen</th>
                        <th>Unidad de Medida</th>
                        <th>Ref Inferior</th>
                        <th>Ref Superior</th>
                    </thead>
                    <tbody>
                        @foreach($detalle->resultados as $registro)
                            <tr>
                                <td>{{ $registro->bioanalista->nombres }}</td>
                                <td>{{ $registro->paciente->nombres }}</td>
                                <td>{{ $registro->examen->caracteristicas->caracteristica }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
