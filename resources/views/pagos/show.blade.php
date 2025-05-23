@extends('layouts.admin.app')

@section('title', 'Ver Pago')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye"></i> Ver Pago</h1>
@stop

@section('content')

{{-- BoostrapCard --}}
<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-eye"></i> Ver Pago
            </div>
            <div class="float-end">
                <a href="{{ route('pagos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>{{ __('Formulario ID')}}</strong>
                {{ $pago->formulario_id ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Numero de Orden')}}</strong>
                {{ $pago->formulario->numero_orden ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Paciente')}}</strong>
                {{ $pago->formulario->paciente ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Tipo de Pago')}}</strong>
                {{ $pago->tipo->tipo ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Monto')}}</strong>
                {{ $pago->monto ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Fecha')}}</strong>
                {{ $pago->pago_fecha  ?? 'N/A' }}
            </div>
            <div class="form-group">
                <strong>{{ __('Referencia')}}</strong>
                {{ $pago->referencia ?? 'N/A' }}
            </div>
            <div class="form-group">
                <img src="{{ asset( $pago->image_path) }}" style="width: 200; height: 200px;" alt="Imagen del Pago" class="img-fluid img-thumbnail img-responsive img-rounded">
            </div>
        </div>
    </div>
</div>

@endsection