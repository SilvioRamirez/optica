<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h2 class="text-center">Cristales</h2>
            {{-- Ojo Derecho --}}
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('ojo[]','Ojo Derecho', '', ['OJO DERECHO' => 'OJO DERECHO']) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('esfera[]', 'Esfera') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('cilindro[]', 'Cilindro') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('eje[]', 'Eje') }}
                </div>
            </div>

            {{-- Ojo Izquierdo --}}
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('ojo[]','Ojo Izquierdo', '', ['OJO IZQUIERDO' => 'OJO IZQUIERDO']) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('esfera[]', 'Esfera') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('cilindro[]', 'Cilindro') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('eje[]', 'Eje') }}
                </div>
            </div>
            
            <hr>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('adicion', 'Adición') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('distancia_pupilar', 'Distancia Pupilar') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('alt', 'Alt') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::selectComp('tipo_lente','Tipo de Lente', '', ['' => '-- Seleccione --', 'MONOFOCAL' => 'MONOFOCAL', 'BIFOCAL' => 'BIFOCAL', 'MULTIFOCAL' => 'MULTIFOCAL']) }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::selectComp('tratamiento', 'Materiales o Tratamiento', '', $tratamiento) }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('terminado', 'Terminado') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('tallado', 'Tallado') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::selectComp('status','Estatus', '', [
                        '' => '-- Seleccione --',
                        'REGISTRADO' => 'REGISTRADO',
                        'LABORATORIO DE MONTAJE'  => 'LABORATORIO DE MONTAJE',
                        'LABORATORIO DE TALLADO' => 'LABORATORIO DE TALLADO',
                        'POR ENTREGAR' => 'POR ENTREGAR',
                        'ENTREGADO' => 'ENTREGADO'
                        ]) 
                    }}
                </div>
            </div>


            <div class="text-center">
                    {{ Form::submitComp() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="module">
        

    </script>
@endpush