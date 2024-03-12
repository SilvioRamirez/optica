@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="col-lg-12 margin-tb">

                @include('fragment.error')
                @include('fragment.success')

                <div class="text-center">
                    <h1><i class="fa fa-square-pen"></i> Formulario</h1>
                </div>
                @can('formulario-create')
                    <div class="mt-2 mb-2">
                        <a class="btn btn-success btn-sm" href="{{ route('formularios.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                    </div>
                @endcan
            </div>
        @canany(['formulario-list'])
            <div class="card border-light mb-3 shadow">
                <div class="card-header bg-primary text-white">
                    Administración de Formularios
                </div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        @endcanany
    </div>

<div class="modal fade" id="prLenteModal" tabindex="-1" aria-labelledby="prLenteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="prLenteModalLabel"><i class="fa fa-check"></i> Cambiar Estatus</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h1 class="text-center"><i class="fa fa-check mb-2"></i> Cambiar Estatus</h1>
                                <div class="col-md-12 row">
                                    {{ Form::hiddenComp('formulario_id') }}
                                    <h2 id="paciente">Paciente: </h2>
                                    <h2 id="numero_orden" >Numero de Orden: </h2>
                                    <h2 id="status">Estatus: </h2>
                                    <h2 id="laboratorio">Laboratorio: </h2>
                                    <h2 id="total">Total: </h2>
                                    <h2 id="saldo">Saldo: </h2>

                                </div>
                            <hr>

                            <div class="row">
                                <h5><strong>Actualizar Estatus</strong></h5>
                                <label for="estatus-dropdown"><strong>Estatus:</strong></label>
                                <div class="form-group mb-2">
                                    <select  id="estatus-dropdown" name="estatus" class="form-control">
                                        <option value="" selected>-- Seleccionar --</option>
                                        <option value="REGISTRADO">REGISTRADO</option>
                                        <option value="POR ENTREGAR">POR ENTREGAR</option>
                                        <option value="ENTREGADO">ENTREGADO</option>
                                    </select>
                                    {{ Form::selectComp('laboratorio-dropdown', 'Laboratorio', '', $laboratorios) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success btn-revisarLente"><i class="fa fa-check-double"></i> Actualizar</button>
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

        $('.btn-revisarLente').click(function(e) {
            e.preventDefault();

            var formulario_id   = document.getElementById("formulario_id").value;
            var estatus         = document.getElementById("estatus-dropdown").value;
            var laboratorio     = document.getElementById("laboratorio-dropdown").value;
            
            console.log(estatus);

            var url = /* SITEURL + */ '/api/cambiarEstatus/'+formulario_id;
            
            axios.post(url,
                { params:
                        {
                            formulario_id: formulario_id,
                            estatus: estatus,
                            laboratorio: laboratorio
                        }
                }).then(response => {

                    bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).hide();

                    document.getElementById('estatus-dropdown').value="";
                    document.getElementById('laboratorio-dropdown').value="";
                    
                    var oTable = $('#formularios-table').dataTable();
                    oTable.fnDraw(false);

                    Swal.fire({
                        title: 'Éxito',
                        text: 'Registro actualizado',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#198754",
                    })

            }).catch(error => {                  
                if(error.response){
                    console.log(error.response.data.errors)
                }
            });
        });

        /*
        * Dropdown de Parroquias
        */
        /* $('#municipio-dropdown').on('change', function () {
            var id_municipio = this.value;
            $("#laboratorio-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-parroquias')}}",
                type: "POST",
                data: {
                    id_municipio: id_municipio,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#parroquia-dropdown').html('<option value="">-- Selecciona Parroquia --</option>');
                    $.each(res.parroquias, function (key, value) {
                        $("#parroquia-dropdown").append('<option value="' + value
                            .id_parroquia + '">' + value.parroquia + '</option>');
                    });
                }
            });
        }); */
    });

</script>

<script>

    const SITEURL = 'https://optirango.com';

    function openModal(id){
        
        document.getElementById('estatus-dropdown').value="";
        document.getElementById('laboratorio-dropdown').value="";

        bootstrap.Modal.getOrCreateInstance(document.getElementById('prLenteModal')).show();

        var url = /* SITEURL +  */'/api/estatusFormulario/'+id;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            console.log(message, status);

            let formulario_id = response.data.id

            document.getElementById("formulario_id").value = formulario_id

            let numero_orden            = response.data.numero_orden
            let paciente                = response.data.paciente
            let estatus                 = response.data.estatus
            let total                   = response.data.total
            let saldo                   = response.data.saldo
            let direccion_operativo     = response.data.direccion_operativo
            let observaciones_extras    = response.data.observaciones_extras
            let edad                    = response.data.edad
            let fecha                   = response.data.fecha
            let laboratorio             = response.data.laboratorio

            document.getElementById("paciente").innerHTML = '<strong>Paciente:</strong> '+ paciente;
            document.getElementById("numero_orden").innerHTML = '<strong>Numero de Orden:</strong> '+''+ numero_orden+'';
            document.getElementById("status").innerHTML = '<strong>Estatus:</strong> '+''+ estatus+'';
            document.getElementById("laboratorio").innerHTML = '<strong>Laboratorio:</strong> '+''+ laboratorio+'';
            document.getElementById('estatus-dropdown').value=estatus;
            document.getElementById('laboratorio-dropdown').value=laboratorio;
            document.getElementById("total").innerHTML = '<strong>Total:</strong> '+''+ total+'';
            document.getElementById("saldo").innerHTML = '<strong>Saldo:</strong> '+''+ saldo+'';

        }).catch(error => {                  
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    }

</script>

@endpush