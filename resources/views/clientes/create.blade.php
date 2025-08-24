@extends('layouts.admin.app')

@section('title', 'Crear Tipo de Pago')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-user"></i> Crear Cliente</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-user"></i> Crear Cliente
            </div>
            <div class="float-end">
                <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'clientes.store','method'=>'POST')) !!}
                    @include('clientes.partials.form')
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