<nav class="navbar navbar-expand-lg bg-light border-light shadow" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('storage/img/logo_h.png') }}" class="d-inline-block align-text-top" alt="..."
                width="30" height="30">
            <a href="{{ url('/') }}" class="text-reset text-decoration-none">OptiRango</a>
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">

                    <a class="nav-link" href="{{ route('consulta') }}"><i class="fa-solid fa-magnifying-glass"></i>
                        Consulta Web</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Codeply</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#myAlert" data-bs-toggle="collapse">Link</a>
                </li> --}}
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-right-to-bracket"></i> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
