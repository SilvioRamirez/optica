<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('nombre','Nombre') }}
            {{ Form::checkboxComp('status','Estatus') }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'muestras.create') OR (Route::current()->getName() == 'muestras.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>