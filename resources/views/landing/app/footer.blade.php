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

{{-- <div class="container-fluid">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top p-4 mb-0 d-none d-md-flex d-lg-flex d-xl-flex d-sm-none d-xs-none">
        <p class="col-md-4 mb-0 text-body-secondary"><i class="fa fa-copyright"></i> {{ $configuracion->copyright }} {{ $configuracion->nombre_organizacion }}</p>
			<a class="navbar-brand" href="#">
                <img src="{{ asset('storage/img/logo_h.png') }}" class="bi me-2" alt="..."  height="32">
                
            </a>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="{{ '/' }}" class="nav-link px-2 text-body-secondary">Inicio</a></li>
            <li class="nav-item"><a href="{{ route('politica.privacidad') }}" class="nav-link px-2 text-body-secondary">Política de Privacidad</a></li>
            <li class="nav-item"><a href="{{ route('condiciones.servicio') }}" class="nav-link px-2 text-body-secondary">Condiciones de Servicio</a></li>
            <li class="nav-item"><a href="{{ route('acerca.de') }}" class="nav-link px-2 text-body-secondary">Acerca de</a></li>
            <li class="nav-item"><a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=61551175972400" class="nav-link px-2 text-body-secondary" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
            <li class="nav-item"><a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/opti_rango/" class="nav-link px-2 text-body-secondary" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
			<li class="nav-item"><a target="_blank" rel="noopener noreferrer" href="https://wa.link/cdtl37" class="nav-link px-2 text-body-secondary" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
		
    </footer> --}}

    <!-- Footer -->
    <footer class="bg-secondary-color tw-text-white tw-py-8 tw-px-4 sm:tw-px-6 lg:tw-px-8">
        <div class="tw-container tw-mx-auto tw-text-center md:tw-flex md:tw-justify-between md:tw-items-center">
            <div class="tw-mb-4 md:tw-mb-0">
                <p>&copy; 2025 Ópti Rango. Todos los derechos reservados.</p>
            </div>
            <div class="tw-flex tw-justify-center tw-space-x-6">
                <a href="https://www.facebook.com/profile.php?id=61551175972400" class="tw-text-white hover:tw-text-teal-700 tw-transition tw-duration-300 tw-no-underline"><i class="fab fa-facebook-f tw-text-xl"></i></a>
                <a href="https://www.instagram.com/opti_rango/" class="tw-text-white hover:tw-text-teal-700 tw-transition tw-duration-300 tw-no-underline"><i class="fab fa-instagram tw-text-xl"></i></a>
                <a href="https://wa.me/584120883674" class="tw-text-white hover:tw-text-teal-700 tw-transition tw-duration-300 tw-no-underline"><i class="fab fa-whatsapp tw-text-xl"></i></a>
            </div>
        </div>
    </footer>

