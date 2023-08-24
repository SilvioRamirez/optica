<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('nombre','Nombre') }}
            <br>
            <p>Indique si el examen tendrá las siguientes Caracteristicas:</p>
            {{ Form::checkboxComp('unidad','Unidad de Medida') }}
            <br>
            {{ Form::checkboxComp('ref_inferior','Referencia Inferior') }}
            <br>
            {{ Form::checkboxComp('ref_superior','Referencia Superior') }}
            <br>
            {{ Form::checkboxComp('status','Estatus') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'examenes.create') OR (Route::current()->getName() == 'examenes.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>