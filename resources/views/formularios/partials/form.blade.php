<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos de la Orden</h5>
            <hr>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('numero_orden', 'Numero de Orden', null, null, '') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::dateComp('fecha', 'Fecha', null, null, '') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::dateComp('fecha_proxima_cita', 'Fecha Proxima Cita Gratuita', null, null, '') }}
                </div>
            </div>

            {{-- c --}}

            {{ Form::selectComp('estatus', 'Estatus', '', $estatuses) }}

            {{ Form::selectComp('origen_id', 'Origen del Registro', '', $origens) }}

            {{ Form::selectComp('laboratorio', 'Laboratorio', '', $laboratorios) }}

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::selectComp('ruta_entrega_id', 'Ruta de Entrega', '', $rutaEntregas) }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('fecha_entrega', 'Fecha de Entrega', null, null, '') }}
                </div>
            </div>

            <br>
            <h5 class="">Datos del Paciente</h5>
            <hr>

            <label for="refractante_id" class="mb-1 mt-2"><strong>Refractante</strong> <span id="refractante_info"
                    class="text-muted">(Autocompletar)</span></label>
            <select name="refractante_id" id="refractante_id" class="form-control mb-2" autocomplete="off">
                @foreach ($refractantes as $refractante)
                    <option value="{{ $refractante['id'] }}" data-telefono="{{ $refractante['telefono'] }}"
                        data-nombre-apellido="{{ $refractante['nombre_apellido'] }}"
                        data-id-operativo="{{ $refractante['operativo_id'] }}">
                        {{ $refractante['text'] }}
                    </option>
                @endforeach
            </select>

            
            {{ Form::textComp('paciente', 'Paciente', null, null, '') }}
            
            <label for="operativo_id" class="mb-1 mt-2"><strong>Operativo</strong> <span id="operativo_info"
                class="text-muted">(Autocompletar)</span>
            </label>
            <select name="operativo_id" id="operativo_id" class="form-control mb-2" autocomplete="off">
                @foreach ($operativos as $operativo)
                <option value="{{ $operativo['id'] }}" {{ is_object($formulario) && $formulario->operativo_id == $operativo['id'] ? 'selected' : '' }}>
                    {{ $operativo['text'] }}
                </option>
                @endforeach
            </select>

            {{-- {{ Form::selectComp('operativo_id', 'Operativo', '', $operativos, null, '', is_object($formulario) ? $formulario->operativo_id : null) }} --}}

            @canany(['formulario-telefono', 'formulario-create', 'formulario-edit'])
                {{ Form::textComp('telefono', 'Telefono', null, null, '+584121234567') }}
            @endcanany

            {{ Form::textComp('cedula', 'Cedula', null, null, '') }}

            {{ Form::textComp('edad', 'Edad', null, null, '') }}

            {{ Form::selectComp('genero', 'Genero', '', ['' => '-- Seleccione --', 'MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO']) }}

            <br>
            <h5 class="">Datos del Lente</h5>
            <hr>

            {{-- {{ Form::selectComp('tipo','Tipo', '', ['' => '-- Seleccione --', 'MONOFOCAL' => 'MONOFOCAL', 'BIFOCAL' => 'BIFOCAL', 'MULTIFOCAL' => 'MULTIFOCAL']) }} --}}

            {{-- Se revisa si la variable formulario contiene o no contiene información al momento de llegar para saber q valor tendra el select --}}
            @php
                if (!$formulario) {
                    $tipo = '';
                    $tipo_tratamiendo_id = '';
                }
                if ($formulario) {
                    $tipo = $formulario->tipo;
                    $tipo_tratamiendo_id = $formulario->tipo_tratamiento_id;
                }
            @endphp

            <label for="tipo-lente-dropdown mb-1"><strong>Tipo de Lente</strong></label>
            <div class="form-group mb-2">
                <select id="tipo-lente-dropdown" name="tipo" class="form-control">
                    <option value="">-- Seleccione --</option>
                    @foreach ($tipoLentes as $data)
                        {{-- Esta parte del codigo nos permite preseleccionar el valor q tiene guardado el usuario en el tipo de lente --}}
                        <option value="{{ $data->id }}" {{ $data->id == $tipo ? 'selected' : '' }}>
                            {{ $data->tipo_lente }}</option>
                    @endforeach
                </select>
            </div>


            {{ Form::hiddenComp('tipo_tratamiento_hidden_id', $tipo_tratamiendo_id) }}

            <label for="tipo-tratamiento-dropdown" class="mb-1"><strong>Tipo de Tratamiento</strong></label>
            <div class="form-group mb-2">
                <select id="tipo-tratamiento-dropdown" name="tipo_tratamiento_id" class="form-control">
                </select>
            </div>

            {{ Form::textComp('observaciones_extras', 'Observaciones Extras', null, null, '') }}
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
                            <button type="button" class="btn btn-success btn-sm" onclick="copy('left')"
                                data-arg1='left'><i class="fa fa-arrow-left"></i></button>
                            <button type="button" class="btn btn-success btn-sm" onclick="copy('right')"
                                data-arg1='right'><i class="fa fa-arrow-right"></i></button>
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

            <hr>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('add', 'Add', null, null, 'Ej. +000') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('dp', 'Dp', null, null, 'Ej. 00') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('alt', 'Alt', null, null, 'Ej. 000') }}
                </div>
            </div>

            {{ Form::selectComp('tipo_formula', 'Tipo de Formula', '', ['TERMINADA' => 'TERMINADA', 'TALLADA' => 'TALLADA']) }}

            {{ Form::selectComp('especialista', 'Especialista', '', $especialistas) }}

            <br>
            <h5 class="">Datos del Pago y Abonos</h5>
            <hr>
            {{ Form::numberComp('precio_montura', 'Precio Montura', null, null, '') }}
            {{ Form::numberComp('total', 'Total Lente', null, null, '') }}
            {{-- {{ Form::selectComp('descuento', 'Descuento', '', $descuentos) }} --}}
            <label for="descuento_id" class="mb-1"><strong>Descuento</strong></label>
            <select name="descuento_id" id="descuento_id" class="form-control mb-2">
                @foreach ($descuentos as $descuento)
                    <option value="{{ $descuento['id'] }}" data-porcentaje="{{ $descuento['porcentaje'] }}"
                        {{ is_object($formulario) && $formulario->descuento_id == $descuento['id'] ? 'selected' : '' }}>
                        {{ $descuento['text'] }}
                    </option>
                @endforeach
            </select>
            {{ Form::textComp('total_descuento', 'Total Descuento', null, null, '') }}
            {{ Form::readonlyComp('saldo', 'Saldo', null, null, '') }}
            {{ Form::readonlyComp('porcentaje_pago', 'Porcentaje Pagado (%)', null, null, '') }}

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::checkboxComp('cashea', 'Pago con CASHEA', is_object($formulario) ? $formulario->cashea : null, null, '') }}
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_1_decimal', 'Abono 1', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_1', 'Abono Fecha 1', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_1', 'Tipo Pago 1', '', $tipos) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_1', 'Ref. Pago 1', null, null, '') }}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_2_decimal', 'Abono 2', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_2', 'Abono Fecha 2', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_2', 'Tipo Pago 2', '', $tipos) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_2', 'Ref. Pago 2', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_3_decimal', 'Abono 3', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_3', 'Abono Fecha 3', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_3', 'Tipo Pago 3', '', $tipos) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_3', 'Ref. Pago 3', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_4_decimal', 'Abono 4', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_4', 'Abono Fecha 4', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_4', 'Tipo Pago 4', '', $tipos) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_4', 'Ref. Pago 4', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('abono_5_decimal', 'Abono 5', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::dateComp('abono_fecha_5', 'Abono Fecha 5', null, null, '') }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::selectComp('tipo_pago_5', 'Tipo Pago 5', '', $tipos) }}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    {{ Form::textComp('ref_pago_5', 'Ref. Pago 5', null, null, '') }}
                </div>
            </div>

        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if (Route::current()->getName() == 'formularios.create' or Route::current()->getName() == 'formularios.edit')
            {{ Form::submitComp('formularios.store.submitButton') }}
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

        IMask(document.getElementById('numero_orden'), {
            mask: '000000'
        })

        IMask(document.getElementsByClassName('oi_esf')[0], {
            type: 'fixed',
            mask: 'snnnnn',
            stripMask: false,
            definitions: {
                's': /[-,+,-,P,L]/,
                'n': /[P,L,'.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('od_esf')[0], {
            type: 'fixed',
            mask: 'snnnnn',
            stripMask: false,
            definitions: {
                's': /[-,+,-,P,L]/,
                'n': /[P,L,'.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('oi_cil')[0], {
            mask: '{s}nnnn',
            definitions: {
                's': /[-]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('od_cil')[0], {
            mask: '{s}nnnn',
            definitions: {
                's': /[-]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementsByClassName('oi_eje')[0], {
            mask: Number,
            min: 0,
            max: 180,
        })

        IMask(document.getElementsByClassName('od_eje')[0], {
            mask: Number,
            min: 0,
            max: 180,
        })

        IMask(document.getElementById('add'), {
            mask: '{s}nnnn',
            definitions: {
                's': /[+]/,
                'n': /['.',1,2,3,4,5,6,7,8,9,0]/,
            }
        })

        IMask(document.getElementById('dp'), {
            mask: Number,
            min: 0,
            max: 99,
        })

        IMask(document.getElementById('alt'), {
            mask: Number,
            min: 0,
            max: 40,
        })

        IMask(document.getElementById('telefono'), {
            mask: '+{00}0000000000'
        })

        IMask(document.getElementById('cedula'), {
            mask: '{v}00000000-00000',
            prepareChar: str => str.toUpperCase(),
            definitions: {
                'v': /[V,J,G,E,P,C]/
            }
        })

        IMask(document.getElementById('edad'), {
            mask: '00'
        })

        IMask(document.getElementById('abono_1_decimal'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('abono_2_decimal'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('abono_3_decimal'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('abono_4_decimal'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('abono_5_decimal'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('total'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('precio_montura'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        let tomSelectOperativo;
        let tomSelectRefractante;

        tomSelectRefractante = new TomSelect('#refractante_id', {
            placeholder: 'Selecciona un refractante para completar la información',
            onChange: function(value) {
                if (value) {
                    // Obtener el option seleccionado para acceder a los atributos data-*
                    var selectedOption = document.querySelector('#refractante_id option[value="' + value + '"]');
                    
                    if (selectedOption) {
                        var telefono = selectedOption.getAttribute('data-telefono');
                        var nombreApellido = selectedOption.getAttribute('data-nombre-apellido');
                        var idOperativo = selectedOption.getAttribute('data-id-operativo');

                        // Autocompletar campos del formulario
                        var pacienteInput = document.getElementById('paciente');
                        var telefonoInput = document.getElementById('telefono');

                        if (idOperativo) {
                            // Actualizar el TomSelect de operativo
                            tomSelectOperativo.setValue(idOperativo, true);
                        }

                        if (pacienteInput && nombreApellido) {
                            pacienteInput.value = nombreApellido;
                        }

                        if (telefonoInput && telefono) {
                            telefonoInput.value = telefono;
                        }

                        // Actualizar el span de información
                        if (nombreApellido && telefono) {
                            $('#refractante_info').html(nombreApellido + ' (' + telefono + ')').removeClass(
                                'text-muted').addClass('text-success');
                        }
                    }
                }
            }
        });

        tomSelectOperativo = new TomSelect('#operativo_id', {
            placeholder: 'Selecciona un operativo para completar la información',
            onInitialize: function() {
                // Si estamos en modo edición, el valor ya estará seleccionado por el selected del HTML
                if (document.querySelector('#operativo_id option[selected]')) {
                    const selectedText = document.querySelector('#operativo_id option[selected]').text;
                    $('#operativo_info').html(selectedText).removeClass('text-muted').addClass('text-success');
                }
            }
        });
        
        $(document).ready(function() {

            /*
             * Dropdown de tipos de Tratamiento 
             */

            $('#tipo-lente-dropdown').on('change', function() {
                var tipo = this.value;
                $("#tipo-tratamiento-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-tipo-tratamientos') }}",
                    type: "POST",
                    data: {
                        tipo_lente_id: tipo,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#tipo-tratamiento-dropdown').html(
                            '<option value="">-- Selecciona Tipo de Tratamiento --</option>'
                        );
                        $.each(result.tipotratamientos, function(key, value) {
                            $("#tipo-tratamiento-dropdown").append('<option value="' +
                                value
                                .id + '">' + value.tipo_tratamiento + '</option>');
                        });
                    }
                });
            });

            /* Funcion q rellena el edit del select */

            var tipo_preselect = document.getElementById('tipo-lente-dropdown').value;

            if (tipo_preselect === "") {
                /* console.log('strValue was empty string') */

            } else {
                /* console.log(tipo_preselect); */
                $("#tipo-tratamiento-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-tipo-tratamientos') }}",
                    type: "POST",
                    data: {
                        tipo_lente_id: tipo_preselect,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#tipo-tratamiento-dropdown').html(
                            '<option value="">-- Selecciona Tipo de Tratamiento --</option>');
                        $.each(result.tipotratamientos, function(key, value) {
                            $("#tipo-tratamiento-dropdown").append('<option value="' + value
                                .id + '">' + value.tipo_tratamiento + '</option>');
                        });

                        var tipo_tratamiento_hidden_id = document.getElementById(
                            'tipo_tratamiento_hidden_id').value;

                        document.getElementById('tipo-tratamiento-dropdown').value =
                            tipo_tratamiento_hidden_id;
                    }
                });
            }
        });
    </script>

    <script>
        //Funcion que se utiliza para copiar los valores del ojo izquierdo y derecho

        function copy(side) {

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

            if (side == 'left') {
                besf.value = aesf.value
                bcil.value = acil.value
                beje.value = aeje.value
            }

            if (side == 'right') {
                aesf.value = besf.value
                acil.value = bcil.value
                aeje.value = beje.value
            }
        }

        /* Funcion que agrega un año a la fecha seleccionada */

        var fecha = document.getElementById('fecha');

        fecha.addEventListener("change", (event) => {
            /* console.log(fecha.value); */

            const aYearFromNow = new Date(fecha.value);
            aYearFromNow.setFullYear(aYearFromNow.getFullYear() + 1);
            /* console.log(aYearFromNow); */

            var toDate = aYearFromNow.toISOString().slice(0, 10);

            fecha_proxima_cita = document.getElementById('fecha_proxima_cita');
            fecha_proxima_cita.value = toDate;

        });

        function deshabilitarInputs(arrayDeIds) {
            arrayDeIds.forEach(id => {
                document.getElementById(id).disabled = true;
            });
        }

        deshabilitarInputs([
            'saldo',
            'porcentaje_pago',
            'abono_1_decimal',
            'abono_fecha_1',
            'tipo_pago_1',
            'ref_pago_1',
            'abono_2_decimal',
            'abono_fecha_2',
            'tipo_pago_2',
            'ref_pago_2',
            'abono_3_decimal',
            'abono_fecha_3',
            'tipo_pago_3',
            'ref_pago_3',
            'abono_4_decimal',
            'abono_fecha_4',
            'tipo_pago_4',
            'ref_pago_4',
            'abono_5_decimal',
            'abono_fecha_5',
            'tipo_pago_5',
            'ref_pago_5'
        ]);
    </script>
@endpush
