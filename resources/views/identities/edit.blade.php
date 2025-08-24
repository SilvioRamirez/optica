@extends('layouts.admin.app')

@section('title', 'Editar Identidad')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-id-badge"></i> Editar Identidad</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">
    @include('fragment.error')
    @include('fragment.success')
    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-id-badge"></i> Editar Identidad
            </div>
            <div class="float-end">
                <a href="{{ route('identities.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::model($identity, ['method' => 'PATCH','route' => ['identities.update', $identity->id]]) !!}
                @include('identities.partials.form')
            {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection