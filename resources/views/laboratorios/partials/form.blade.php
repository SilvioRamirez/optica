<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ Form::textComp('documento_fiscal','Documento Fiscal') }}
            {{ Form::textComp('razon_social','Razón Social') }}
            <div class="row">
                <div class="col-md-3">
                    <label for="" class=""><strong>Representante de la Organización</strong></label>
                        <input type="text" class="form-control mb-2" readonly placeholder="Seleccione representante de organización">
                </div>
                <div class="col-md-1">
                    <label for="" class=""><strong>&nbsp;</strong></label><br>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#personaModal" data-bs-whatever="Persona" id="btn-personas"><i class="fa fa-users-line"></i></button type="button">
                </div>
            </div>
            
            {{ Form::textComp('representante_organizacion','Representante de la Organización') }}
            {{ Form::textComp('representante_cargo','Cargo') }}
            {{ Form::textComp('direccion_fiscal','Dirección Fiscal') }}
            {{ Form::textComp('telefono_uno','Teléfono 1') }}
            {{ Form::textComp('telefono_dos','Teléfono 2') }}
            {{ Form::textComp('correo','Correo') }}
            {{ Form::textComp('facebook','Facebook') }}
            {{ Form::textComp('instagram','Instagram') }}
            {{ Form::textComp('tiktok','Tiktok') }}

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#personaModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#personaModal" data-bs-whatever="@fat">Open modal for @fat</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#personaModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if((Route::current()->getName() == 'laboratorios.create') OR (Route::current()->getName() == 'laboratorios.edit'))
            {{ Form::submitComp() }}
        @endif
    </div>
</div>


<div class="modal fade" id="personaModal" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="personaModalLabel"><i class="fa fa-person"></i> Seleccionar Persona</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover" id="personasTable">
                    <thead class="bg-primary text-center text-white">
                        <th>ID</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="module">

        /* import DataTable from './datatables.net-dt';
        import './datatables.net-buttons-dt';
        import './datatables.net-responsive-dt'; */
        
        

    const personaModal = document.getElementById('personaModal')

        personaModal.addEventListener('show.bs.modal', event => {

            // DataTables initialisation
            let personasTable = new DataTable('#personasTable', {
                processing: true,
                serverSide: true,
                retrieve: true,
                ajax: "/api/datatablePersonas",
                columns: [
                    { data: 'id'        },
                    { data: 'cedula'    },
                    { data: 'nombres'   },
                    { data: 'apellidos' },
                    ]
            });

            personasTable.on('click', 'tbody tr', function () {
                let data = personasTable.row(this).data();
                alert('Has Seleccionado a la persona con el ID: ' + data['id'] + "'Nombres y Apellidos: "+ data['nombres'] +' '+ data['apellidos']);
            });

            personaModal.addEventListener('hidden.bs.modal', event => {
                personasTable.clear().draw();
                /* personasTable.destroy(); */
            });
    })
        

    $('#t_users tbody').on( 'click', 'tr', function () {
        var data = t_users.row(this).data();
        $('#modal-opciones-user').modal('show');
        $('#title-opciones-user').html('<strong>'+data['name']+'</strong>');
        sessionStorage.setItem('userId', data['id']);
        $('#footer-opciones-user').html(''+
            '<a href="users/edit/'+sessionStorage.userId+'" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>'+
            '<a href="users/delete/'+sessionStorage.userId+'" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Eliminar</a>'+
            '<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>');
    });

    

    $(document).ready(function () {

    });



    </script>
@endpush