@extends('landing.app.landing')

@section('title', 'Catálogo de Productos - OPTIRANGO')
@section('meta_description', 'Explora nuestro catálogo de monturas, cristales y accesorios ópticos. Encuentra los mejores productos para tu salud visual.')

@section('content')
<main>
    <!-- Hero Section -->
    <section class="tw-bg-gradient-to-r tw-from-green-500 tw-to-teal-500 tw-py-12 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-text-white" style="background: linear-gradient(to right, #00a89d, #14b8a6);">
        <div class="tw-container tw-mx-auto tw-text-center">
            <h1 class="tw-text-4xl sm:tw-text-5xl tw-font-extrabold tw-mb-4">Nuestro Catálogo</h1>
            <p class="tw-text-lg tw-opacity-90">Descubre nuestra selección de monturas, cristales y accesorios ópticos</p>
        </div>
    </section>

    <!-- Filters and Search -->
    <section class="tw-py-6 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-white tw-shadow-sm">
        <div class="tw-container tw-mx-auto">
            <form method="GET" action="{{ route('catalogo.index') }}" class="tw-flex tw-flex-col md:tw-flex-row tw-gap-4 tw-items-center tw-justify-between">
                <!-- Search -->
                <div class="tw-w-full md:tw-w-1/3">
                    <div class="tw-relative">
                        <input 
                            type="text" 
                            name="buscar" 
                            value="{{ request('buscar') }}"
                            placeholder="Buscar productos..."
                            class="tw-w-full tw-px-4 tw-py-3 tw-pl-10 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color"
                        >
                        <i class="fas fa-search tw-absolute tw-left-3 tw-top-1/2 tw-transform tw--translate-y-1/2 tw-text-gray-400"></i>
                    </div>
                </div>
                
                <!-- Category Filter -->
                <div class="tw-w-full md:tw-w-1/4">
                    <select 
                        name="categoria" 
                        class="tw-w-full tw-px-4 tw-py-3 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color"
                        onchange="this.form.submit()"
                    >
                        <option value="">Todas las categorías</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Submit Button -->
                <div class="tw-flex tw-gap-2">
                    <button type="submit" class="bg-primary-color tw-text-white tw-px-6 tw-py-3 tw-rounded-lg tw-font-semibold hover:tw-bg-teal-700 tw-transition tw-duration-300">
                        <i class="fas fa-filter tw-mr-2"></i>Filtrar
                    </button>
                    @if(request('buscar') || request('categoria'))
                        <a href="{{ route('catalogo.index') }}" class="tw-bg-gray-200 tw-text-gray-700 tw-px-6 tw-py-3 tw-rounded-lg tw-font-semibold hover:tw-bg-gray-300 tw-transition tw-duration-300 tw-no-underline">
                            <i class="fas fa-times tw-mr-2"></i>Limpiar
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="tw-py-12 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-50">
        <div class="tw-container tw-mx-auto">
            @if($productos->count() > 0)
                <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-3 xl:tw-grid-cols-4 tw-gap-6">
                    @foreach($productos as $producto)
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-overflow-hidden tw-transform tw-transition-all tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                            <!-- Product Image -->
                            <a href="{{ route('catalogo.show', $producto) }}" class="tw-block tw-relative tw-h-48 tw-overflow-hidden">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                         alt="{{ $producto->nombre }}" 
                                         class="tw-w-full tw-h-full tw-object-cover tw-transition-transform tw-duration-300 hover:tw-scale-110"
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/e2e8f0/64748b?text=Sin+Imagen';">
                                @else
                                    <img src="https://placehold.co/400x300/e2e8f0/64748b?text={{ urlencode($producto->nombre) }}" 
                                         alt="{{ $producto->nombre }}" 
                                         class="tw-w-full tw-h-full tw-object-cover">
                                @endif
                                @if($producto->stock <= 3 && $producto->stock > 0)
                                    <span class="tw-absolute tw-top-2 tw-right-2 tw-bg-yellow-500 tw-text-white tw-text-xs tw-px-2 tw-py-1 tw-rounded-full">
                                        ¡Últimas unidades!
                                    </span>
                                @endif
                            </a>
                            
                            <!-- Product Info -->
                            <div class="tw-p-4">
                                <span class="tw-text-xs tw-text-teal-600 tw-font-semibold tw-uppercase tw-tracking-wide">
                                    {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                </span>
                                <a href="{{ route('catalogo.show', $producto) }}" class="tw-no-underline">
                                    <h3 class="tw-text-lg tw-font-bold text-secondary-color tw-mt-1 tw-mb-2 tw-truncate hover:tw-text-teal-600 tw-transition">
                                        {{ $producto->nombre }}
                                    </h3>
                                </a>
                                
                                <!-- Prices -->
                                <div class="tw-space-y-1 tw-mb-4">
                                    <p class="tw-text-xl tw-font-bold text-primary-color">
                                        ${{ number_format($producto->precio_con_iva, 2) }}
                                    </p>
                                    @if($producto->exento_iva)
                                        <span class="tw-text-xs tw-text-green-600 tw-font-medium">
                                            <i class="fas fa-check-circle"></i> Exento de IVA
                                        </span>
                                    @else
                                        <span class="tw-text-xs tw-text-gray-500">(IVA inc.)</span>
                                    @endif
                                    <p class="tw-text-sm tw-text-gray-500">
                                        Bs. {{ number_format($producto->precio_bs, 2) }}
                                    </p>
                                </div>
                                
                                <!-- Action Buttons -->
                                <div class="tw-flex tw-gap-2">
                                    <button 
                                        onclick="agregarAlCarrito({{ $producto->id }}, 1)"
                                        class="tw-flex-1 bg-primary-color tw-text-white tw-py-2 tw-px-3 tw-rounded-lg tw-font-semibold hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-flex tw-items-center tw-justify-center tw-gap-1"
                                        title="Agregar al carrito"
                                    >
                                        <i class="fas fa-cart-plus"></i>
                                        <span class="tw-hidden sm:tw-inline">Carrito</span>
                                    </button>
                                    @if(isset($configuracion) && $configuracion->telefono_uno)
                                        <a 
                                            href="https://api.whatsapp.com/send/?phone={{ preg_replace('/\D/', '', $configuracion->telefono_uno) }}&text={{ urlencode('Hola, estoy interesado en *' . $producto->nombre . '*. ¿Está disponible? ' . route('catalogo.show', $producto)) }}&type=phone_number&app_absent=0"
                                            target="_blank"
                                            class="tw-flex-1 tw-bg-green-500 tw-text-white tw-py-2 tw-px-3 tw-rounded-lg tw-font-semibold hover:tw-bg-green-600 tw-transition tw-duration-300 tw-flex tw-items-center tw-justify-center tw-gap-1 tw-no-underline"
                                            title="Consultar por WhatsApp"
                                        >
                                            <i class="fab fa-whatsapp"></i>
                                            <span class="tw-hidden sm:tw-inline">WhatsApp</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="tw-mt-8 tw-flex tw-justify-center">
                    {{ $productos->withQueryString()->links('vendor.pagination.tailwind') }}
                </div>
            @else
                <div class="tw-text-center tw-py-12">
                    <i class="fas fa-box-open tw-text-6xl tw-text-gray-300 tw-mb-4"></i>
                    <h3 class="tw-text-xl tw-font-semibold text-secondary-color tw-mb-2">No se encontraron productos</h3>
                    <p class="tw-text-gray-500 tw-mb-4">Intenta con otros filtros de búsqueda</p>
                    <a href="{{ route('catalogo.index') }}" class="bg-primary-color tw-text-white tw-px-6 tw-py-3 tw-rounded-lg tw-font-semibold hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-no-underline tw-inline-block">
                        Ver todos los productos
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Exchange Rate Info -->
    @if($tasa)
    <section class="tw-py-4 tw-px-4 tw-bg-gray-100">
        <div class="tw-container tw-mx-auto tw-text-center">
            <p class="tw-text-sm tw-text-gray-600">
                <i class="fas fa-info-circle tw-mr-1"></i>
                Tasa de cambio BCV: <span class="tw-font-semibold">Bs. {{ number_format($tasa->valor, 2) }}</span> por dólar
                <span class="tw-text-gray-400 tw-ml-2">({{ \Carbon\Carbon::parse($tasa->fecha)->format('d/m/Y') }})</span>
            </p>
        </div>
    </section>
    @endif
</main>
@endsection

@push('scripts')
<script>
    function agregarAlCarrito(productoId, cantidad) {
        fetch('{{ route("carrito.agregar") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                producto_id: productoId,
                cantidad: cantidad
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualizar contador del carrito
                actualizarContadorCarrito(data.cartCount);
                
                // Mostrar notificación
                Swal.fire({
                    icon: 'success',
                    title: '¡Agregado!',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                    position: 'top-end'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al agregar el producto'
            });
        });
    }

    function actualizarContadorCarrito(count) {
        const cartBadge = document.getElementById('cart-count');
        if (cartBadge) {
            cartBadge.textContent = count;
            cartBadge.style.display = count > 0 ? 'flex' : 'none';
        }
    }
</script>
@endpush


