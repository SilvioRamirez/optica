@extends('layouts.app')

@section('content')

<a class="btn btn-primary btn-sm mb-2" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> {{ __('Back')}}</a>


<div class="col-lg-12 margin-tb">

    @include('fragment.error')

    <div class="card border-light mb-3 shadow">

        <div class="card-header bg-info text-white">
            <h5 class="card-title"><i class="fa fa-hospital-user"></i> Paciente: 
                <strong>
                    @foreach($lente->pacientes as $paciente)
                        {{ $paciente->nombres }} {{ $paciente->apellidos }}
                    @endforeach
                </strong>
            </h5>
            <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#lente"><i class="fa fa-glasses"></i> Lente <strong>ID:</strong> {{ $lente->id }}</a>
                </li>
            </ul>
        </div>


        <div class="card-body tab-content">
            <div class="tab-pane active" id="lente">
            <h2 class="text-center"><i class="fa fa-eye"></i> Visualizar Orden</h2>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>Nro. Orden: </x-slot>
                            <x-slot:value>{{ !empty($lente->numero_orden) ? $lente->numero_orden : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>Estatus: </x-slot>
                            <x-slot:value>{{ !empty($lente->status) ? $lente->status : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>
                </div>
                <hr>
                    
                @foreach($lente->formulas as $formula)
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <x-showText>
                                <x-slot:label>Ojo: </x-slot>
                                <x-slot:value>{{ !empty($formula->ojo) ? $formula->ojo : 'N/A' }} </x-slot>
                            </x-showText>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <x-showText>
                                <x-slot:label>Esf: </x-slot>
                                <x-slot:value>{{ !empty($formula->esfera) ? $formula->esfera : 'N/A' }} </x-slot>
                            </x-showText>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <x-showText>
                                <x-slot:label>Cil: </x-slot>
                                <x-slot:value>{{ !empty($formula->cilindro) ? $formula->cilindro : 'N/A' }} </x-slot>
                            </x-showText>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <x-showText>
                                <x-slot:label>Eje: </x-slot>
                                <x-slot:value>{{ !empty($formula->eje) ? $formula->eje : 'N/A' }} </x-slot>
                            </x-showText>
                        </div>

                    </div>                    
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>Tipo de Lente: </x-slot>
                            <x-slot:value>{{ !empty($lente->tipo_lente) ? $lente->tipo_lente : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>AD: </x-slot>
                            <x-slot:value>{{ !empty($lente->adicion) ? $lente->adicion : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>
 
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>DP: </x-slot>
                            <x-slot:value>{{ !empty($lente->distancia_pupilar) ? $lente->distancia_pupilar : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>
                    
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>Alt: </x-slot>
                            <x-slot:value>{{ !empty($lente->alt) ? $lente->alt : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <x-showText>
                            <x-slot:label>Tallado: </x-slot>
                            <x-slot:value>{{ !empty($lente->tallado) ? $lente->tallado : 'N/A' }}</x-slot>
                        </x-showText>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                <h5><strong>Tratamientos: </strong></h5>
                    @foreach($lente->tratamientos as $tratamiento)
                        <span class="">- {{ $tratamiento->tratamiento }}</span>
                        <br>
                    @endforeach
                </div>
             
                
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