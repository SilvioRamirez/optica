<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('nombre_organizacion',        'Nombre de la Organización') }}
            {{ Form::textComp('descripcion_1',              'Descripción 1') }}
            {{ Form::textComp('descripcion_2',              'Descripción 2') }}
            {{ Form::textComp('representante_organizacion', 'Nombres del Representante de la Organización') }}
            {{ Form::textComp('representante_cargo',        'Cargo del Representante de la Organización') }}
            {{ Form::textComp('direccion',                  'Dirección 1') }}
            {{ Form::textComp('direccion_2',                'Dirección 2') }}
            {{ Form::textComp('telefono_uno',               'Telefono 1') }}
            {{ Form::textComp('telefono_dos',               'Telefono 2') }}
            {{ Form::textComp('correo',                     'Correo') }}
            {{ Form::textComp('instagram',                  'Instagram') }}
            {{ Form::textComp('pagina_web',                 'Pagina Web') }}
            {{ Form::textComp('copyright',                  'Copyright (Año)') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
        @if((Route::current()->getName() == 'configuracions.create') OR (Route::current()->getName() == 'configuracions.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>