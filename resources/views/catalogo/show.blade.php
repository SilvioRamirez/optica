@extends('landing.app.landing')

@section('title', $producto->nombre . ' - OPTIRANGO')
@section('meta_description', $producto->descripcion ?? 'Descubre ' . $producto->nombre . ' en OPTIRANGO. Productos ópticos de alta calidad.')

@section('content')
<main>
    <!-- Breadcrumb -->
    <section class="tw-py-4 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-100">
        <div class="tw-container tw-mx-auto">
            <nav class="tw-flex tw-items-center tw-space-x-2 tw-text-sm">
                <a href="{{ route('index') }}" class="tw-text-gray-500 hover:tw-text-teal-600 tw-no-underline">Inicio</a>
                <span class="tw-text-gray-400">/</span>
                <a href="{{ route('catalogo.index') }}" class="tw-text-gray-500 hover:tw-text-teal-600 tw-no-underline">Catálogo</a>
                <span class="tw-text-gray-400">/</span>
                <span class="text-secondary-color tw-font-medium">{{ $producto->nombre }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="tw-py-12 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-white">
        <div class="tw-container tw-mx-auto">
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-2 tw-gap-12">
                <!-- Product Image -->
                <div class="tw-relative">
                    <div class="tw-bg-gray-100 tw-rounded-2xl tw-overflow-hidden tw-shadow-lg">
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                 alt="{{ $producto->nombre }}" 
                                 class="tw-w-full tw-h-96 lg:tw-h-[500px] tw-object-cover"
                                 onerror="this.onerror=null;this.src='https://placehold.co/600x500/e2e8f0/64748b?text=Sin+Imagen';">
                        @else
                            <img src="https://placehold.co/600x500/e2e8f0/64748b?text={{ urlencode($producto->nombre) }}" 
                                 alt="{{ $producto->nombre }}" 
                                 class="tw-w-full tw-h-96 lg:tw-h-[500px] tw-object-cover">
                        @endif
                    </div>
                    @if($producto->stock <= 3 && $producto->stock > 0)
                        <span class="tw-absolute tw-top-4 tw-right-4 tw-bg-yellow-500 tw-text-white tw-px-3 tw-py-1 tw-rounded-full tw-font-semibold">
                            ¡Últimas {{ $producto->stock }} unidades!
                        </span>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="tw-flex tw-flex-col tw-justify-center">
                    <span class="tw-text-sm tw-text-teal-600 tw-font-semibold tw-uppercase tw-tracking-wide tw-mb-2">
                        {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                    </span>
                    
                    <h1 class="tw-text-3xl lg:tw-text-4xl tw-font-extrabold text-secondary-color tw-mb-4">
                        {{ $producto->nombre }}
                    </h1>

                    @if($producto->descripcion)
                        <p class="tw-text-gray-600 tw-leading-relaxed tw-mb-6">
                            {{ $producto->descripcion }}
                        </p>
                    @endif

                    <!-- Prices -->
                    <div class="tw-bg-gray-50 tw-rounded-xl tw-p-6 tw-mb-6">
                        <div class="tw-flex tw-items-baseline tw-gap-4 tw-mb-2">
                            <span class="tw-text-4xl tw-font-bold text-primary-color">
                                ${{ number_format($producto->precio_con_iva, 2) }}
                            </span>
                            <span class="tw-text-sm tw-text-gray-500">USD</span>
                        </div>
                        @if($producto->exento_iva)
                            <span class="tw-inline-flex tw-items-center tw-px-3 tw-py-1 tw-rounded-full tw-text-sm tw-font-medium tw-bg-green-100 tw-text-green-800">
                                <i class="fas fa-check-circle tw-mr-1"></i> Exento de IVA
                            </span>
                        @else
                            <span class="tw-text-sm tw-text-gray-500">(IVA {{ config('app.iva') }}% incluido)</span>
                        @endif
                        <div class="tw-flex tw-items-baseline tw-gap-2 tw-pt-3 tw-border-t tw-border-gray-200 tw-mt-3">
                            <span class="tw-text-2xl tw-font-semibold tw-text-gray-700">
                                Bs. {{ number_format($producto->precio_bs, 2) }}
                            </span>
                            @if($tasa)
                                <span class="tw-text-xs tw-text-gray-400">
                                    (Tasa BCV: {{ number_format($tasa->valor, 2) }})
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Stock Status -->
                    <div class="tw-mb-6">
                        @if($producto->stock > 5)
                            <span class="tw-inline-flex tw-items-center tw-text-green-600">
                                <i class="fas fa-check-circle tw-mr-2"></i>
                                En stock ({{ $producto->stock }} disponibles)
                            </span>
                        @elseif($producto->stock > 0)
                            <span class="tw-inline-flex tw-items-center tw-text-yellow-600">
                                <i class="fas fa-exclamation-triangle tw-mr-2"></i>
                                Pocas unidades ({{ $producto->stock }} disponibles)
                            </span>
                        @else
                            <span class="tw-inline-flex tw-items-center tw-text-red-600">
                                <i class="fas fa-times-circle tw-mr-2"></i>
                                Agotado
                            </span>
                        @endif
                    </div>

                    <!-- Quantity Selector and Add to Cart -->
                    @if($producto->stock > 0)
                        <div class="tw-flex tw-flex-col sm:tw-flex-row tw-gap-4 tw-mb-6">
                            <div class="tw-flex tw-items-center tw-border tw-border-gray-300 tw-rounded-lg tw-overflow-hidden">
                                <button type="button" onclick="decrementQuantity()" class="tw-px-4 tw-py-3 tw-bg-gray-100 hover:tw-bg-gray-200 tw-transition">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" id="cantidad" value="1" min="1" max="{{ $producto->stock }}" 
                                       class="tw-w-16 tw-text-center tw-border-0 focus:tw-ring-0 text-secondary-color">
                                <button type="button" onclick="incrementQuantity({{ $producto->stock }})" class="tw-px-4 tw-py-3 tw-bg-gray-100 hover:tw-bg-gray-200 tw-transition">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <button 
                                onclick="agregarAlCarrito({{ $producto->id }})"
                                class="tw-flex-1 bg-primary-color tw-text-white tw-py-3 tw-px-8 tw-rounded-lg tw-font-bold tw-text-lg hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-flex tw-items-center tw-justify-center tw-gap-2"
                            >
                                <i class="fas fa-cart-plus"></i>
                                Agregar al carrito
                            </button>
                        </div>
                    @endif

                    <!-- Additional Info -->
                    <div class="tw-border-t tw-border-gray-200 tw-pt-6">
                        <div class="tw-flex tw-flex-wrap tw-gap-6">
                            @if($producto->barcode)
                                <div class="tw-flex tw-items-center tw-text-gray-500 tw-text-sm">
                                    <i class="fas fa-barcode tw-mr-2"></i>
                                    Código: {{ $producto->barcode }}
                                </div>
                            @endif
                            <div class="tw-flex tw-items-center tw-text-gray-500 tw-text-sm">
                                <i class="fas fa-shield-alt tw-mr-2"></i>
                                Garantía incluida
                            </div>
                            <div class="tw-flex tw-items-center tw-text-gray-500 tw-text-sm">
                                <i class="fas fa-store tw-mr-2"></i>
                                Retiro en tienda
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if($productosRelacionados->count() > 0)
    <section class="tw-py-12 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-50">
        <div class="tw-container tw-mx-auto">
            <h2 class="tw-text-2xl tw-font-bold text-secondary-color tw-mb-8">Productos Relacionados</h2>
            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-4 tw-gap-6">
                @foreach($productosRelacionados as $relacionado)
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-overflow-hidden tw-transform tw-transition-all tw-duration-300 hover:tw-scale-105 hover:tw-shadow-xl">
                        <a href="{{ route('catalogo.show', $relacionado) }}" class="tw-block tw-relative tw-h-40 tw-overflow-hidden">
                            @if($relacionado->imagen)
                                <img src="{{ asset('storage/' . $relacionado->imagen) }}" 
                                     alt="{{ $relacionado->nombre }}" 
                                     class="tw-w-full tw-h-full tw-object-cover"
                                     onerror="this.onerror=null;this.src='https://placehold.co/300x200/e2e8f0/64748b?text=Sin+Imagen';">
                            @else
                                <img src="https://placehold.co/300x200/e2e8f0/64748b?text={{ urlencode($relacionado->nombre) }}" 
                                     alt="{{ $relacionado->nombre }}" 
                                     class="tw-w-full tw-h-full tw-object-cover">
                            @endif
                        </a>
                        <div class="tw-p-4">
                            <a href="{{ route('catalogo.show', $relacionado) }}" class="tw-no-underline">
                                <h3 class="tw-font-bold text-secondary-color tw-mb-2 tw-truncate hover:tw-text-teal-600 tw-transition">
                                    {{ $relacionado->nombre }}
                                </h3>
                            </a>
                            <p class="tw-text-lg tw-font-bold text-primary-color">
                                ${{ number_format($relacionado->precio_con_iva, 2) }}
                                @if(!$relacionado->exento_iva)
                                    <span class="tw-text-xs tw-font-normal tw-text-gray-500">(IVA inc.)</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Back to Catalog -->
    <section class="tw-py-8 tw-px-4 tw-bg-white">
        <div class="tw-container tw-mx-auto tw-text-center">
            <a href="{{ route('catalogo.index') }}" class="tw-inline-flex tw-items-center tw-text-teal-600 hover:tw-text-teal-700 tw-font-semibold tw-no-underline">
                <i class="fas fa-arrow-left tw-mr-2"></i>
                Volver al catálogo
            </a>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    function incrementQuantity(max) {
        const input = document.getElementById('cantidad');
        const currentValue = parseInt(input.value);
        if (currentValue < max) {
            input.value = currentValue + 1;
        }
    }

    function decrementQuantity() {
        const input = document.getElementById('cantidad');
        const currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    }

    function agregarAlCarrito(productoId) {
        const cantidad = parseInt(document.getElementById('cantidad').value);
        
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
                actualizarContadorCarrito(data.cartCount);
                
                Swal.fire({
                    icon: 'success',
                    title: '¡Agregado!',
                    text: data.message,
                    showConfirmButton: true,
                    confirmButtonText: 'Ver carrito',
                    showCancelButton: true,
                    cancelButtonText: 'Seguir comprando',
                    confirmButtonColor: '#00a89d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route("carrito.index") }}';
                    }
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


