@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')
    <h3>Paciente: <strong>{{ $resultado->paciente->nombres }} {{ $resultado->paciente->apellidos }}</strong></h3>
    <h3>Examen: <strong>{{ $resultado->examen->nombre }}</strong></h3>
    <h3>Bioanalista: <strong>{{ $resultado->bioanalista->nombres }} {{ $resultado->bioanalista->apellidos }}</strong></h3>
    <h3>Muestra: <strong>{{ $resultado->muestra->nombre }} </strong></h3>
    <h3>Fecha: <strong>{{ $resultado->created_at }} </strong></h3>
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-notes-medical"></i> Agregar Resultados
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'pacientes.resultados.detalles.store','method'=>'POST')) !!}

                {{ form::hiddenComp('paciente_id', $resultado->paciente_id)}}
                {{ form::hiddenComp('examen_id', $resultado->examen->id)}}
                {{ form::hiddenComp('resultado_id', $resultado->id)}}

                
                {{-- {!! Html::decode(Form::label($item->id, '<strong>'.$item->caracteristica.':</strong>')) !!}
                {!! Form::text($item->id, null, array('placeholder' => $item->caracteristica, 'id' => $item->id, 'class' => 'form-control')) !!} --}}
                
                <div class="card border-light shadow">
                    <table class="table table-striped table-hover">
                        <thead class="bg-primary text-center text-white">
                            <th>Caracteristica</th>
                            <th>Resultado</th>
                            <th>Unidad</th>
                            <th>Referencia Inferior</th>
                            <th>Referencia Superior</th>
                        </thead>
                        <tbody>
                            @foreach($caracteristicas as $item)
                                    <tr>                                        
                                        <input type="hidden" name="caracteristicas_id[{{ $item->id}}]" value="{{ $item->id}}">
                                        <td class="text-center"><b>{{ $item->caracteristica }}</b></td>
                                        <td class="text-center"><input type="text" name="resultadosDetalle[{{ $item->id }}]"> </td>
                                        <td class="text-center">{{ $item->unidad }}</td>
                                        <td class="text-center">{{ $item->ref_inferior }}</td>
                                        <td class="text-center">{{ $item->ref_superior }}</td>                                        
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                    {{ Form::submitComp() }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection