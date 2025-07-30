<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'OPTIRANGO, óptica en Venezuela con exámenes visuales, venta de lentes y planes de financiamiento. Cuidamos tu salud visual con profesionalismo.')">
    <meta name="keywords" content="@yield('meta_keywords', 'óptica, lentes, exámenes visuales, salud visual, OPTIRANGO, Venezuela, financiamiento, lentes a crédito')">
    <meta name="author" content="OPTIRANGO, C.A.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'OPTIRANGO - Tu Visión, Nuestra Prioridad')">
    <meta property="og:description" content="@yield('meta_description', 'OPTIRANGO, óptica en Venezuela con exámenes visuales, venta de lentes y planes de financiamiento. Cuidamos tu salud visual con profesionalismo.')">
    <meta property="og:image" content="@yield('meta_image', asset('storage/img/logo_h.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'OPTIRANGO - Tu Visión, Nuestra Prioridad')">
    <meta property="twitter:description" content="@yield('meta_description', 'OPTIRANGO, óptica en Venezuela con exámenes visuales, venta de lentes y planes de financiamiento. Cuidamos tu salud visual con profesionalismo.')">
    <meta property="twitter:image" content="@yield('meta_image', asset('storage/img/logo_h.png'))">

    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'OPTIRANGO - Tu Visión, Nuestra Prioridad')</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f8f8; /* Light grey background */
        }
        .text-primary-color {
            color: #00a89d; /* Teal/Turquoise from logo */
        }
        .bg-primary-color {
            background-color: #00a89d; /* Teal/Turquoise from logo */
        }
        .border-primary-color {
            border-color: #00a89d; /* Teal/Turquoise from logo */
        }
        .text-secondary-color {
            color: #333333; /* Dark grey/black from logo */
        }
        .bg-secondary-color {
            background-color: #333333; /* Dark grey/black from logo */
        }
        .focus-outline-primary:focus {
            outline-color: #00a89d;
        }
        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /* Ensure responsiveness for hero image and general layout */
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
            }
            .hero-content, .hero-image {
                width: 100%;
            }
            .hero-image img {
                max-width: 80%; /* Smaller image on mobile */
                margin: 0 auto;
            }
            .product-grid {
                grid-template-columns: 1fr; /* Single column on mobile */
            }
        }
    </style>
</head>
<body>
    @include('landing.app.navbar')
    
        @yield('content')

    @include('landing.app.footer')

    @include('partials.flash-swal')

    @stack('scripts')

    <script>
        // JavaScript for mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            if (menuButton) {
                menuButton.addEventListener('click', function() {
                    const mobileMenu = document.getElementById('mobile-menu');
                    mobileMenu.classList.toggle('tw-hidden');
                });
            }

            // Simple scroll animation for hero section elements
            const heroContent = document.querySelector('.hero-content');
            const heroImage = document.querySelector('.hero-image');

            if (heroContent) {
                heroContent.style.opacity = 0;
                heroContent.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    heroContent.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
                    heroContent.style.opacity = 1;
                    heroContent.style.transform = 'translateY(0)';
                }, 100);
            }

            if (heroImage) {
                heroImage.style.opacity = 0;
                heroImage.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    heroImage.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
                    heroImage.style.opacity = 1;
                    heroImage.style.transform = 'translateY(0)';
                }, 300);
            }
        });
    </script>
</body>
</html> 