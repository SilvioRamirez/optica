@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            @include('fragment.error')
            @include('fragment.success')
            <div class="text-center">
                <h1><i class="fa fa-layer-group"></i> Actividades Diarias</h1>
            </div>
        </div>

        <div class="card border-light mb-3 shadow">
            <div class="card-header bg-primary text-white">
                Actividades del día
                <a href="#" id="generar-pdf" class="btn btn-light btn-sm float-end"">
                    <i class="fa fa-file-pdf"></i> Generar PDF
                </a>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha" class="form-label">Seleccione la fecha:</label>
                            <input type="date" id="fecha" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button id="buscar-actividades" class="btn btn-primary">Buscar Actividades</button>
                    </div>                    
                </div>

                <h2 class="mb-4">Información general de pagos</h2>

                <div class="row">
                    <div class="row mb-4" id="tarjetas-pagos">
                        <!-- Aquí se cargarán las tarjetas de subtotales de pagos -->
                    </div>
                </div>

                <h2 class="mb-4">Información general de formularios</h2>

                <div class="row">
                    <div class="row mb-4" id="tarjetas-formularios">
                        <!-- Aquí se cargarán las tarjetas de subtotales de formularios -->
                    </div>
                </div>

                <h2 class="mb-2">Detalle</h2>

                <div class="row">
                    <div class="col-md-12 mt-4 mb-4">
                        <div class="card border-light mb-3 shadow">
                            <div
                                class="card-header bg-info text-white d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0"><i class="fa fa-hand-holding-dollar"></i> Pagos realizados</h5>
                                <div class="filtro-container">
                                    <label for="filtro-tipo-pago" class="form-label me-2">Filtrar por tipo:</label>
                                    <select id="filtro-tipo-pago" class="form-select form-select-sm"
                                        style="width: auto; display: inline-block;">
                                        <option value="todos">Todos los tipos</option>
                                        <!-- Aquí se cargarán los tipos de pago dinámicamente -->
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover rounded" id="tabla-pagos">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Nro. Orden</th>
                                                <th>Monto</th>
                                                <th>Referencia</th>
                                                <th>Tipo</th>
                                                <th>Saldo</th>
                                                <th>Estatus</th>
                                                <th>Hora</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Aquí se cargarán los pagos dinámicamente -->
                                        </tbody>
                                        <tfoot>
                                            <!-- Aquí se mostrarán los subtotales y total -->
                                            <tr id="total-general" class="table-primary">
                                                <td colspan="1" class="text-end fw-bold">Total General:</td>
                                                <td colspan="7" class="fw-bold">0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-light mb-3 shadow">
                            <div
                                class="card-header bg-info text-white d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0"><i class="fa fa-file-alt"></i> Formularios creados o
                                    actualizados</h5>
                                <div class="filtro-container">
                                    <label for="filtro-estatus" class="form-label me-2">Filtrar por estado:</label>
                                    <select id="filtro-estatus" class="form-select form-select-sm"
                                        style="width: auto; display: inline-block;">
                                        <option value="todos">Todos los estados</option>
                                        <!-- Aquí se cargarán los estatus dinámicamente -->
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="tabla-formularios">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>Nro. Orden</th>
                                                <th>Nombre</th>
                                                <th>Tipo Lente</th>
                                                <th>Especialista</th>
                                                <th>Estatus</th>
                                                <th>Saldo</th>
                                                <th>Hora</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Aquí se cargarán los formularios dinámicamente -->
                                        </tbody>
                                        <tfoot>
                                            <!-- Aquí se mostrará el total de formularios -->
                                            <tr id="total-formularios" class="table-primary">
                                                <td colspan="4" class="text-end fw-bold">Total de Formularios:</td>
                                                <td colspan="4" class="fw-bold">0</td>
                                            </tr>
                                        </tfoot>
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
        <script type="module">
            $(document).ready(function() {
                // Variables para almacenar todos los datos
                let todosPagos = [];
                let todosFormularios = [];
                let tiposPago = [];
                let estatusFormularios = [];

                // Función para cargar las actividades
                function cargarActividades(fecha) {
                    $.ajax({
                        url: '{{ route('actividades.buscar') }}',
                        type: 'GET',
                        data: {
                            fecha: fecha
                        },
                        dataType: 'json',
                        success: function(data) {
                            // Guardar datos completos
                            todosPagos = data.pagos;
                            todosFormularios = data.formularios;

                            // Extraer tipos de pago únicos para el selector
                            tiposPago = [];
                            let tiposPagoIds = {};
                            todosPagos.forEach(pago => {
                                if (pago.tipo && !tiposPagoIds[pago.tipo.id]) {
                                    tiposPagoIds[pago.tipo.id] = true;
                                    tiposPago.push({
                                        id: pago.tipo.id,
                                        nombre: pago.tipo.tipo
                                    });
                                }
                            });

                            // Ordenar tipos de pago alfabéticamente
                            tiposPago.sort((a, b) => a.nombre.localeCompare(b.nombre));

                            // Actualizar selector de tipos de pago
                            $('#filtro-tipo-pago').empty();
                            $('#filtro-tipo-pago').append('<option value="todos">Todos los tipos</option>');
                            tiposPago.forEach(tipo => {
                                $('#filtro-tipo-pago').append(
                                    `<option value="${tipo.id}">${tipo.nombre}</option>`);
                            });

                            // Extraer estatus de formularios únicos para el selector
                            estatusFormularios = [];
                            let estatusSet = new Set();
                            todosFormularios.forEach(formulario => {
                                const estatus = formulario.estatus || 'Sin estado';
                                if (!estatusSet.has(estatus)) {
                                    estatusSet.add(estatus);
                                    estatusFormularios.push(estatus);
                                }
                            });

                            // Ordenar estatus alfabéticamente
                            estatusFormularios.sort();

                            // Actualizar selector de estatus
                            $('#filtro-estatus').empty();
                            $('#filtro-estatus').append('<option value="todos">Todos los estados</option>');
                            estatusFormularios.forEach(estatus => {
                                $('#filtro-estatus').append(
                                    `<option value="${estatus}">${estatus}</option>`);
                            });

                            // Mostrar todos los datos inicialmente
                            mostrarPagos(todosPagos);
                            mostrarFormularios(todosFormularios);
                        },
                        error: function(error) {
                            console.error('Error al cargar actividades:', error);
                            alert('Ocurrió un error al cargar las actividades');
                        }
                    });
                }

                // Función para mostrar pagos con filtro
                function mostrarPagos(pagos, filtroTipo = 'todos') {
                    // Filtrar pagos si es necesario
                    let pagosFiltrados = pagos;
                    if (filtroTipo !== 'todos') {
                        pagosFiltrados = pagos.filter(pago => pago.tipo && pago.tipo.id == filtroTipo);
                    }

                    // Limpiar tabla y tarjetas
                    $('#tabla-pagos tbody').empty();
                    $('#tabla-pagos tfoot tr:not(#total-general)').remove();
                    $('#tarjetas-pagos').empty();

                    // Si no hay pagos, mostrar mensaje
                    if (pagosFiltrados.length === 0) {
                        $('#tabla-pagos tbody').append(`
                        <tr>
                            <td colspan="7" class="text-center">No hay pagos para la selección actual</td>
                        </tr>
                    `);
                        $('#total-general td:last').text('0.00');
                        return;
                    }

                    // Agrupar pagos por tipo
                    let pagosPorTipo = {};
                    let totalGeneral = 0;

                    // Ordenar pagos por tipo
                    pagosFiltrados.sort((a, b) => {
                        const tipoA = a.tipo ? a.tipo.tipo : 'Sin tipo';
                        const tipoB = b.tipo ? b.tipo.tipo : 'Sin tipo';
                        return tipoA.localeCompare(tipoB);
                    });

                    // Calcular totales por tipo y agregar filas
                    pagosFiltrados.forEach(pago => {
                        const tipoNombre = pago.tipo ? pago.tipo.tipo : 'Sin tipo';
                        const tipoId = pago.tipo ? pago.tipo.id : 0;

                        if (!pagosPorTipo[tipoId]) {
                            pagosPorTipo[tipoId] = {
                                nombre: tipoNombre,
                                pagos: [],
                                total: 0
                            };
                        }

                        pagosPorTipo[tipoId].pagos.push(pago);
                        pagosPorTipo[tipoId].total += parseFloat(pago.monto || 0);
                        totalGeneral += parseFloat(pago.monto || 0);
                    });

                    // Mostrar tarjetas de subtotales
                    Object.values(pagosPorTipo).forEach(grupo => {
                        $('#tarjetas-pagos').append(`
                            <div class="col-md-3">
                                <div class="card bg-primary text-white shadow mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">${grupo.nombre}</h5>
                                        <p class="card-text display-6"><strong>$${grupo.total.toFixed(2)}</strong></p>
                                    </div>
                                </div>
                            </div>
                        `);
                    });

                    // Mostrar pagos agrupados por tipo con subtotales
                    Object.values(pagosPorTipo).forEach(grupo => {
                        // Añadir encabezado de grupo
                        $('#tabla-pagos tbody').append(`
                        <tr class="table-light">
                            <td colspan="8" class="fw-bold">Tipo de pago: ${grupo.nombre}</td>
                        </tr>
                    `);

                        // Añadir pagos del grupo
                        grupo.pagos.forEach(pago => {
                            let hora = new Date(pago.created_at).toLocaleTimeString();
                            $('#tabla-pagos tbody').append(`
                            <tr>
                                <td>${pago.formulario ? pago.formulario.numero_orden : '-'}</td>
                                <td class="text-end">${parseFloat(pago.monto).toFixed(2)}</td>
                                <td>${pago.referencia || '-'}</td>
                                <td>${pago.tipo ? pago.tipo.tipo : '-'}</td>
                                <td>${pago.formulario ? pago.formulario.saldo : '-'}</td>
                                <td>${pago.formulario ? pago.formulario.estatus : '-'}</td>
                                <td>${hora}</td>
                                <td>
                                    <a href="/pagos/${pago.id}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        `);
                        });

                        // Añadir subtotal del grupo
                        $('#tabla-pagos tbody').append(`
                        <tr class="table-light">
                            <td colspan="1" class="text-end fw-bold">Subtotal ${grupo.nombre}:</td>
                            <td colspan="7" class="fw-bold">${grupo.total.toFixed(2)}</td>
                        </tr>
                    `);
                    });

                    // Actualizar total general
                    $('#total-general td:last').text(totalGeneral.toFixed(2));
                }

                // Función para mostrar formularios con filtro
                function mostrarFormularios(formularios, filtroEstatus = 'todos') {
                    // Filtrar formularios si es necesario
                    let formulariosFiltrados = formularios;
                    if (filtroEstatus !== 'todos') {
                        formulariosFiltrados = formularios.filter(formulario => {
                            const estatus = formulario.estatus || 'Sin estado';
                            return estatus === filtroEstatus;
                        });
                    }

                    // Limpiar tabla y tarjetas
                    $('#tabla-formularios tbody').empty();
                    $('#tabla-formularios tfoot tr:not(#total-formularios)').remove();
                    $('#tarjetas-formularios').empty();

                    if (formulariosFiltrados.length === 0) {
                        $('#tabla-formularios tbody').append(`
                        <tr>
                            <td colspan="7" class="text-center">No hay formularios para la selección actual</td>
                        </tr>
                    `);
                        $('#total-formularios td:last').text('0');
                        return;
                    }

                    // Agrupar formularios por estado
                    let formulariosPorEstado = {};
                    let totalFormularios = 0;

                    // Ordenar formularios por estado
                    formulariosFiltrados.sort((a, b) => {
                        const estadoA = a.estatus || 'Sin estado';
                        const estadoB = b.estatus || 'Sin estado';
                        return estadoA.localeCompare(estadoB);
                    });

                    // Agrupar y contar formularios por estado
                    formulariosFiltrados.forEach(formulario => {
                        const estado = formulario.estatus || 'Sin estado';

                        if (!formulariosPorEstado[estado]) {
                            formulariosPorEstado[estado] = {
                                nombre: estado,
                                formularios: [],
                                cantidad: 0
                            };
                        }

                        formulariosPorEstado[estado].formularios.push(formulario);
                        formulariosPorEstado[estado].cantidad++;
                        totalFormularios++;
                    });

                    // Mostrar tarjetas de subtotales
                    Object.values(formulariosPorEstado).forEach(grupo => {
                        $('#tarjetas-formularios').append(`
                            <div class="col-md-3">
                                <div class="card bg-success text-white shadow mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">${grupo.nombre}</h5>
                                        <p class="card-text display-6"><strong>${grupo.cantidad}</strong></p>
                                    </div>
                                </div>
                            </div>
                        `);
                    });

                    // Mostrar formularios agrupados por estado
                    Object.values(formulariosPorEstado).forEach(grupo => {
                        // Añadir encabezado de grupo
                        $('#tabla-formularios tbody').append(`
                        <tr class="table-light">
                            <td colspan="8" class="fw-bold">Estado: ${grupo.nombre}</td>
                        </tr>
                    `);

                        // Añadir formularios del grupo
                        grupo.formularios.forEach(formulario => {
                            let hora = new Date(formulario.created_at).toLocaleTimeString();
                            $('#tabla-formularios tbody').append(`
                            <tr>
                                <td>${formulario.numero_orden || '-'}</td>
                                <td>${formulario.paciente || '-'}</td>
                                <td>${formulario.tipo_lente ? formulario.tipo_lente.tipo_lente : '-'}</td>
                                <td>${formulario.especialista_lente ? formulario.especialista_lente.nombre : '-'}</td>
                                <td>${formulario.estatus || '-'}</td>
                                <td>${formulario.saldo || '-'}</td>
                                <td>${hora}</td>
                                <td>
                                    <a href="/formularios/${formulario.id}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        `);
                        });

                        // Añadir contador del grupo
                        $('#tabla-formularios tbody').append(`
                        <tr class="table-light">
                            <td colspan="4" class="text-end fw-bold">Cantidad de formularios en ${grupo.nombre}:</td>
                            <td colspan="4" class="fw-bold">${grupo.cantidad}</td>
                        </tr>
                    `);
                    });

                    // Actualizar total de formularios
                    $('#total-formularios td:last').text(totalFormularios);
                }

                // Cargar actividades al cargar la página
                cargarActividades($('#fecha').val());

                // Evento para buscar actividades
                $('#buscar-actividades').click(function() {
                    cargarActividades($('#fecha').val());
                });

                // También cargar al cambiar la fecha
                $('#fecha').change(function() {
                    cargarActividades($(this).val());
                });

                // Filtrar pagos por tipo seleccionado
                $('#filtro-tipo-pago').change(function() {
                    mostrarPagos(todosPagos, $(this).val());
                });

                // Filtrar formularios por estatus seleccionado
                $('#filtro-estatus').change(function() {
                    mostrarFormularios(todosFormularios, $(this).val());
                });

                // Función para actualizar el enlace del PDF
                function actualizarEnlacePDF() {
                    const fecha = $('#fecha').val();
                    $('#generar-pdf').attr('href', '{{ route("actividades.pdf") }}?fecha=' + fecha);
                }

                // Actualizar enlace al cargar la página
                actualizarEnlacePDF();

                // Actualizar enlace cuando cambie la fecha
                $('#fecha').change(function() {
                    actualizarEnlacePDF();
                });
            });
        </script>
    @endpush
