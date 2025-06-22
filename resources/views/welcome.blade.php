@extends('landing.app.landing')

@section('content')
    

    <main>
        <!-- Hero Section -->
        <section class="hero-section tw-bg-gradient-to-r tw-from-green-500 tw-to-teal-500 tw-py-16 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-text-white tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-center tw-space-y-8 md:tw-space-y-0 md:tw-space-x-12 tw-rounded-b-xl" style="background: linear-gradient(to right, #00a89d, #14b8a6);">
            <div class="hero-content tw-w-full md:tw-w-1/2 tw-text-center md:tw-text-left">
                <h1 class="tw-text-4xl sm:tw-text-5xl lg:tw-text-6xl tw-font-extrabold tw-leading-tight tw-mb-4">
                    <span class="tw-block">La Claridad Que Tus Ojos Merecen</span>
                </h1>
                <p class="tw-text-lg sm:tw-text-xl tw-mb-8 tw-opacity-90">
                    Descubre una nueva perspectiva con nuestra amplia gama de lentes y servicios ópticos de alta calidad.
                </p>
                <a href="#" class="tw-inline-block tw-bg-white tw-text-gray-600 hover:tw-text-gray-800 tw-px-8 tw-py-3 tw-rounded-full tw-font-bold tw-text-lg hover:tw-bg-gray-100 tw-transition tw-duration-300 tw-transform hover:tw-scale-105 tw-shadow-lg tw-no-underline">
                    Explora Nuestros Lentes
                </a>
            </div>
            <div class="hero-image tw-w-full md:tw-w-1/2 tw-flex tw-justify-center tw-items-center">
                <img src="{{ asset('storage/img/monturas_genuinas.png') }}" alt="Lentes Modernos" class="tw-rounded-xl tw-shadow-2xl tw-max-w-full tw-h-auto tw-transform tw-transition-transform tw-duration-500 hover:tw-scale-105" onerror="this.onerror=null;this.src='https://placehold.co/600x400/00a89d/ffffff?text=Imagen+No+Disponible';">
            </div>
        </section>

        <!-- Product Categories/Features Section -->
        <section class="tw-py-16 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-50">
            <div class="tw-container tw-mx-auto">
                <h2 class="tw-text-4xl tw-font-extrabold tw-text-center text-secondary-color tw-mb-12">Nuestros Productos Destacados</h2>
                <div class="product-grid tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-8">
                    <!-- Product Card 1 -->
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-text-center tw-transform tw-transition-transform tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                        <i class="fas fa-glasses text-primary-color tw-text-5xl tw-mb-4"></i>
                        <h3 class="tw-text-2xl tw-font-bold text-secondary-color tw-mb-3">Lentes Oftálmicos</h3>
                        <p class="tw-text-gray-600 tw-mb-4">Amplia variedad de armazones y micas personalizadas para tu visión.</p>
                        <a href="#" class="tw-text-primary-color tw-font-semibold  tw-no-underline">Ver Más <i class="fas fa-arrow-right tw-ml-1"></i></a>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-text-center tw-transform tw-transition-transform tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                        <i class="fas fa-sun text-primary-color tw-text-5xl tw-mb-4"></i>
                        <h3 class="tw-text-2xl tw-font-bold text-secondary-color tw-mb-3">Lentes de Sol</h3>
                        <p class="tw-text-gray-600 tw-mb-4">Protege tus ojos con estilo con nuestra colección de lentes de sol.</p>
                        <a href="#" class="tw-text-primary-color tw-font-semibold  tw-no-underline">Ver Más <i class="fas fa-arrow-right tw-ml-1"></i></a>
                    </div>
                    <!-- Product Card 3 -->
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-text-center tw-transform tw-transition-transform tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                        <i class="fas fa-eye text-primary-color tw-text-5xl tw-mb-4"></i>
                        <h3 class="tw-text-2xl tw-font-bold text-secondary-color tw-mb-3">Exámenes de la Vista</h3>
                        <p class="tw-text-gray-600 tw-mb-4">Diagnósticos precisos para asegurar la salud de tus ojos.</p>
                        <a href="#" class="tw-text-primary-color tw-font-semibold tw-no-underline">Agendar Cita <i class="fas fa-arrow-right tw-ml-1"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us Section -->
        <section class="tw-py-16 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-white">
            <div class="tw-container tw-mx-auto tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-space-y-8 md:tw-space-y-0 md:tw-space-x-12">
                <div class="md:tw-w-1/2">
                    <img src="{{ asset('storage/img/equipo_optirango.png') }}" alt="Equipo Ópti Rango" class="tw-rounded-xl tw-shadow-lg tw-max-w-[80%] tw-h-auto tw-transform tw-transition-transform tw-duration-500 hover:tw-scale-105" onerror="this.onerror=null;this.src='https://placehold.co/600x400/333333/ffffff?text=Imagen+No+Disponible';">
                </div>
                <div class="md:tw-w-1/2 tw-text-center md:tw-text-left">
                    <h2 class="tw-text-4xl tw-font-extrabold text-secondary-color tw-mb-6">Sobre Nosotros</h2>
                    <p class="tw-text-gray-700 tw-leading-relaxed tw-mb-6">
                        En Ópti Rango, nos dedicamos a ofrecer soluciones visuales de la más alta calidad. Con años de experiencia y un equipo de profesionales comprometidos, garantizamos una atención personalizada y productos que se adaptan a tus necesidades y estilo de vida.
                    </p>
                    <a href="#" class="tw-w-full bg-primary-color tw-text-white hover:tw-text-white tw-px-6 tw-py-3 tw-rounded-full tw-font-bold tw-text-lg hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-transform hover:tw-scale-105 tw-shadow-md tw-no-underline">
                        Conoce Más
                    </a>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="tw-py-16 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-100">
            <div class="tw-container tw-mx-auto">
                <h2 class="tw-text-4xl tw-font-extrabold tw-text-center text-secondary-color tw-mb-12">Lo Que Dicen Nuestros Clientes</h2>
                <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-8">
                    <!-- Testimonial 1 -->
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-transform tw-transition-transform tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                        <p class="tw-text-gray-700 tw-italic tw-mb-4">"¡Increíble servicio y atención! Mis nuevos lentes son perfectos. Recomiendo Ópti Rango al 100%."</p>
                        <p class="tw-font-semibold text-secondary-color">- Ana R. (Cliente Satisfecha)</p>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-transform tw-transition-transform tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                        <p class="tw-text-gray-700 tw-italic tw-mb-4">"El examen de la vista fue muy completo y el personal muy amable. Encontré el armazón ideal."</p>
                        <p class="tw-font-semibold text-secondary-color">- Carlos M. (Cliente Regular)</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="tw-py-16 tw-px-4 sm:tw-px-6 lg:tw-px-8 bg-primary-color tw-text-white tw-rounded-t-xl">
            <div class="tw-container tw-mx-auto tw-text-center">
                <h2 class="tw-text-4xl tw-font-extrabold tw-mb-6">Contáctanos</h2>
                <p class="tw-text-lg tw-opacity-90 tw-mb-8">¿Listo para mejorar tu visión? Envíanos un mensaje o visítanos.</p>
                <div class="tw-max-w-md tw-mx-auto tw-bg-white tw-p-8 tw-rounded-xl tw-shadow-xl">
                    <form class="tw-space-y-6" action="{{ route('home') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="tw-block text-secondary-color tw-text-left tw-font-medium tw-mb-2">Nombre Completo</label>
                            <input type="text" id="name" name="name" required class="tw-w-full tw-px-4 tw-py-3 tw-rounded-md tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-green-500 focus-outline-primary text-secondary-color" placeholder="Tu nombre">
                        </div>
                        <div>
                            <label for="email" class="tw-block text-secondary-color tw-text-left tw-font-medium tw-mb-2">Correo Electrónico</label>
                            <input type="email" id="email" name="email" required class="tw-w-full tw-px-4 tw-py-3 tw-rounded-md tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-green-500 focus-outline-primary text-secondary-color" placeholder="tu.email@ejemplo.com">
                        </div>
                        <div>
                            <label for="message" class="tw-block text-secondary-color tw-text-left tw-font-medium tw-mb-2">Tu Mensaje</label>
                            <textarea id="message" name="message" rows="5" required class="tw-w-full tw-px-4 tw-py-3 tw-rounded-md tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-green-500 focus-outline-primary text-secondary-color" placeholder="Escribe tu mensaje aquí..."></textarea>
                        </div>
                        <button type="submit" class="tw-w-full bg-primary-color tw-text-white tw-px-6 tw-py-3 tw-rounded-full tw-font-bold tw-text-lg hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-transform hover:tw-scale-105 tw-shadow-md">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
                <p class="tw-mt-8 tw-text-lg tw-opacity-90">
                    O llámanos al: <span class="tw-font-bold">+58 412-088-3674</span>
                </p>
            </div>
        </section>
    </main>

    
@endsection

@push('scripts')
@endpush
