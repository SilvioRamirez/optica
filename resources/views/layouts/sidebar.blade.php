<!-- Sidebar-->
<div class="border-end bg-light font-color-white" id="sidebar-wrapper">
	<div class="sidebar-heading border-bottom bg-primary font-color-white"><a href="{{ url('/') }}" class="nav-link">OPTICA</a></div>
	<div class="list-group list-group-flush">
				<div class="accordion accordion-flush" id="accordionFlushExample">					
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
					<div class="accordion-item">
						<h2 class="accordion-header" id="flush-headingThree">
						<button class="accordion-button collapsed list-group-item-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
							<i class="fa fa-glasses"></i>&nbsp; Lentes
						</button>
						</h2>
						<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" >
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('lentes.index') }}"><i class="fa fa-glasses"></i> Lentes</a>
							@endcan
							@can('product-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('laboratorios.index') }}"><i class="fa fa-microscope"></i> Laboratorios</a>
							@endcan
						</div>
					</div>
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
							@can('configuracion-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('configuracions.index') }}"><i class="fa fa-cogs"></i> Configuraciones</a>
							@endcan
							@can('configuracion-list')
								<a class="list-group-item list-group-item-action p-3" href="{{ route('logs.index') }}"><i class="fa-solid fa-rectangle-list"></i> Logs</a>
							@endcan
						</div>
					</div>
				</div>
				
				
				
				
				{{-- @can('bioanalista-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('bioanalistas.index') }}"><i class="fa fa-user-doctor"></i> Bioanalistas</a>
				@endcan
				@can('examen-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('examenes.index') }}"><i class="fa fa-microscope"></i> Examenes</a>
				@endcan
				@can('muestra-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('muestras.index') }}"><i class="fa fa-vial"></i> Muestras</a>
				@endcan --}}
				
				




	</div>
</div>