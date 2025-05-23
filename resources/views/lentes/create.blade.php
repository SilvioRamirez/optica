@extends('layouts.admin.app')

@section('title', 'Crear Lente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-plus"></i> Crear Lente</h1>
@stop

@section('content')

@include('fragment.error')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-plus"></i> Crear Lente
            </div>
            <div class="float-end">
                <a href="{{ route('lentes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

                @include('lentes.partials.form')

        </div>
    </div>
</div>

@endsection