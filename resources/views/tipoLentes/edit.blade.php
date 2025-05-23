@extends('layouts.admin.app')

@section('title', 'Editar Tipo de Lente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-edit"></i> Editar Tipo de Lente</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-edit"></i> Editar Tipo de Lente
            </div>
            <div class="float-end">
                <a href="{{ route('tipoLentes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($tipoLente, ['method' => 'PATCH','route' => ['tipoLentes.update', $tipoLente->id]]) !!}
                @include('tipoLentes.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection