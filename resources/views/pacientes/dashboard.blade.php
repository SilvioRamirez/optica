@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')
    @include('fragment.success')
    
    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-info text-white">
            <h5 class="card-title"><i class="fa fa-hospital-user"></i> Paciente: <strong>{{ $paciente->nombres }} {{ $paciente->apellidos }}</strong></h5>
            <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#datos"><i class="fa fa-person"></i> Datos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#direccion"><i class="fa fa-location-dot"></i> Dirección</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#lentes"><i class="fa fa-glasses"></i> Lentes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pagos"><i class="fa fa-hand-holding-dollar"></i> Pagos</a>
                </li>

            </ul>
        </div>


        <div class="card-body tab-content">
            <div class="tab-pane active" id="datos">
                @include('pacientes.partials.show-data')
                
            </div>
            <div class="tab-pane" id="direccion">
                @include('pacientes.partials.show-direccions')
            </div>
            <div class="tab-pane" id="lentes">
                @include('pacientes.partials.show-lentes')
            </div>
            <div class="tab-pane" id="pagos">
                
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