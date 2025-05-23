@extends('layouts.app')

@section('title', 'Crear Tipo de Tratamiento')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-flask-vial"></i> Crear Tipo de Tratamiento</h1>
@stop

@section('content')


<div class="col-lg-12 margin-tb">

    @include('fragment.error')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-flask-vial"></i> Crear Tipo de Tratamiento
            </div>
            <div class="float-end">
                <a href="{{ route('tipoTratamientos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'tipoTratamientos.store','method'=>'POST')) !!}
                    @include('tipoTratamientos.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script type="module">
        

    </script>
@endpush
@endsection