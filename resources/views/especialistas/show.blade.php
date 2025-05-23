@extends('layouts.admin.app')

@section('title', 'Ver Especialista')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-hand-holding-dollar"></i> Ver Especialista</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-hand-holding-dollar"></i> Ver Especialista
            </div>
            <div class="float-end">
                <a href="{{ route('especialistas.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($tipo, ['method' => 'PATCH','route' => ['especialistas.update', $especialista->id]]) !!}
                @include('especialistas.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
