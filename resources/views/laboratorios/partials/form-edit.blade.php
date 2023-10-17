{!! Form::model($laboratorio, ['method' => 'PATCH','route' => ['laboratorios.update', $laboratorio->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ Form::textComp('documento_fiscal','Documento Fiscal') }}
                {{ Form::textComp('razon_social','Razón Social') }}
                {{ Form::textComp('representante_organizacion','Representante de la Organización') }}
                {{ Form::textComp('representante_cargo','Cargo') }}
                {{ Form::textComp('direccion_fiscal','Dirección Fiscal') }}
                {{ Form::textComp('telefono_uno','Teléfono 1') }}
                {{ Form::textComp('telefono_dos','Teléfono 2') }}
                {{ Form::textComp('correo','Correo') }}
                {{ Form::textComp('facebook','Facebook') }}
                {{ Form::textComp('instagram','Instagram') }}
                {{ Form::textComp('tiktok','Tiktok') }}
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            @if((Route::current()->getName() == 'laboratorios.create') OR (Route::current()->getName() == 'laboratorios.edit'))
                {{ Form::submitComp() }}
            @endif
        </div>
    </div>
{!! Form::close() !!}