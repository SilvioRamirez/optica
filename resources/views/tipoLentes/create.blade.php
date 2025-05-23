@extends('layouts.admin.app')

@section('title', 'Crear Tipo de Lente')

@section('content_header')
    <h1 class="text-center"><i class="fa fa-glasses"></i> Crear Tipo de Lente</h1>
@stop

@section('content')

<div class="col-lg-12 margin-tb">

    @include('fragment.error')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-primary text-white">
            <div class="float-start">
                <i class="fa fa-glasses"></i> Crear Tipo de Lente
            </div>
            <div class="float-end">
                <a href="{{ route('tipoLentes.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>
                    {{ __('Volver') }}</a>
            </div>
        </div>
        
        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'tipoLentes.store','method'=>'POST')) !!}
                    @include('tipoLentes.partials.form')
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