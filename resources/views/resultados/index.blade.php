@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')
    <h1>PACIENTE: <strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}</strong></h1>
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-notes-medical"></i> Agregar nuevo resultado al paciente
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'pacientes.resultados.store','method'=>'POST')) !!}

                {{ form::hiddenComp('paciente_id', $paciente->id)}}

                <div class="form-group required mb-3">
                    <p class='text-sm'> <strong>Seleccione el Examen:</strong> </p>
                        <select name="examen_id" id="examen_id" class="form-select text-sm">
                                @foreach ($examen as $item)
                                    <option  value="{{ $item->id }}"> {{ $item->nombre }}  </option>
                                @endforeach
                        </select>
                </div>

                <div class="form-group required mb-3">
                    <p class='text-sm'> <strong>Seleccione el Tipo de Muestra:</strong> </p>
                        <select name="muestra_id" id="muestra_id" class="form-select text-sm">
                                @foreach ($muestra as $item)
                                    <option  value="{{ $item->id }}"> {{ $item->nombre }}  </option>
                                @endforeach
                        </select>
                </div>

                <div class="form-group required mb-3">
                    <p class='text-sm'> <strong>Seleccione el Bioanalista:</strong> </p>
                        <select name="bioanalista_id" id="bioanalista_id" class="form-select text-sm">
                                @foreach($bioanalista as $item)
                                    <option value="{{ $item->id }}"> {{ $item->nombres }} {{ $item->apellidos }}  </option>
                                @endforeach
                        </select>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    {{ Form::submitComp() }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <h1>Historico de Examenes: </h1>

    <div class="card border-light shadow">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-center text-white">
                <th>N°</th>
                <th>Nombre del Examen</th>
                <th>Paciente</th>
                <th>Bioanalista</th>
                <th>Muestra</th>
                <th>Fecha de Creación</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($paciente->resultados as $item)
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">{{ $item->examen->nombre }}</td>
                        <td class="text-center">{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                        <td class="text-center">{{ $item->bioanalista->nombres }} {{ $item->bioanalista->apellidos }}</td>
                        <td class="text-center">{{ $item->muestra->nombre }}</td>
                        <td class="text-center">{{ $item->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a class="btn btn-danger btn-sm" title="Eliminar Resultados" href="{{ route('pacientes.resultados.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-success btn-sm" title="Agregar Resultados" href="{{ route('pacientes.resultados.detalles.index', $item->id) }}"><i class="fa fa-notes-medical"></i></a>
                                <a class="btn btn-info btn-sm" title="Imprimir Resultados" href="{{ route('pacientes.resultados.detalles.print', $item->id) }}"><i class="fa fa-print"></i></a>
                                <a class="btn btn-dark btn-sm" title="Agregar a cola de impresión" href="{{ route('pacientes.resultados.detalles.cola', $item->id) }}"><i class="fa fa-list-check"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h1>Cola de Impresión: </h1>

    <div class="card border-light shadow">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-center text-white">
                <th>Nº Cola</th>
                <th>Paciente</th>
                <th>Nombre del Examen</th>
                <th>Muestra</th>
                <th>Fecha del Examen</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($cola as $item)
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">{{ $item->nombres }} {{ $item->apellidos }}</td>
                        {{-- @php
                            dd($item->resultados);
                        @endphp --}}
                        <td class="text-center">
                            @foreach($item->resultados as $resultado)
                                {{ $resultado->examen->nombre }}
                            @endforeach
                        </td>
                        {{-- <td class="text-center">{{ $item->muestra->nombre }}</td>
                        <td class="text-center">{{ $item->created_at }}</td> --}}
                        <td>
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a class="btn btn-danger btn-sm" title="Eliminar de la Cola" href="{{ route('pacientes.resultados.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    

    <a class="btn btn-danger btn-sm" title="Eliminar cola de impresión" href="{{ route('pacientes.resultados.detalles.cola.delete') }}"><i class="fa fa-trash"></i> Eliminar Cola de Impresión</a>
</div>

@endsection