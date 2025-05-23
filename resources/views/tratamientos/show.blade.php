@extends('layouts.admin.app')

@section('title', 'Ver Tratamiento')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-eye-dropper"></i> Ver Tratamiento</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-eye-dropper"></i> Ver Tratamiento
            </div>
            <div class="float-end">
                <a href="{{ route('tratamientos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($tratamiento, ['method' => 'PATCH','route' => ['tratamientos.update', $tratamiento->id]]) !!}
                @include('tratamientos.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
