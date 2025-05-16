{{-- <nav
    class="navbar navbar-expand-sm  navbar-sm navbar-light bg-light fixed-bottom d-none d-sm-block d-sm-none d-md-block">
    <ul class="navbar-nav">
        <span class="navbar-text text-center">
            <i class="fa fa-copyright"></i> {{ $configuracion->nombre_organizacion }} | {{ $configuracion->copyright }}
        </span>

        <li class="nav-item">
            <a class="nav-link" href="mailto:{{ $configuracion->correo }}">{{ $configuracion->correo }}</a>
        </li>
    </ul>
</nav> --}}

<div class="container-fluid">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top fixed-bottom p-4 mb-0 d-none d-md-flex d-lg-flex d-xl-flex d-sm-none d-xs-none">
        <p class="col-md-4 mb-0 text-body-secondary"><i class="fa fa-copyright"></i> {{ $configuracion->copyright }} {{ $configuracion->nombre_organizacion }}</p>
			<a class="navbar-brand" href="#">
                <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2" alt="..."  height="32">
                
            </a>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="{{ '/' }}" class="nav-link px-2 text-body-secondary">Inicio</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Características</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Preguntas Frecuentes</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Acerca de</a></li>
            <li class="nav-item"><a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=61551175972400" class="nav-link px-2 text-body-secondary" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
            <li class="nav-item"><a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/opti_rango/" class="nav-link px-2 text-body-secondary" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
			<li class="nav-item"><a target="_blank" rel="noopener noreferrer" href="https://wa.link/cdtl37" class="nav-link px-2 text-body-secondary" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
		
    </footer>
</div>
