<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
            <strong>{{__('Cedula o Documento')}}: </strong>
            {!! Form::text('cedula', null, array('placeholder' => __('Cedula o Documento'),'class' => 'form-control')) !!}
            
            <strong>{{__('Nombres')}}: </strong>
            {!! Form::text('nombres', null, array('placeholder' => __('Nombres'),'class' => 'form-control')) !!}

            <strong>{{__('Apellidos')}}: </strong>
            {!! Form::text('apellidos', null, array('placeholder' => __('Apellidos'),'class' => 'form-control')) !!}

            <strong>{{__('Fecha de Nacimiento')}}: </strong>
            {!! Form::date('fecha_nacimiento', null, array('placeholder' => __('Fecha de Nacimiento'),'class' => 'form-control')) !!}

            <strong>{{__('Edad')}}: </strong>
            {!! Form::text('edad', null, array('placeholder' => __('Edad'),'class' => 'form-control')) !!}
            
            <strong>{{__('Sexo')}}: </strong>
            {!! Form::select('sexo', ['MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO'], array('placeholder' => __('SEXO'),'class' => 'form-control')) !!}
            
            
            <strong>{{__('Telefono')}}: </strong>
            {!! Form::text('telefono', null, array('placeholder' => __('Telefono'),'class' => 'form-control')) !!}

            <strong>{{__('Direccion')}}: </strong>
            {!! Form::text('direccion', null, array('placeholder' => __('Direccion'),'class' => 'form-control')) !!}

            <strong>{{__('Correo')}}: </strong>
            {!! Form::email('correo', null, array('placeholder' => __('Correo'),'class' => 'form-control')) !!}

            <strong>{{__('Observacion')}}: </strong>
            {!! Form::textarea('observacion', null, array('placeholder' => __('Observacion'),'class' => 'form-control')) !!}

            <strong>{{__('Estatus')}}: </strong>
            {!! Form::checkbox('status', null, array('placeholder' => __('Estatus'),'class' => 'form-control')) !!}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        {!! Form::button('<i class="fa fa-save"></i> '.__('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'] )  !!}
    </div>
</div>