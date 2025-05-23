@extends('layouts.admin.app')

@section('title', 'Crear Formulario')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-pen-to-square"></i> Crear Formulario</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-pen-to-square"></i> Agregar Nuevo Formulario
            </div>
            <div class="float-end">
                <a href="{{ route('formularios.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                @php
                    $formulario="";
                @endphp
                {!! Form::open(array('route' => 'formularios.store','method'=>'POST', 'id' => 'formularios.store', 'enctype' => 'multipart/form-data')) !!}
                    @include('formularios.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script type="module">
        

    </script>

    <script>
    
        var submitedForm = document.getElementById('formularios.store');
        var submitedButton = document.getElementById('formularios.store.submitButton')

        submitedForm.addEventListener("submit", (event) => {
            submitedButton.disabled = true;
            
        });

    </script>
@endpush
@endsection