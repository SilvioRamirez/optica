<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos de la Identidad</h5>
            <hr>
            {{ Form::textComp('name','Nombre', null, null, '') }}
            {{ Form::textComp('description','Descripción', null, null, '') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'identities.create') OR (Route::current()->getName() == 'identities.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>

@push('scripts')
    <script type="module">


    </script>

    <script>


    </script>
@endpush