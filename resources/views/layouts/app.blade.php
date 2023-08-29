<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="d-flex" id="wrapper">
            
            @include('layouts.sidebar')

            <div id="page-content-wrapper">

                @include('layouts.nav')

                <main class="container-fluid">
                    <div class="pt-4">
                        @yield('content')                        

                    </div>
                </main>


                {{-- @include('layouts.footer') --}}
            </div>

            
    
            @stack('scripts')
        </div>
    </div>
    
<script>

</script>
</body>
</html>
