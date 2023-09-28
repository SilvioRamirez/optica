<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('cedula','Cedula o Documento', null, null, 'V12345678-0') }}
            {{ Form::textComp('nombres','Nombres') }}
            {{ Form::textComp('apellidos','Apellidos') }}
            {{ Form::dateComp('fecha_nacimiento','Fecha de Nacimiento') }}
            {{ Form::numberComp('edad','Edad') }}
            {{ Form::selectComp('sexo','Sexo', '', ['MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO']) }}
            {{ Form::textComp('telefono','Teléfono', null, null,'+58 0412-1231234') }}
            <div class="form-group mb-3">
                <select  id="estado-dropdown" class="form-control">
                    <option value="">-- Seleccionar Estado --</option>
                        @foreach ($estados as $data)
                            <option value="{{$data->id_estado}}">
                                {{$data->estado}}
                            </option>
                        @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <select id="municipio-dropdown" class="form-control">
                </select>
            </div>

            <div class="form-group">
                <select id="parroquia-dropdown" class="form-control">
                </select>
            </div>
            
            {{ Form::textComp('sector','Sector') }}
            {{ Form::areaComp('direccion','Dirección') }}
            {{ Form::areaComp('lugar_registro','Lugar de Registro (Operativo)') }}
            {{ Form::emailComp('correo','Correo') }}
            {{ Form::areaComp('observacion','Observación') }}
            {{ Form::checkboxComp('status','Estatus') }}
            {{ Form::selectComp('id_estado','Estado', '', $estados) }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'pacientes.create') OR (Route::current()->getName() == 'pacientes.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>
@push('scripts')

    <script type="module">
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
    </script>

@endpush