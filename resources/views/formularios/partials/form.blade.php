<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos de la Orden</h5>
            <hr>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('numero_orden','Numero de Orden', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('fecha','Fecha', null, null, '') }}
                </div>
            </div>

            {{ Form::selectComp('estatus','Estatus', '', [
                        '' => '-- Seleccione --',
                        'REGISTRADO' => 'REGISTRADO',
                        'LABORATORIO DE MONTAJE'  => 'LABORATORIO DE MONTAJE',
                        'LABORATORIO DE TALLADO' => 'LABORATORIO DE TALLADO',
                        'POR ENTREGAR' => 'POR ENTREGAR',
                        'ENTREGADO' => 'ENTREGADO' 
                        ])
                    }}
            <br>
            <h5 class="">Datos del Paciente</h5>
            <hr>

            {{ Form::textComp('paciente','Paciente', null, null, '') }}
            {{-- {{ Form::textComp('direccion_operativo','Direccion / Operativo', null, null, '') }} --}}

            {{ Form::selectComp('direccion_operativo', 'Dirección / Operativo', '', $operativos) }}

            {{-- {{ Form::label('Vehicle Type', 'Vehicle Type') }}
            <select name="vehicle_type" class="form-control">
                @foreach($operativos as $operativo) 
                    <option value="{{ $operativo}}" {{ $operativo == $operativo->nombre_operativo ? 'selected' : ''}}>{{ $operativo}}</option>
                @endforeach
            </select> --}}

            @canany(['formulario-telefono','formulario-create','formulario-edit'])
                {{ Form::textComp('telefono','Telefono', null, null, '') }}
            @endcanany

            {{ Form::textComp('cedula','Cedula', null, null, '') }}
            {{ Form::textComp('edad','Edad', null, null, '') }}

            <br>
            <h5 class="">Datos del Lente</h5>
            <hr>

            {{ Form::selectComp('tipo','Tipo', '', ['' => '-- Seleccione --', 'MONOFOCAL' => 'MONOFOCAL', 'BIFOCAL' => 'BIFOCAL', 'MULTIFOCAL' => 'MULTIFOCAL']) }}
            {{ Form::textComp('observaciones_extras','Tratamiento y Observaciones Extras', null, null, '') }}
            <div class="col-md-12 row">
                <div class="col-md-5 row">
                        <h5><strong>[R] OJO DERECHO</strong></h5>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('od_esf', 'Esf', null, null, 'Ej. +0.00') }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('od_cil', 'Cil', null, null, 'Ej. -0.00') }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('od_eje', 'Eje', null, null, 'Ej. 000') }}
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
                        <h5><strong>[L] OJO IZQUIERDO</strong></h5>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('oi_esf', 'Esf', null, null, 'Ej. +0.00') }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('oi_cil', 'Cil', null, null, 'Ej. -0.00') }}
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            {{ Form::textComp('oi_eje', 'Eje', null, null, 'Ej. 000') }}
                        </div>
                </div>
            </div>



            {{-- <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <br>
                    <h4><strong>Ojo Derecho</strong></h4>
                    <br>
                    <h4><strong>Ojo Izquierdo</strong></h4>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('od_esf','OD Esf', null, null, '') }}
                    {{ Form::textComp('oi_esf','OI Esf', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('od_cil','OD Cil', null, null, '') }}
                    {{ Form::textComp('oi_cil','OI Cil', null, null, '') }}
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('od_eje','OD Eje', null, null, '') }}
                    {{ Form::textComp('oi_eje','Oi Eje', null, null, '') }}
                </div>
            </div> --}}
            <hr>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('add','Add', null, null, 'Ej. +000') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('dp','Dp', null, null, 'Ej. 00') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('alt','Alt', null, null, 'Ej. 000') }}
                </div>
            </div> 

            {{ Form::textComp('especialista','Especialista', null, null, '') }}

            <br>
            <h5 class="">Datos del Pago y Abonos</h5>
            <hr>
            {{ Form::textComp('total','Total', null, null, '') }}
            {{ Form::readonlyComp('saldo','Saldo', null, null, '') }}
            <hr>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_1','Abono 1', null, null, '',) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_1','Abono Fecha 1', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_1', 'Tipo Pago 1', '', $tipos) }}                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_1','Ref. Pago 1', null, null, '',) }}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_2','Abono 2', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_2','Abono Fecha 2', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_2', 'Tipo Pago 2', '', $tipos) }}                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_2','Ref. Pago 2', null, null, '',) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_3','Abono 3', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_3','Abono Fecha 3', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_3', 'Tipo Pago 3', '', $tipos) }}                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_3','Ref. Pago 3', null, null, '',) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_4','Abono 4', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_4','Abono Fecha 4', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_4', 'Tipo Pago 4', '', $tipos) }}                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_4','Ref. Pago 4', null, null, '',) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_5','Abono 5', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_5','Abono Fecha 5', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_5', 'Tipo Pago 5', '', $tipos) }}                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_5','Ref. Pago 5', null, null, '',) }}
                </div>
            </div>

        </div>
    </div>

    
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'formularios.create') OR (Route::current()->getName() == 'formularios.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">

        /* Mayusculas */
        const $inputsAndTextareas = document.querySelectorAll('input, textarea')
        const handleKeyup = (event) => {
            event.target.value = event.target.value.toUpperCase()
        }
        const addHandleKeyup = ($element) => {
            $element.addEventListener('keyup', handleKeyup)
        }
        $inputsAndTextareas.forEach(addHandleKeyup)

        IMask(document.getElementById('numero_orden'),{
            mask: '000000'
        })

        IMask(document.getElementsByClassName('oi_esf')[0],{
            mask: '{s}nnnnn',
            definitions: {
                's': /[+,-]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('od_esf')[0],{
            mask: '{s}nnnnn',
            definitions: {
                's': /[+,-]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('oi_cil')[0],{
            mask: '{s}nnnn',
            definitions: {
                's': /[-]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('od_cil')[0],{
            mask: '{s}nnnn',
            definitions: {
                's': /[-]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('oi_eje')[0],{
            mask: Number,
            min: 0,
            max: 180,
        })

        IMask(document.getElementsByClassName('od_eje')[0],{
            mask: Number,
            min: 0,
            max: 180,
        })

        IMask(document.getElementById('add'),{
            mask: '{s}nnnn',
            definitions: {
                's': /[+]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementById('dp'),{
            mask: Number,
            min: 0,
            max: 99,
        })

        IMask(document.getElementById('alt'),{
            mask: Number,
            min: 0,
            max: 40,
        })

        IMask(document.getElementById('telefono'),{
            mask: '000000000000'
        })

        IMask(document.getElementById('cedula'),{
            mask: '{v}00000000-00000',
            prepareChar: str => str.toUpperCase(),
            definitions: {
                // <any single char>: <same type as mask (RegExp, Function, etc.)>
                // defaults are '0', 'a', '*'
                'v': /[V,J,G,E,P]/
            }
        })

        IMask(document.getElementById('edad'), {
            mask: '00'
        })


    </script>

    <script>

        function copy(side){

            var oi_esf = document.getElementById('oi_esf');
            var od_esf = document.getElementById('od_esf');

            var oi_cil = document.getElementById('oi_cil');
            var od_cil = document.getElementById('od_cil');

            var oi_eje = document.getElementById('oi_eje');
            var od_eje = document.getElementById('od_eje');
            
            var aesf = oi_esf;
            var besf = od_esf;

            var acil = oi_cil;
            var bcil = od_cil;

            var aeje = oi_eje;
            var beje = od_eje;

            if(side=='left'){
                besf.value = aesf.value
                bcil.value = acil.value
                beje.value = aeje.value
            }

            if(side=='right'){
                aesf.value = besf.value
                acil.value = bcil.value
                aeje.value = beje.value
            }
        }

        function suma(){
            var suma = 0;

            var abono_1 = document.getElementById('abono_1').value;
            var abono_2 = document.getElementById('abono_2').value;
            var abono_3 = document.getElementById('abono_3').value;
            var abono_4 = document.getElementById('abono_4').value;
            var abono_5 = document.getElementById('abono_5').value;

            abono_1 = (abono_1 == null || abono_1 == undefined || abono_1 == "") ? 0 : abono_1;
            abono_2 = (abono_2 == null || abono_2 == undefined || abono_2 == "") ? 0 : abono_2;
            abono_3 = (abono_3 == null || abono_3 == undefined || abono_3 == "") ? 0 : abono_3;
            abono_4 = (abono_4 == null || abono_4 == undefined || abono_4 == "") ? 0 : abono_4;
            abono_5 = (abono_5 == null || abono_5 == undefined || abono_5 == "") ? 0 : abono_5;
            abono_5 = (abono_5 == null || abono_5 == undefined || abono_5 == "") ? 0 : abono_5;

            suma = parseFloat(abono_1)+parseFloat(abono_2)+parseFloat(abono_3)+parseFloat(abono_4)+parseFloat(abono_5);

            var saldo   = document.getElementById('saldo');
            var total   = document.getElementById('total').value; 
            
            saldo.value = suma-parseFloat(total);

        }

        var abono_1 = document.getElementById('abono_1');
        var abono_2 = document.getElementById('abono_2');
        var abono_3 = document.getElementById('abono_3');
        var abono_4 = document.getElementById('abono_4');
        var abono_5 = document.getElementById('abono_5');
        var total   = document.getElementById('total');

        total.addEventListener("keyup", (event) => {
            suma();
        });

        abono_1.addEventListener("keyup", (event) => {
            suma();
        });

        abono_2.addEventListener("keyup", (event) => {
            suma();
        });

        abono_3.addEventListener("keyup", (event) => {
            suma();
        });

        abono_4.addEventListener("keyup", (event) => {
            suma();
        });

        abono_5.addEventListener("keyup", (event) => {
            suma();
        });


    </script>
@endpush