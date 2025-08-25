@extends('layouts.admin.app')

@section('title', 'Crear Identidad')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-id-badge"></i> Crear Estatus de Orden</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-id-badge"></i> Crear Estatus de Orden
            </div>
            <div class="float-end">
                <a href="{{ route('orden-statuses.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'orden-statuses.store','method'=>'POST')) !!}
                    @include('ordenStatuses.partials.form')
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