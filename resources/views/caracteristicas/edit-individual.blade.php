@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>

<div class="col-lg-12 margin-tb">
    @include('fragment.success')
    @include('fragment.error')

    
    <h1>Editar Caracteristica: <strong>{{ $caracteristicas->caracteristica }}</strong></h1>
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white"><i class="fa fa-notes-medical"></i> Agregar 
        </div>
        <div class="card-body">
            {!! Form::model($caracteristicas, ['method' => 'PATCH','route' => ['examenes.caracteristicas.update', $caracteristicas->id]]) !!}
                {{ form::hiddenComp('id', $caracteristicas->id)}}
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
</div>
@endsection