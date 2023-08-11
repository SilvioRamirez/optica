<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{ url('/') }}"> Roles y Permisos </a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Lado Izquierdo del Navbar -->
			<ul class="navbar-nav me-auto">
				@can('user-list')
					<li><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
				@endcan
				@can('role-list')
					<li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
				@endcan
				@can('product-list')
					<li><a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
				@endcan
				@can('paciente-list')
					<li><a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a></li>
				@endcan
				@can('bioanalista-list')
					<li><a class="nav-link" href="{{ route('bioanalistas.index') }}">Bioanalistas</a></li>
				@endcan
				@can('examen-list')
					<li><a class="nav-link" href="{{ route('examenes.index') }}">Examenes</a></li>
				@endcan
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">
				<!-- Authentication Links -->
				@guest
					@if (Route::has('login'))
						<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
					@endif

					@if (Route::has('register'))
						<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
					@endif
				@else

					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }}
						</a>

						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
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
