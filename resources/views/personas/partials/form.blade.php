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
            {{ Form::emailComp('correo','Correo') }}
            {{ Form::selectComp('type','Tipo', '', ['PERSONA' => 'PERSONA', 'PACIENTE' => 'PACIENTE', 'RESPONSABLE' => 'RESPONSABLE', 'ALIADO' => 'ALIADO']) }}
            {{ Form::areaComp('observacion','Observación') }}
            {{ Form::checkboxComp('status','Estatus') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'personas.create') OR (Route::current()->getName() == 'personas.edit'))
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