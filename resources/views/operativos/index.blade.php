@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @include('fragment.error')
            @include('fragment.success')
            <div class="text-center">
                <h1><i class="fa fa-map-location-dot"></i> Operativos</h1>
            </div>
            @can('operativo-create')
                <div class="pull-right mt-2 mb-2">
                    <a class="btn btn-success btn-sm" href="{{ route('operativos.create') }}"><i class="fa fa-plus"></i> {{ __('Create New')}}</a>
                </div>
            @endcan
        </div>

        @can('operativo-list')
            <div class="card border-light mb-3 shadow">
                <div class="card-header bg-primary text-white">
                    Administración de Operativos
                </div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        @endcan
    </div>

    {{-- Modal Registro de Coordenadas --}}
    <div class="modal fade" id="modalRegistroCoordenadas" tabindex="-1" aria-labelledby="modalRegistroCoordenadasLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="modalRegistroCoordenadasLabel"><i class="fa fa-location-dot"></i> Registro de Coordenadas</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-md-12 row">
                                    <form id="formCoordenadas" action="{{route('operativos.updateCoordenadas')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="operativo_id" id="operativo_id">
                                        <input type="hidden" name="latitud" id="latitud">
                                        <input type="hidden" name="longitud" id="longitud">
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Latitud</label>
                                                <input type="text" class="form-control" id="latitud_display" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Longitud</label>
                                                <input type="text" class="form-control" id="longitud_display" readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div id="map" style="height: 400px; width: 100%;"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary" onclick="obtenerUbicacion()">
                                                    <i class="fa fa-location-dot"></i> Obtener Mi Ubicación
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="registrarCoordenadas()">
                        <i class="fa fa-save"></i> Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Registro de Gastos --}}
    <div class="modal fade" id="modalRegistroGastos" tabindex="-1" aria-labelledby="modalRegistroGastosLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="modalRegistroGastosLabel"><i class="fa fa-file-invoice-dollar"></i> Registro de Gastos</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h1 class="text-center"><i class="fa fa-file-invoice-dollar mb-2"></i> Información de Gastos del Operativo</h1>
                                <div class="col-md-12 row">

                                    <h3 id="estado"></h3>
                                    <h3 id="municipio"></h3>
                                    <h3 id="parroquia"></h3>
                                    <h3 id="direccion"></h3>
                                    <h3 id="nombre_operativo"></h3>
                                    <h3 id="fecha"></h3>
                                    <h3 id="promotor_nombre"></h3>
                                    <h3 id="promotor_telefono"></h3>
                                </div>
                                <hr>

                                <form action="{{route('gastoOperativos.store')}}" method="POST" id="gastoOperativoForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <h2 class="text-center pb-2">Registrar Nuevo Gasto</h2>
                                            {{ Form::hiddenComp('operativo_id') }}
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            {{ Form::textComp('monto','Monto', null, null, '',) }}
                                        </div> 
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            {{ Form::selectComp('tipo_gasto_id', 'Tipo de Gasto', '', $tiposGastos) }}                    
                                        </div>                                        
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                        <br>
                                            <button type="submit" class="btn btn-primary" title="Guardar"><i class="fa fa-floppy-disk"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <div id="mensaje">
                                </div>
                                <hr>
                                <table id="tablaGastosOperativo" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>MONTO</th>
                                            <th>TIPO DE GASTO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
@endsection

@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
        let map;
        let marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: { lat: 0, lng: 0 }
            });
        }

        function obtenerUbicacion() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        
                        // Actualizar campos ocultos
                        document.getElementById('latitud').value = lat;
                        document.getElementById('longitud').value = lng;
                        
                        // Actualizar campos de visualización
                        document.getElementById('latitud_display').value = lat;
                        document.getElementById('longitud_display').value = lng;
                        
                        // Actualizar mapa
                        const pos = { lat, lng };
                        map.setCenter(pos);
                        
                        // Actualizar o crear marcador
                        if (marker) {
                            marker.setPosition(pos);
                        } else {
                            marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                title: 'Ubicación actual'
                            });
                        }
                    },
                    (error) => {
                        alert('Error al obtener la ubicación: ' + error.message);
                    }
                );
            } else {
                alert('Tu navegador no soporta la geolocalización');
            }
        }

        function registrarCoordenadas() {
            const form = document.getElementById('formCoordenadas');
            if (form.checkValidity()) {
                form.submit();
            } else {
                alert('Por favor, obtén tu ubicación primero');
            }
        }

        // Inicializar el mapa cuando se abre el modal
        document.getElementById('modalRegistroCoordenadas').addEventListener('shown.bs.modal', function () {
            initMap();
        });

        // Función para abrir el modal con el ID del operativo
        function abrirModalCoordenadas(operativoId) {
            document.getElementById('operativo_id').value = operativoId;
            new bootstrap.Modal(document.getElementById('modalRegistroCoordenadas')).show();
        }

        function openModalGastosOperativo(button) {

            const operativo = JSON.parse(button.getAttribute('data-operativo'));
            document.getElementById('operativo_id').value = operativo.id;
            document.getElementById('nombre_operativo').innerHTML = '<strong>Nombre del Operativo:</strong> ' + operativo.nombre_operativo;
            document.getElementById('direccion').innerHTML = '<strong>Dirección:</strong> ' + operativo.direccion;
            document.getElementById('fecha').innerHTML = '<strong>Fecha:</strong> ' + operativo.fecha;
            document.getElementById('promotor_nombre').innerHTML = '<strong>Promotor:</strong> ' + operativo.promotor_nombre;
            document.getElementById('promotor_telefono').innerHTML = '<strong>Teléfono del Promotor:</strong> ' + operativo.promotor_telefono;

            consultaGastosOperativoTable(operativo.id);
            
            new bootstrap.Modal(document.getElementById('modalRegistroGastos')).show();
        }

        function consultaGastosOperativoTable(id){

            var url = '/api/consultaGastosOperativo/'+id;

        axios.post(url).then(response => {
            let status = response.status;
            let message = response.statusText;
            console.log(response.data);
            
            const tbody = document.querySelector('#tablaGastosOperativo tbody');
            tbody.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

            response.data.forEach(gasto => {

                const fila = document.createElement('tr'); // Crear una nueva fila

                const celdaId = document.createElement('td');
                celdaId.textContent = gasto.id;
                fila.appendChild(celdaId);

                const celdaMonto = document.createElement('td');
                celdaMonto.textContent = gasto.monto;
                fila.appendChild(celdaMonto);

                const celdaTipoId = document.createElement('td');
                celdaTipoId.textContent = gasto.tipo;
                fila.appendChild(celdaTipoId);

                tbody.appendChild(fila);
            });

        }).catch(error => {
            if(error.response){
                console.log(error.response.data.errors)
            }
        });
    }

    function limpiarGastoOperativoForm(){
        document.getElementById('monto').value = '';
        document.getElementById('tipo_gasto_id').value = '';

        const tbody = document.querySelector('#tablaGastosOperativo tbody');
        tbody.innerHTML = '';
    }

    /* Evento que envia el formulario para registrar un nuevo gasto operativo */
    document.getElementById('gastoOperativoForm').addEventListener('submit', function(event){
        event.preventDefault(); //Evita que el formulario se envie (su comportamiento normal)

        const formData = new FormData(this); //Obtiene los datos del formulario

        axios.post('/gastoOperativos', formData).then(response => {
            let status = response.status;
            let message = response.statusText;
            console.log(response.data);
            limpiarGastoOperativoForm();
            consultaGastosOperativoTable(response.data.operativo_id);

        }).catch(error => {
            if(error.response){
                console.log(error.response.data.errors)
            }
        });

    });

    </script>

@endpush