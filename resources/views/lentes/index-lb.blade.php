@extends('layouts.app')

@section('content')

<div class="row">
    @include('fragment.error')
    @include('fragment.success')
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h1><i class="fa fa-check"></i> Administración de Lentes en Laboratorios</h1>
        </div>
        @can('user-create')
        @endcan
    </div>
</div>

    <div class="card border-light mb-3 shadow">
        <div class="card-header bg-primary text-white">
            Administración de Lentes
        </div>
        <div class="card-body">
                
        
            {{ $dataTable->table() }}
        
    </div>
        </div>
    </div>
</div>

<div class="modal fade" id="prLenteModal" tabindex="-1" aria-labelledby="prLenteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="prLenteModalLabel"><i class="fa fa-check"></i> Revisar Lente</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h2 class="text-center"><i class="fa fa-check mb-2"></i> Revisar Lente</h2>
                                <div class="col-md-12 row">
                                    <h2 id="paciente">Paciente: </h2>
                                    <hr>
                                    <h2><strong>Lente</strong></h2>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        {{ Form::hiddenComp('lente_id') }}
                                        {{ Form::readonlyComp('numero_orden', 'Nro. Orden') }}
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        {{-- {{ Form::readonlyComp('status', 'Estatus ')}} --}}
                                        <h5 id="status" class="mb-2">Estatus: </h5>
                                    </div>

                                </div>
                            <hr>
                            
                            <div class="col-md-12 row">
                                <div class="col-md-5 row">
                                        <h5><strong>OJO DERECHO</strong></h5>
                                            {{ form::hiddenComp('formula_id[]', /* $lente->formulas[0]->id */)}}
                                            {{ Form::hiddenComp('ojo[]', /* $lente->formulas[0]->ojo */)}}
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::readonlyComp('esfera[]', 'Esf', /* $lente->formulas[0]->esfera */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::readonlyComp('cilindro[]', 'Cil', /* $lente->formulas[0]->cilindro */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::readonlyComp('eje[]', 'Eje', /* $lente->formulas[0]->eje */) }}
                                        </div>
                                    </div>
                                <div class="col-md-2 row">
                                <div class="text-center mt-4 pt-4 pb-4">
                                <br>
                                </div>
                                </div>
                                <div class="col-md-5 row">
                                        <h5><strong>OJO IZQUIERDO</strong></h5>
                                            {{ form::hiddenComp('formula_id[]', /* $lente->formulas[1]->id */)}}
                                            {{ Form::hiddenComp('ojo[]', /* $lente->formulas[1]->ojo */)}}
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::readonlyComp('esfera[]', 'Esf', /* $lente->formulas[1]->esfera */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::readonlyComp('cilindro[]', 'Cil', /* $lente->formulas[1]->cilindro */) }}
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::readonlyComp('eje[]', 'Eje', /* $lente->formulas[1]->eje */) }}
                                        </div>
                                    </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::readonlyComp('tipo_lente','Tipo') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::readonlyComp('adicion', 'AD') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::readonlyComp('distancia_pupilar', 'DP') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::readonlyComp('alt', 'Alt') }}
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    {{ Form::readonlyComp('tallado', 'Tallado') }}
                                </div>
                            </div>
                            
                            <hr>

                            <div class="row">
                            <h5><strong>SELECCION DEL MATERIAL</strong></h5>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>{{__('Tratamientos')}}:</strong>
                                        
                                        <p id="tratamientos"></p>
                                        
                                    </div>
                                </div>
                                
                                {{-- <div class="col-xs-3 col-sm-2 col-md-3">
                                    {{ Form::selectComp('tratamiento', 'Materiales o Tratamiento', '', $tratamiento) }}
                                </div> --}}
                                
                            </div>
                            <hr>
                            <div class="row">
                                
                            </div>
                            <div class="row">
                                <h5><strong>Laboratorio</strong></h5>
                                {{ Form::readonlyComp('laboratorio_tipo', 'Tipo de Laboratorio') }}
                                {{ Form::readonlyComp('laboratorio_razon_social', 'Laboratorio') }}
                                
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    {{ Form::readonlyComp('user_create', 'Creado por') }}
                                    {{ Form::readonlyComp('user_create_date', '') }}
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    {{ Form::readonlyComp('user_lb', 'Enviado a laboratorio por') }}
                                    {{ Form::readonlyComp('user_lb_date', '') }}
                                </div>

                                {{-- <div class="col-xs-3 col-sm-3 col-md-3">
                                    {{ Form::readonlyComp('user_pe', 'Preparado por') }}
                                    {{ Form::readonlyComp('user_pe_date', '') }}
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    {{ Form::readonlyComp('user_ent', 'Entregado por') }}
                                    {{ Form::readonlyComp('user_ent_date', '') }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-prepararLente"><i class="fa fa-right-from-bracket"></i> Lente listo para entregar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script type="module">

    $(document).ready(function () {

        //alert('hola');

        $('.btn-prepararLente').click(function(e) {
            e.preventDefault();

            var lente_id        = document.getElementById("lente_id").value;

            var url = SITEURL + '/api/prepararLente/'+lente_id;
            
            axios.post(url,
                { params:
                        {
                        }
                }).then(response => {

                    bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).hide();

                    var oTable = $('#lb-lentes-table').dataTable();
                    oTable.fnDraw(false);

                    Swal.fire({
                        title: 'Exito',
                        text: 'Registro confirmado',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#198754",
                    })

            }).catch(error => {                  
                if(error.response){
                    console.log(error.response.data.errors)
                }
            });
            /* var linkURL = $(this).attr("href");
            var name = $(this).attr("data-name"); */
            //document.getElementById('pr-lentes-table').DataTable().ajax.reload();

            
        });

    });

    const prLenteModal = document.getElementById('prLenteModal')

        prLenteModal.addEventListener('show.bs.modal', event => {

            //alert('hola wey');


            //$('#myModal').data('argument', the_argument);

            //personasTable.on('click', 'tbody tr', function () {
                //let data = personasTable.row(this).data();
                //alert('Has Seleccionado a la persona con el ID: ' + data['id'] + "'Nombres y Apellidos: "+ data['nombres'] +' '+ data['apellidos']);
                //getElementById('organizacion_representante').value=data['nombres']+data['apellidos'];
                
                //document.getElementById('representante_organizacion').value=data['nombres'] +' '+ data['apellidos'];
                
                //bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).hide();

            //});

            prLenteModal.addEventListener('hidden.bs.modal', event => {
                /* personasTable.clear().draw(); */
                /* personasTable.destroy(); */
            });
    })

    function prepararLente(){

        var lente_id        = document.getElementById("lente_id").value;
        var laboratorio_id  = document.getElementById("laboratorio-dropdown").value;

        var url = SITEURL + '/api/prepararLente/'+lente_id;
        
        axios.post(url,
            { params:
                    {
                        laboratorio_id: laboratorio_id
                    }
            }).then(response => {

                bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).hide();

                document.getElementById('pr-lentes-table').DataTable().ajax.reload();

        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    }

</script>

{{-- La funcion de los botones se crea dentro de estas script tag debido a que en las tipo module no funcionan --}}
<script>

const SITEURL = 'http://127.0.0.1:8000';

    function openModal(id){

        bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).show();

        var url = SITEURL + '/api/lbLente/'+id;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            console.log(message, status);
            
            let paciente_nombres =  response.data.pacientes[0].nombres + response.data.pacientes[0].apellidos;

            document.getElementById("paciente").innerHTML = '<strong>Paciente:</strong> '+ paciente_nombres;

            document.getElementById("status").innerHTML = '<strong>Estatus:</strong> '+'<span class="badge bg-primary">'+ response.data.status+'</badge>';

            document.getElementById("numero_orden").value = response.data.numero_orden;

            /* Información de Modificaciones al lente */
            document.getElementById("user_create").value = response.data.user_create.name;
            document.getElementById("user_create_date").value = response.data.user_create_date;

            document.getElementById("user_lb").value = response.data.user_lb.name;
            document.getElementById("user_lb_date").value = response.data.user_lb_date;

            /* document.getElementById("user_pe").value = response.data.user_pe.name;
            document.getElementById("user_pe_date").value = response.data.user_pe_date;

            document.getElementById("user_ent").value = response.data.user_ent.name;
            document.getElementById("user_ent_date").value = response.data.user_ent_date; */
            
            
            var esfera      = document.getElementsByName('esfera[]');
            var cilindro    = document.getElementsByName('cilindro[]');
            var eje         = document.getElementsByName('eje[]');

            var aesf = esfera[0].value = response.data.formulas[0].esfera;
            var besf = esfera[1].value = response.data.formulas[1].esfera;

            var acil = cilindro[0].value = response.data.formulas[0].cilindro;
            var bcil = cilindro[1].value = response.data.formulas[1].cilindro;

            var aeje = eje[0].value = response.data.formulas[0].eje;
            var beje = eje[1].value = response.data.formulas[1].eje;

            document.getElementById("lente_id").value = response.data.id;
            document.getElementById("tipo_lente").value = response.data.tipo_lente;
            document.getElementById("adicion").value = response.data.adicion;
            document.getElementById("distancia_pupilar").value = response.data.distancia_pupilar;
            document.getElementById("alt").value = response.data.alt;
            document.getElementById("status").value = response.data.status;
            document.getElementById("tallado").value = response.data.tallado;

            document.getElementById("laboratorio_tipo").value = response.data.laboratorio.tipo;
            document.getElementById("laboratorio_razon_social").value = response.data.laboratorio.razon_social;
            
            var tratamientos = ''

            for (var i=0, len = response.data.tratamientos.length; i < len; i++) { 
                
                tratamientos += '- '+response.data.tratamientos[i].tratamiento+'<br>';
                
            }
            document.getElementById("tratamientos").innerHTML = tratamientos;

        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    }


</script>

@endpush

