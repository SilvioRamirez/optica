<!-- Sidebar-->
<div class="border-end bg-light font-color-white" id="sidebar-wrapper">
	<div class="sidebar-heading border-bottom bg-primary font-color-white"><a href="{{ url('/') }}" class="nav-link">OPTICA</a></div>
	<div class="list-group list-group-flush bg-primary">
				@can('user-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Usuarios</a>
				@endcan
				@can('role-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('roles.index') }}"><i class="fa fa-users-cog"></i> Roles</a>
				@endcan
				{{-- @can('product-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('products.index') }}"><i class="fa fa-store"></i> Productos</a>
				@endcan --}}
				@can('paciente-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('pacientes.index') }}"><i class="fa fa-hospital-user"></i> Pacientes</a>
				@endcan
				@can('bioanalista-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('bioanalistas.index') }}"><i class="fa fa-user-doctor"></i> Bioanalistas</a>
				@endcan
				@can('examen-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('examenes.index') }}"><i class="fa fa-microscope"></i> Examenes</a>
				@endcan
				@can('muestra-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('muestras.index') }}"><i class="fa fa-vial"></i> Muestras</a>
				@endcan
				@can('configuracion-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('configuracions.index') }}"><i class="fa fa-cog"></i> Configuración</a>
				@endcan
				@can('configuracion-list')
					<a class="list-group-item list-group-item-action list-group-item-primary p-3" href="{{ route('logs.index') }}"><i class="fa-solid fa-rectangle-list"></i> Logs</a>
				@endcan
	</div>
</div>