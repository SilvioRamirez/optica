@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')
    <h3>Paciente: <span class="badge bg-success">{{ $paciente->nombres }} {{ $paciente->apellidos }}</span></h3>
    <h3>Imprimir Resultado: <span class="badge bg-success">{{ $examen->nombre }}</span></h3>
    <h3>Bioanalista: <span class="badge bg-success">{{ $resultado->bioanalista->nombres }} {{ $resultado->bioanalista->apellidos }}</span></h3>
    <h3>Fecha: <span class="badge bg-success">{{ $examen->created_at }}</span></h3>
    
    
    <h3>Resultados: </h3>

    <div class="card border-light shadow">
        {{-- <table class="table table-striped table-hover">
            <thead class="bg-primary text-center text-white">
                <th>Nombre del Examen</th>
                <th>Paciente</th>
                <th>Bioanalista</th>
                <th>Fecha de Creación</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($paciente->resultados as $item)
                    <tr>
                        <td class="text-center">{{ $item->examen->nombre }}</td>
                        <td class="text-center">{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                        <td class="text-center">{{ $item->bioanalista->nombres }} {{ $item->bioanalista->apellidos }}</td>
                        <td class="text-center">{{ $item->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a class="btn btn-danger btn-sm" title="Eliminar Resultados" href="{{ route('examenes.caracteristicas.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-success btn-sm" title="Agregar Resultados" href="{{ route('pacientes.resultados.detalles.index', $item->id) }}"><i class="fa fa-notes-medical"></i></a>
                                <a class="btn btn-info btn-sm" title="Imprimir Resultados" href="{{ route('pacientes.resultados.detalles.print', $item->id) }}"><i class="fa fa-print"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

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
                        <td class="text-center">{{ $registro->caracteristicas->caracteristica }}</td>
                        <td class="text-center">{{ $registro->resultado }}</td>
                        <td class="text-center">{{ $registro->caracteristicas->unidad }}</td>
                        <td class="text-center">{{ $registro->caracteristicas->ref_inferior }}</td>
                        <td class="text-center">{{ $registro->caracteristicas->ref_superior }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection