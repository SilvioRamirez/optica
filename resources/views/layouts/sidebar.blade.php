<!-- Sidebar-->
<div class="border-end bg-light font-color-white" id="sidebar-wrapper">
	<div class="sidebar-heading border-bottom bg-primary font-color-white">
		<a href="{{ url('/home') }}" class="nav-link">OPTICA</a>
	</div>

	<div class="list-group list-group-flush">
		<div class="accordion accordion-flush" id="accordionFlushExample">

				@canany(['formulario-list', 'formulario-create'])
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingFormularios">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFormularios" aria-expanded="false" aria-controls="flush-collapseFormularios">
							<i class="fa fa-pen-to-square"></i>&nbsp; Formularios
						</button>
						</h2>
						<div id="flush-collapseFormularios" class="accordion-collapse collapse" aria-labelledby="flush-headingFormularios" >
								@canany(['formulario-list', 'formulario-create'])
									<a class="list-group-item list-group-item-action p-3" href="{{ route('formularios.index') }}"><i class="fa fa-pen-to-square"></i> Formulario</a>
								@endcanany
								@canany(['refractante-list', 'refractante-create'])
									<a class="list-group-item list-group-item-action p-3" href="{{ route('refractantes.index') }}"><i class="fa fa-people-group"></i> Refractados</a>
								@endcanany
						</div>
					</div>
				@endcanany

				{{-- @can('paciente-list')
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingTwo">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
							<i class="fa fa-hospital-user"></i>&nbsp; Pacientes
						</button>
						</h2>
						<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" >
								@can('paciente-list')
									<a class="list-group-item list-group-item-action p-3" href="{{ route('pacientes.index') }}"><i class="fa fa-hospital-user"></i> Pacientes</a>
								@endcan
						</div>
					</div>
				@endcan --}}

				{{-- @can('paciente-list')
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingThree">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
							<i class="fa fa-glasses"></i>&nbsp; Lentes
						</button>
						</h2>
						<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" >
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('lentes.index') }}"><i class="fa fa-list"></i> Listado</a>
							@endcan
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('lentes.index.pr') }}"><i class="fa fa-check"></i> Por Revisar</a>
							@endcan
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('lentes.index.lb') }}"><i class="fa fa-vial-circle-check"></i> En Laboratorio</a>
							@endcan
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('lentes.index.pe') }}"><i class="fa fa-person-circle-check"></i> Por Entregar</a>
							@endcan
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('lentes.index.ent') }}"><i class="fa fa-check-to-slot"></i> Entregados</a>
							@endcan
						</div>
					</div>
				@endcan --}}

				@can('pago-list')
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingPagos">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsePagos" aria-expanded="false" aria-controls="flush-collapsePagos">
							<i class="fa fa-hand-holding-dollar"></i>&nbsp; Pagos
						</button>
						</h2>
						<div id="flush-collapsePagos" class="accordion-collapse collapse" aria-labelledby="flush-headingPagos" >
							@can('pago-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('pagos.index') }}"><i class="fa fa-list"></i> Listado</a>
							@endcan
						</div>
					</div>
				@endcan

				@can('operativo-list')
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOperativos">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOperativos" aria-expanded="false" aria-controls="flush-collapseOperativos">
							<i class="fa fa-globe"></i>&nbsp; Operativos
						</button>
						</h2>
						<div id="flush-collapseOperativos" class="accordion-collapse collapse" aria-labelledby="flush-headingOperativos" >
							@canany(['operativo-list', 'operativo-create'])
								<a class="list-group-item list-group-item-action p-3" href="{{ route('operativos.index') }}"><i class="fa-solid fa-map-location-dot"></i> Listado de Operativos</a>
							@endcanany
						</div>
					</div>
				@endcan

				@can('actividad-list')
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingActividades">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseActividades" aria-expanded="false" aria-controls="flush-collapseActividades">
							<i class="fa fa-calendar-check"></i>&nbsp; Actividades Diarias
						</button>
						</h2>
						<div id="flush-collapseActividades" class="accordion-collapse collapse" aria-labelledby="flush-headingActividades" >
							@canany(['actividad-list', 'actividad-create'])
								<a class="list-group-item list-group-item-action p-3" href="{{ route('actividades.index') }}"><i class="fa-solid fa-list-check"></i> Registro de Actividades</a>
							@endcanany
						</div>
					</div>
				@endcan

				@canany(['paciente-list', 'operativo-list', 'role-list', 'user-list', 'configuracion-list', 'tipo-list', 'operativo-create', 'laboratorio-list', 'laboratorio-create'])
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingOne">
							<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
								<i class="fa fa-gear"></i>&nbsp; Sistema
							</button>
						</h2>
						<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" >
							@can('user-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Usuarios</a>
							@endcan
							@can('role-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('roles.index') }}"><i class="fa fa-users-cog"></i> Roles y Permisos</a>
							@endcan
							@can('user-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('personas.index') }}"><i class="fa fa-person"></i> Asesores</a>
							@endcan
							
							@canany(['especialista-list', 'especialista-create'])
								<a class="list-group-item list-group-item-action p-3" href="{{ route('especialistas.index') }}"><i class="fa-solid fa-id-badge"></i> Especialistas</a>
							@endcanany
							@canany(['laboratorio-list', 'laboratorio-create'])
								<a class="list-group-item list-group-item-action p-3" href="{{ route('laboratorios.index') }}"><i class="fa fa-microscope"></i> Laboratorios</a>
							@endcanany
							@can('tipo-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('tipos.index') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Tipos de Pago</a>
							@endcan
							@can('tipo-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('tipoGastos.index') }}"><i class="fa-solid fa-file-invoice-dollar"></i> Tipos de Gastos</a>
							@endcan
							@can('descuento-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('descuentos.index') }}"><i class="fa-solid fa-coins"></i> Descuentos</a>
							@endcan
							@can('estatus-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('estatus.index') }}"><i class="fa-solid fa-layer-group"></i> Estatus</a>
							@endcan
							@can('tipo-lente-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('tipoLentes.index') }}"><i class="fa-solid fa-glasses"></i> Tipos de Lentes</a>
							@endcan
							@can('tipo-tratamiento-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('tipoTratamientos.index') }}"><i class="fa-solid fa-flask-vial"></i> Tipos de Tratamientos</a>
							@endcan
							@can('ruta-entrega-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('rutaEntregas.index') }}"><i class="fa-solid fa-truck"></i> Rutas de Entrega</a>
							@endcan
							@can('origen-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('origens.index') }}"><i class="fa-solid fa-street-view"></i> Origenes</a>
							@endcan
							@can('configuracion-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('configuracions.index') }}"><i class="fa fa-cogs"></i> Configuraciones</a>
							@endcan
							@can('configuracion-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('logs.index') }}"><i class="fa-solid fa-rectangle-list"></i> Logs</a>
							@endcan
						</div>
					</div>
				@endcanany
		</div>

	</div>
</div>
