@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')
    <h3><strong>Paciente: </strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}</h3>
    <h3><strong>Resultado: </strong>{{ $examen->nombre }}</h3>
    <h3><strong>Bioanalista: </strong>{{ $resultado->bioanalista->nombres }} {{ $resultado->bioanalista->apellidos }}</h3>
    <h3><strong>Fecha: </strong>{{ $examen->created_at }}</h3>
    <hr>
    <h3 class="text-center"><strong>Resultados:</strong></h3>
    <hr>

    <div class="card border-light shadow">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-center text-white">
                <th>Nombre de la Caracteristica</th>
                <th>Resultado del Examen</th>
                <th>Unidad de Medida</th>
                <th>Ref Inferior</th>
                <th>Ref Superior</th>
            </thead>
            <tbody>
                                {{-- @php
                                    dd($resultado->resultadosDetalle);
                                @endphp --}}
                @foreach($resultado->resultadosDetalle as $item)
                    @isset($item->resultado)
                        <tr>
                            <td class="text-center">{{ $item->caracteristicas->caracteristica }}</td>
                            <td class="text-center"><strong>{{ $item->resultado}}</strong></td>
                            <td class="text-center">{{ $item->caracteristicas->unidad }}</td>
                            <td class="text-center">{{ $item->caracteristicas->ref_inferior }}</td>
                            <td class="text-center">{{ $item->caracteristicas->ref_superior }}</td>
                        </tr>
                    @endisset
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="text-center mt-4">
            <a class="btn btn-info btn-lg" href="{{ route('pacientes.resultados.detalles.pdf', $resultado->id) }}"><i class="fa fa-file-pdf"></i> Generar PDF</a>
        </div>
</div>
@endsection