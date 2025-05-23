@extends('layouts.admin.app')

@section('title', 'Crear Tipo de Gasto')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-file-invoice-dollar"></i> Crear Tipo de Gasto</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-file-invoice-dollar"></i> Crear Tipo de Gasto
            </div>
            <div class="float-end">
                <a href="{{ route('tipoGastos.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'tipoGastos.store','method'=>'POST')) !!}
                    @include('tipoGastos.partials.form')
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