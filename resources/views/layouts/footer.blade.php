<nav class="navbar navbar-expand-sm  navbar-sm navbar-light bg-light fixed-bottom d-none d-sm-block d-sm-none d-md-block">
	<ul class="navbar-nav"> 
		<span class="navbar-text text-center">
			<i class="fa fa-copyright"></i> {{ $configOrganizacion->nombre_organizacion }} | {{ $configOrganizacion->copyright }}
		</span>

		<li class="nav-item">
	    	<a class="nav-link" href="mailto:{{ $configOrganizacion->correo }}">{{ $configOrganizacion->correo }}</a>
	    </li>
	</ul>
</nav>