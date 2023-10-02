@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-info text-white">
            <h5 class="card-title"><i class="fa fa-hospital-user"></i> Paciente: <strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}</strong></h5>
            <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#dhcp">Dirección</a>
                </li>
            </ul>
        </div>


        <div class="card-body tab-content">
            <div class="tab-pane active" id="dhcp">
                {!! Form::open(array('route' => 'pacientes.direccion.store','method'=>'POST')) !!}

                    {{ form::hiddenComp('paciente_id', $paciente->id)}}

                    @include('pacientes.partials.direccions')
                {!! Form::close() !!}
            </div>
        </div>

        {{-- <div class="card-footer text-muted">
            <button class="btn btn-primary" type="submit">Guardar</button>
            
        </div> --}}
    </div>

</div>
@push('scripts')
    <script type="module">
        

    </script>
@endpush
@endsection