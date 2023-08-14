<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
            {{ Form::textComp('cedula','Cedula o Documento') }}
            {{ Form::textComp('nombres','Nombres') }}
            {{ Form::textComp('apellidos','Apellidos') }}
            {{ Form::dateComp('fecha_nacimiento','Fecha de Nacimiento') }}
            {{ Form::numberComp('edad','Edad') }}
            {{ Form::selectComp('sexo','Sexo', '', ['MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO']) }}            
            {{ Form::textComp('telefono','Teléfono') }}
            {{ Form::areaComp('direccion','Dirección') }}
            {{ Form::emailComp('correo','Correo') }}
            {{ Form::areaComp('observacion','Observación') }}
            {{ Form::checkboxComp('status','Estatus') }}

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
            mask: '0000-0000000'
        })

        IMask(document.getElementById('cedula'),{
            mask: '[a]00000000-0'
        })
    </script>

@endpush