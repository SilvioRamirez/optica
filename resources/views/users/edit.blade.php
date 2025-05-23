@extends('layouts.admin.app')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user-edit"></i> Editar Usuario</h1>
@stop

@section('content')

    <div class="col-lg-12 margin-tb">
        @include('fragment.error')
        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                <div class="float-start">
                    <i class="fa fa-user-edit"></i> Editar Usuario
                </div>
                <div class="float-end">
                    <a href="{{ route('users.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                        {{ __('Volver') }}</a>
                </div>
            </div>
            <div class="card-body">

                @include('users.partials.form-edit')

            </div>
        </div>
    </div>

@endsection
