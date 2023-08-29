{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{ url('/') }}"> Roles y Permisos </a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Lado Izquierdo del Navbar -->
			<ul class="navbar-nav me-auto">
				@can('user-list')
					<li><a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Usuarios</a></li>
				@endcan
				@can('role-list')
					<li><a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-users-cog"></i> Roles</a></li>
				@endcan
				@can('product-list')
					<li><a class="nav-link" href="{{ route('products.index') }}"><i class="fa fa-store"></i> Productos</a></li>
				@endcan
				@can('paciente-list')
					<li><a class="nav-link" href="{{ route('pacientes.index') }}"><i class="fa fa-hospital-user"></i> Pacientes</a></li>
				@endcan
				@can('bioanalista-list')
					<li><a class="nav-link" href="{{ route('bioanalistas.index') }}"><i class="fa fa-user-doctor"></i> Bioanalistas</a></li>
				@endcan
				@can('examen-list')
					<li><a class="nav-link" href="{{ route('examenes.index') }}"><i class="fa fa-microscope"></i> Examenes</a></li>
				@endcan
				@can('muestra-list')
					<li><a class="nav-link" href="{{ route('muestras.index') }}"><i class="fa fa-vial"></i> Muestras</a></li>
				@endcan
				@can('configuracion-list')
					<li><a class="nav-link" href="{{ route('configuracions.index') }}"><i class="fa fa-cog"></i> Configuración</a></li>
				@endcan
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">
				<!-- Authentication Links -->
				@guest
					@if (Route::has('login'))
						<li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-right-to-bracket"></i> {{ __('Login') }}</a></li>
					@endif

					@if (Route::has('register'))
						<li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> {{ __('Register') }}</a></li>
					@endif
				@else

					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							<i class="fa fa-user"></i> {{ Auth::user()->name }}
						</a>

						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<i class="fa fa-arrow-right-from-bracket"></i> {{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
--}}



<!-- Top navigation-->

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
	<div class="container-fluid">
		@guest

		@else
			<button class="btn btn-primary" id="sidebarToggle"><i class="fa fa-bars"></i></button>
		@endguest

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mt-2 mt-lg-0">
				@guest
					@if (Route::has('login'))
						<li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-right-to-bracket"></i> {{ __('Login') }}</a></li>
					@endif

					@if (Route::has('register'))
						<li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> {{ __('Register') }}</a></li>
					@endif
				@else

				
					{{-- <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>

					<li class="nav-item"><a class="nav-link" href="#!">Link</a></li> --}}

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#!">Perfil</a>
							<a class="dropdown-item" href="#!">Configuración</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								<i class="fa fa-arrow-right-from-bracket"></i> {{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
							
								
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>