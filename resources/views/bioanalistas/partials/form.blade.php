<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
            {{ Form::textComp('cedula','Cedula o Documento') }}
            {{ Form::textComp('nombres','Nombres') }}
            {{ Form::textComp('apellidos','Apellidos') }}
            {{ Form::areaComp('direccion','Dirección') }}
            {{ Form::textComp('telefono','Teléfono') }}
            {{ Form::dateComp('fecha_nacimiento','Fecha de Nacimiento') }}            
            {{ Form::textComp('colegio','Colegio de Bioanalistas') }}
            {{ Form::textComp('documento','Documento Código') }}
            {{ Form::dateComp('fecha_ingreso','Fecha de Ingreso en el Laboratorio') }}
            {{ Form::areaComp('expediente','Expediente') }}
            {{ Form::checkboxComp('status','Estatus') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'bioanalistas.create') OR (Route::current()->getName() == 'bioanalistas.edit'))
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