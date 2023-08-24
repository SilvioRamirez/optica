@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')
    <h1>Caracteristicas para el Examen de <span class="badge bg-success">{{ $examen->nombre }}</span></h1>
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-notes-medical"></i> Agregar 
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'examenes.caracteristicas.store','method'=>'POST')) !!}
                {{ form::hiddenComp('examen_id', $examen->id)}}
                {{ Form::textComp('caracteristica','Nombre de La Caracteristica') }}
                {{ Form::textComp('unidad','Unidad de Medida') }}
                {{ Form::textComp('ref_inferior','Referencia Inferior') }}
                {{ Form::textComp('ref_superior','Referencia Superior') }}
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    {{ Form::submitComp() }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="card border-light shadow">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-center text-white">
                <th>Nombre de la Caracteristica</th>
                <th>Unidad de Medida</th>
                <th>Ref Inferior</th>
                <th>Ref Superior</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach($examen->caracteristicas as $item)
                    <tr>
                        <td class="text-center">{{ $item->caracteristica }}</td>
                        <td class="text-center">{{ $item->unidad }}</td>
                        <td class="text-center">{{ $item->ref_inferior }}</td>
                        <td class="text-center">{{ $item->ref_superior }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <a class="btn btn-primary btn-sm" title="Editar Caracteristica" href="{{ route('examenes.caracteristicas.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" title="Eliminar Caracteristica" href="{{ route('examenes.caracteristicas.destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection