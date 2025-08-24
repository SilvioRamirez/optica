<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos de la Orden</h5>
            <hr>
            {{ Form::selectComp('cliente_id', 'Cliente', '', $clientes) }}

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('numero_orden', 'Numero de Orden', null, null, '') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::dateComp('fecha_recibida', 'Fecha Recibido', null, null, '') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::dateComp('fecha_entrega', 'Fecha Entrega', null, null, '') }}
                </div>
            </div>

            {{ Form::selectComp('status', 'Estatus', '', $estatuses) }}
            <h5 class="mt-4">Datos del Paciente</h5>
            <hr>
            {{ Form::textComp('cedula', 'Cedula', null, null, '') }}
            {{ Form::textComp('paciente', 'Paciente', null, null, '') }}
            {{ Form::textComp('edad', 'Edad', null, null, '') }}
            {{ Form::selectComp('genero', 'Genero', '', ['' => '-- Seleccione --', 'MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO']) }}
            {{-- Se revisa si la variable formulario contiene o no contiene información al momento de llegar para saber
            q valor tendra el select --}}
            @php
                if (!$orden) {
                    $tipo_lente_id = '';
                    $tipo_tratamiento_id = '';
                    $tipo_formula = '';
                }
                if ($orden) {
                    $tipo_lente_id = $orden->tipo_lente_id;
                    $tipo_tratamiento_id = $orden->tipo_tratamiento_id;
                    $tipo_formula = $orden->tipo_formula;
                }
                
            @endphp

            <h5 class="mt-4">Datos del Lente</h5>
            <hr>

            <label for="tipo-lente-dropdown mb-1"><strong>Tipo de Lente</strong></label>
            <div class="form-group mb-2">
                <select id="tipo-lente-dropdown" name="tipo_lente_id" class="form-control">
                    <option value="">-- Seleccione --</option>
                    @foreach ($tipoLentes as $data)
                        {{-- Esta parte del codigo nos permite preseleccionar el valor q tiene guardado el usuario en el
                        tipo de lente --}}
                        <option value="{{ $data->id }}" {{ $data->id == $tipo_lente_id ? 'selected=selected' : '' }}>
                            {{ $data->tipo_lente }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{ Form::hiddenComp('tipo_tratamiento_hidden_id', $tipo_tratamiento_id) }}

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

            {{-- @php
                dd($tipoFormulas);
            @endphp --}}
            
            <label for="tipo-formula-dropdown mb-1"><strong>Tipo de Formula</strong></label>
            <div class="form-group mb-2">
                <select id="tipo-formula-dropdown" name="tipo_formula" class="form-control">
                    <option value="">-- Seleccione --</option>
                    @foreach ($tipoFormulas as $key => $data)
                        {{-- Esta parte del codigo nos permite preseleccionar el valor q tiene guardado el usuario en el
                        tipo de lente --}}
                        <option value="{{ $key }}" {{ $key == $tipo_formula ? 'selected' : '' }}>
                            {{ $data }}
                        </option>
                    @endforeach
                </select>
            </div>

            <h5 class="mt-4">Datos del Pago y Abonos</h5>
            <hr>
            {{ Form::textComp('precio_cristal', 'Precio Cristal ($)', null, null, '') }}
            {{ Form::textComp('precio_montaje', 'Precio Montaje ($)', null, null, '') }}
            {{ Form::textComp('precio_total', 'Precio Total ($)', null, null, '') }}
            {{ Form::textComp('precio_descuento', 'Monto Descuento ($)', null, null, '') }}
            {{ Form::textComp('precio_saldo', 'Monto Saldo ($)', null, null, '') }}


        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'ordens.create') or (Route::current()->getName() == 'ordens.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>

@push('scripts')
    <script type="module">

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

        IMask(document.getElementById('precio_cristal'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('precio_montaje'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('precio_total'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('precio_descuento'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        IMask(document.getElementById('precio_saldo'), {
            mask: Number,
            scale: 2,
            radix: '.',
            min: 0,
            max: 10000,
        })

        /* TomSelect para el cliente */
        let tomSelectCliente;

        tomSelectCliente = new TomSelect('#cliente_id', {
            placeholder: 'Selecciona un cliente para completar la información',
            onInitialize: function () {
                // Si estamos en modo edición, el valor ya estará seleccionado por el selected del HTML
                if (document.querySelector('#cliente_id option[selected]')) {
                    const selectedText = document.querySelector('#cliente_id option[selected]').text;
                    $('#cliente_info').html(selectedText).removeClass('text-muted').addClass('text-success');
                }
            }
        });

        $(document).ready(function () {

            /*
             * Dropdown de tipos de Tratamiento 
             */

            $('#tipo-lente-dropdown').on('change', function () {
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
                    success: function (result) {
                        $('#tipo-tratamiento-dropdown').html(
                            '<option value="">-- Selecciona Tipo de Tratamiento --</option>'
                        );
                        $.each(result.tipotratamientos, function (key, value) {
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
                    success: function (result) {
                        $('#tipo-tratamiento-dropdown').html(
                            '<option value="">-- Selecciona Tipo de Tratamiento --</option>');
                        $.each(result.tipotratamientos, function (key, value) {
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

        function deshabilitarInputs(arrayDeIds) {
            arrayDeIds.forEach(id => {
                document.getElementById(id).disabled = true;
            });
        }

        deshabilitarInputs([
            'precio_saldo',
        ]);
    </script>
@endpush