<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h2 class="text-center"><i class="fa fa-pen"></i> Editar Orden</h2>
                <div class="col-md-12 row">
                    {{-- <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>Paciente:</strong><br>
                        {{ $paciente->nombres }} {{ $paciente->apellidos }}
                    </div> --}}
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        
                        {{ Form::textComp('numero_orden', 'Nro. Orden') }}
                    </div>

                </div>
            <hr>
            
            <div class="col-md-12 row">
                <div class="col-md-5 row">
                        <h5><strong>OJO DERECHO</strong></h5>
                            {{ form::hiddenComp('formula_id[]', $lente->formulas[0]->id)}}
                            {{ Form::hiddenComp('ojo[]', $lente->formulas[0]->ojo)}}
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('esfera[]', 'Esf', $lente->formulas[0]->esfera) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('cilindro[]', 'Cil', $lente->formulas[0]->cilindro) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('eje[]', 'Eje', $lente->formulas[0]->eje) }}
                        </div>
                    </div>
                <div class="col-md-2 row">
                <div class="text-center mt-4 pt-4 pb-4">
                Copiar
                <br>
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm" onclick="copy('left')" data-arg1='left'><i class="fa fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-success btn-sm" onclick="copy('right')" data-arg1='right'><i class="fa fa-arrow-right"></i></button>
                </div>
                </div>
                </div>
                <div class="col-md-5 row">
                        <h5><strong>OJO IZQUIERDO</strong></h5>
                            {{ form::hiddenComp('formula_id[]', $lente->formulas[1]->id)}}
                            {{ Form::hiddenComp('ojo[]', $lente->formulas[1]->ojo)}}
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('esfera[]', 'Esf', $lente->formulas[1]->esfera) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('cilindro[]', 'Cil', $lente->formulas[1]->cilindro) }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('eje[]', 'Eje', $lente->formulas[1]->eje) }}
                        </div>
                    </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::selectComp('tipo_lente','Tipo', '', ['' => '-- Seleccione --', 'MONOFOCAL' => 'MONOFOCAL', 'BIFOCAL' => 'BIFOCAL', 'MULTIFOCAL' => 'MULTIFOCAL']) }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('adicion', 'AD') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('distancia_pupilar', 'DP') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('alt', 'Alt') }}
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    {{ Form::textComp('tallado', 'Tallado') }}
                </div>
            </div>
            
            <hr>

            <div class="row">
            <h5><strong>SELECCION DEL MATERIAL</strong></h5>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>{{__('Tratamientos')}}:</strong>
                        <br/>
                        @foreach($tratamiento as $value)                            
                            <label>{{ Form::checkbox('tratamiento[]', $value->id, in_array($value->id, $lenteTratamientos) ? true : false, array('class' => 'name')) }}
                                {{ $value->tratamiento }}
                            </label>
                        <br/>
                        @endforeach
                    </div>
                </div>
                
                {{-- <div class="col-xs-3 col-sm-2 col-md-3">
                    {{ Form::selectComp('tratamiento', 'Materiales o Tratamiento', '', $tratamiento) }}
                </div> --}}
                
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                {{ Form::hiddenComp('status', 'REGISTRADO')}}
                    {{-- {{ Form::selectComp('status','Estatus', '', [
                        /* '' => '-- Seleccione --', */
                        'REGISTRADO' => 'REGISTRADO',
                        /* 'LABORATORIO DE MONTAJE'  => 'LABORATORIO DE MONTAJE',
                        'LABORATORIO DE TALLADO' => 'LABORATORIO DE TALLADO',
                        'POR ENTREGAR' => 'POR ENTREGAR',
                        'ENTREGADO' => 'ENTREGADO' */
                        ]) 
                    }} --}}
                </div>
            </div>

            <div class="text-center">
                    {{ Form::submitComp() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>

        var k = "";

        function Geeks() {
            var esfera = document.getElementsByName('esfera[]');

            for (var i = 0; i < esfera.length; i++) {
                var a = esfera[0];

                alert(a.value);
                alert(esfera[i].value);

                k = k + "esfera[" + i + "].value= "
                                    + a.value + " ";
            }
            /* var a = esfera[0];
            alert(a.value); */
            document.getElementById("par").innerHTML = k;

        }

        function copy(side){

            var esfera      = document.getElementsByName('esfera[]');
            var cilindro    = document.getElementsByName('cilindro[]');
            var eje         = document.getElementsByName('eje[]');

            var aesf = esfera[0];
            var besf = esfera[1];

            var acil = cilindro[0];
            var bcil = cilindro[1];

            var aeje = eje[0];
            var beje = eje[1];

            if(side=='right'){
                besf.value = aesf.value
                bcil.value = acil.value
                beje.value = aeje.value
            }

            if(side=='left'){
                aesf.value = besf.value
                acil.value = bcil.value
                aeje.value = beje.value
            }
            

        }

        

    </script>
@endpush