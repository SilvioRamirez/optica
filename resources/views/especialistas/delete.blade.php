@extends('layouts.admin.app')

@section('title', 'Eliminar Especialista')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-trash-alt"></i> Eliminar Especialista</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-trash-alt"></i> Eliminar Especialista
            </div>
            <div class="float-end">
                <a href="{{ route('especialistas.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">			
            @include('fragment.error')
            @include('fragment.success')
                    
            {!! Form::open(['method' => 'DELETE','route' => ['especialistas.destroy', $especialista->id],'style'=>'display:inline']) !!}
                    
                <h2 class="text-center">¿Está segur@ de eliminar el Especialista: <strong>{{ $especialista->nombre }}</strong>?</h2>
                <hr>
                    
                <div class="flex-center position-ref full-height">
                    <div class="top-right links text-center">
                        {!! Form::button('<i class="fa fa-trash-alt"></i> '.__('Delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-block'])  !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection