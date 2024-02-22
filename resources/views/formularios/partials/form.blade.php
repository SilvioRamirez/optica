<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('fecha','Fecha', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('numero_orden','Numero de Orden', null, null, '') }}
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
            {{ Form::textComp('paciente','Paciente', null, null, '') }}
            {{ Form::textComp('cedula','Cedula', null, null, '') }}
            {{ Form::textComp('edad','Edad', null, null, '') }}
            {{ Form::textComp('telefono','Telefono', null, null, '') }}
            {{ Form::textComp('direccion_operativo','Direccion / Operativo', null, null, '') }}
            {{ Form::selectComp('tipo','Tipo', '', ['' => '-- Seleccione --', 'MONOFOCAL' => 'MONOFOCAL', 'BIFOCAL' => 'BIFOCAL', 'MULTIFOCAL' => 'MULTIFOCAL']) }}
            {{ Form::textComp('observaciones_extras','Tratamiento y Observaciones Extras', null, null, '') }}
            
            <div class="row">
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
            </div>

            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('add','Add', null, null, '') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('dp','Dp', null, null, '') }}
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    {{ Form::textComp('alt','Alt', null, null, '') }}
                </div>
            </div>

            <hr>

            {{ Form::textComp('total','Total', null, null, '') }}
            {{ Form::textComp('saldo','Saldo', null, null, '') }}
            <hr>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('abono_1','Abono 1', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('abono_fecha_1','Abono Fecha 1', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('abono_2','Abono 2', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('abono_fecha_2','Abono Fecha 2', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('abono_3','Abono 3', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('abono_fecha_3','Abono Fecha 3', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('abono_4','Abono 4', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('abono_fecha_4','Abono Fecha 4', null, null, '') }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::textComp('abono_5','Abono 5', null, null, '') }}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{ Form::dateComp('abono_fecha_5','Abono Fecha 5', null, null, '') }}
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

    </script>
@endpush