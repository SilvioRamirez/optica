<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>

</style>
</head>

<body>
    <div id="app">
            <nav class="navbar navbar-expand-lg bg-light border-light shadow" data-bs-theme="light">
                <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('storage/img/logo_h.png') }}" class="d-inline-block align-text-top" alt="..." width="30" height="30">
                            <a href="{{ url('/') }}" class="text-reset text-decoration-none">OptiRango</a>
                        </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="collapseNavbar">
                        {{-- <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="//codeply.com">Codeply</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#myAlert" data-bs-toggle="collapse">Link</a>
                            </li>
                        </ul> --}}
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-right-to-bracket"></i> Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-light mb-3 mt-4 shadow">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/img/logo.png') }}" class="rounded" style="display: inline-block" alt="..." width="300" >
                            </div>
                            <form method="GET" action="{{ route('formulario.orden.cedula') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>

                                    <div class="col-md-6">
                                        <input id="cedula" type="text" placeholder="Ej: V12345678" class="form-control" @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                        @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-right-to-bracket"></i> {{ __('Consultar') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="alert alert-dismissible alert-info" bis_skin_checked="1">
                                    Por favor, revisa el estatus de tu lente ingresando tu <strong>Cédula</strong> aquí. 
                                </div>
                                
                                <div class="alert alert-dismissible alert-light" bis_skin_checked="1">
                                    Si eres Venezolano coloca la letra <strong>V</strong> y si eres extranjero coloca la letra <strong>E</strong> al comienzo de la <strong>Cedula</strong>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<script>

</script>
</body>
</html>
