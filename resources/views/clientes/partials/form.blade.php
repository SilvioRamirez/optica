<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h5 class="">Datos del Cliente</h5>
            <hr>
            {{ Form::selectComp('identity_id','Identidad', null, $identities) }}
            {{ Form::textComp('document_number','Número de Documento', null, null, '') }}
            {{ Form::textComp('name','Nombre', null, null, '') }}
            {{ Form::emailComp('email','Email', null, null, '') }}
            {{ Form::areaComp('address','Dirección', null, null, '') }}
            {{ Form::textComp('phone','Teléfono', null, null, '') }}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'clientes.create') OR (Route::current()->getName() == 'clientes.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>

@push('scripts')
    <script type="module">
        /* Mayusculas */
        const $inputsAndTextareas = document.querySelectorAll('input, textarea')
        const handleKeyup = (event) => {
            event.target.value = event.target.value.toUpperCase()
        }

        const addHandleKeyup = ($element) => {
            $element.addEventListener('keyup', handleKeyup)
        }

        $inputsAndTextareas.forEach(addHandleKeyup)

        IMask(document.getElementById('document_number'), {
            mask: '0000000000'
        })

        IMask(document.getElementById('phone'), {
            mask: '+580000000000'
        })

    </script>

    <script>


    </script>
@endpush