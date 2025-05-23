@extends('layouts.admin.app')

@section('title', 'Ver Lente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-glasses"></i> Ver Lente</h1>
@stop

@section('content')

{{-- BoostrapCard --}}
<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-glasses"></i> Ver Lente
            </div>
            <div class="float-end">
                <a href="{{ route('lentes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">
            {{-- Aquí irían los campos del lente --}}
            <div class="form-group">
                <strong>Información del Lente</strong>
                {{-- Campos específicos del lente --}}
            </div>
        </div>
    </div>
</div>

@endsection