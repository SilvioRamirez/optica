@extends('layouts.admin.app')

@section('title', 'Crear Paciente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user-plus"></i> Crear Paciente</h1>
@stop

@section('content')


<div class="col-lg-12 margin-tb">

    @include('fragment.error')

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-user-plus"></i> Crear Paciente
            </div>
            <div class="float-end">
                <a href="{{ route('pacientes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        <div class="card-body">

            {!! Form::open(array('route' => 'pacientes.store','method'=>'POST')) !!}
                @include('pacientes.partials.form')


            {!! Form::close() !!}

        </div>
    </div>
</div>
@push('scripts')
    <script type="module">
        

    </script>
@endpush
@endsection