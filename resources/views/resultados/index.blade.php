@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')
    <h1>Resultados de Examenes de: <span class="badge bg-success">{{ $paciente->nombres }} {{ $paciente->apellidos }}</span></h1>
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
                    <p class='text-sm'> <strong>Seleccione el Bioanalista:</strong> </p>
                        <select name="bioanalista_id" id="bioanalista_id" class="form-select text-sm">
                                @foreach ($bioanalista as $item)
                                    <option  value="{{ $item->id }}"> {{ $item->nombres }} {{ $item->apellidos }}  </option>
                                @endforeach
                        </select>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    {{ Form::submitComp() }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <h1>Historico de Resultados: </h1>

    <div class="card border-light shadow">
        <table class="table table-striped table-hover">
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
                                <a class="btn btn-danger btn-sm" title="Eliminar caracteristica" href="{{ route('examenes.caracteristicas.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection