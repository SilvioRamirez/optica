<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('numero_orden','Numero de Orden', null, null, '') }}
            {{ Form::textComp('fecha','Fecha', null, null, '') }}
            {{ Form::textComp('paciente','Paciente', null, null, '') }}
            {{ Form::textComp('direccion_operativo','Direccion / Operativo', null, null, '') }}
            {{ Form::textComp('telefono','Telefono', null, null, '') }}
            {{ Form::textComp('cedula','Cedula', null, null, '') }}
            {{ Form::textComp('edad','Edad', null, null, '') }}
            {{ Form::textComp('tipo','Tipo', null, null, '') }}
            {{ Form::textComp('od_esf','OD Esf', null, null, '') }}
            {{ Form::textComp('od_cil','OD Cil', null, null, '') }}
            {{ Form::textComp('od_eje','OD Eje', null, null, '') }}
            {{ Form::textComp('oi_esf','OI Esf', null, null, '') }}
            {{ Form::textComp('oi_cil','OI Cil', null, null, '') }}
            {{ Form::textComp('oi_eje','Oi Eje', null, null, '') }}
            {{ Form::textComp('add','Add', null, null, '') }}
            {{ Form::textComp('dp','Dp', null, null, '') }}
            {{ Form::textComp('alt','Alt', null, null, '') }}
            {{ Form::textComp('observaciones_extras','Observaciones Extras', null, null, '') }}
            {{ Form::textComp('total','Total', null, null, '') }}
            {{ Form::textComp('abono','Abono', null, null, '') }}
            {{ Form::textComp('saldo','Saldo', null, null, '') }}
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

    </script>
@endpush