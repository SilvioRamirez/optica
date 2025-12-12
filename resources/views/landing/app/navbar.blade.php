{{-- <nav class="navbar navbar-expand-lg bg-light border-light shadow" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('storage/img/logo_h.png') }}" class="d-inline-block align-text-top" alt="..." width="30"
                height="30">
            <a href="{{ url('/') }}" class="text-reset text-decoration-none">OptiRango</a>
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">

                    <a class="nav-link" href="{{ route('consulta') }}"><i class="fa-solid fa-magnifying-glass"></i>
                        Consulta Web</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Codeply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#myAlert" data-bs-toggle="collapse">Link</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-right-to-bracket"></i> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}


<!-- Header -->
<header class="tw-bg-white tw-shadow-md tw-py-4 tw-px-4 sm:tw-px-6 lg:tw-px-8">
    <nav class="tw-container tw-mx-auto tw-flex tw-justify-between tw-items-center">
        <!-- Logo -->
        <div class="tw-flex tw-items-center tw-space-x-2">
            <!-- SVG Logo based on user's image colors -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('storage/img/logo_horizontal_2.jpg') }}" class="" alt="..." width="185" >

            </a>
            {{-- <span class="tw-text-xl tw-font-bold tw-text-gray-700">ÓPTI RANGO</span> --}}
        </div>
        <!-- Navigation Links (Hidden on small screens, shown with hamburger) -->
        <div class="tw-hidden md:tw-flex tw-items-center tw-space-x-6">
            <a href="{{ url('/') }}"
                class="tw-text-gray-600 hover:tw-text-gray-700 tw-font-medium tw-transition tw-duration-300 tw-rounded-md tw-py-1 tw-px-3 tw-text-pretty tw-no-underline">
                <i class="fas fa-home"></i> Inicio</a>
            <a href="{{ route('catalogo.index') }}"
                class="tw-text-gray-600 hover:tw-text-teal-600 tw-font-medium tw-transition tw-duration-300 tw-rounded-md tw-py-1 tw-px-3 tw-no-underline tw-flex tw-items-center tw-gap-1">
                <i class="fas fa-glasses"></i> Catálogo</a>
            <a href="{{ route('consulta') }}"
                class="tw-text-gray-600 hover:tw-text-gray-700 tw-font-medium tw-transition tw-duration-300 tw-rounded-md tw-py-1 tw-px-3 tw-no-underline"> <i class="fas fa-search"></i> Consulta
                y Pagos</a>
            <a href="{{ route('consulta-web-cliente.index') }}"
                class="tw-text-gray-600 hover:tw-text-gray-700 tw-font-medium tw-transition tw-duration-300 tw-rounded-md tw-py-1 tw-px-3 tw-no-underline"> <i class="fas fa-flask"></i> Laboratorio Consulta</a>
            <a href="{{ route('acerca.de') }}"
                class="tw-text-gray-600 hover:tw-text-gray-700 tw-gray-700m tw-transition tw-duration-300 tw-rounded-md tw-py-1 tw-px-3 tw-no-underline"> <i class="fas fa-info-circle"></i> Acerca
                de</a>
            <!-- Cart Icon -->
            <x-cart-icon />
            <a href="{{ route('login') }}"
                class="tw-text-gray-600 hover:tw-text-gray-700 tw-gray-700m tw-transition tw-duration-300 tw-rounded-md tw-py-1 tw-px-3 tw-no-underline"> <i class="fas fa-right-to-bracket"></i> Login</a>
        </div>
        <!-- Hamburger Menu for Mobile -->
        <div class="md:tw-hidden">
            <button id="menu-button" class="text-secondary-color focus:tw-outline-none focus-outline-primary">
                <i class="fas fa-bars tw-text-2xl"></i>
            </button>
        </div>
    </nav>
    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="tw-hidden md:tw-hidden tw-bg-white tw-mt-4 tw-rounded-b-lg tw-shadow-lg">
        <a href="{{ url('/') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">Inicio</a>
        <a href="{{ route('catalogo.index') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">
            <i class="fas fa-glasses tw-mr-2"></i>Catálogo</a>
        <a href="{{ route('carrito.index') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">
            <i class="fas fa-shopping-cart tw-mr-2"></i>Carrito</a>
        <a href="{{ route('consulta') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">Consulta y Pagos</a>
        <a href="{{ route('consulta-web-cliente.index') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">Laboratorio Consulta</a>
        <a href="{{ route('acerca.de') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">Acerca
            de</a>
        <a href="{{ route('login') }}"
            class="tw-block tw-py-3 tw-px-6 tw-text-gray-600 hover:tw-bg-gray-100 hover:tw-text-primary-color tw-font-medium tw-transition tw-duration-300 tw-no-underline">Login</a>
    </div>
</header>