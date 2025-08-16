<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'OPTIRANGO, óptica en Venezuela con exámenes visuales, venta de lentes y planes de financiamiento. Cuidamos tu salud visual con profesionalismo.')">
    <meta name="keywords" content="@yield('meta_keywords', 'óptica, lentes, exámenes visuales, salud visual, OPTIRANGO, Venezuela, financiamiento, lentes a crédito')">
    <meta name="author" content="OPTIRANGO, C.A.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', config('app.name', 'OPTIRANGO'))">
    <meta property="og:description" content="@yield('meta_description', 'OPTIRANGO, óptica en Venezuela con exámenes visuales, venta de lentes y planes de financiamiento. Cuidamos tu salud visual con profesionalismo.')">
    <meta property="og:image" content="@yield('meta_image', asset('storage/img/logo_h.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', config('app.name', 'OPTIRANGO'))">
    <meta property="twitter:description" content="@yield('meta_description', 'OPTIRANGO, óptica en Venezuela con exámenes visuales, venta de lentes y planes de financiamiento. Cuidamos tu salud visual con profesionalismo.')">
    <meta property="twitter:image" content="@yield('meta_image', asset('storage/img/logo_h.png'))">

    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'OPTIRANGO')) - Óptica y Servicios Visuales</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>

    </style>
</head>

<body>
    <div id="app">

        @include('landing.app.navbar')

        <main class="container mt-4">

            @yield('content')

        </main>
        @include('landing.app.footer')

        @stack('scripts')
    </div>

</body>

</html>
