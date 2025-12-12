@extends('landing.app.landing')

@section('title', 'Carrito de Compras - OPTIRANGO')

@section('content')
<main>
    <!-- Header -->
    <section class="tw-bg-gradient-to-r tw-from-green-500 tw-to-teal-500 tw-py-8 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-text-white" style="background: linear-gradient(to right, #00a89d, #14b8a6);">
        <div class="tw-container tw-mx-auto">
            <h1 class="tw-text-3xl tw-font-extrabold">
                <i class="fas fa-shopping-cart tw-mr-3"></i>Tu Carrito
            </h1>
        </div>
    </section>

    <section class="tw-py-12 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-50 tw-min-h-[60vh]">
        <div class="tw-container tw-mx-auto">
            @if(count($cart) > 0)
                <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-8">
                    <!-- Cart Items -->
                    <div class="lg:tw-col-span-2">
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-overflow-hidden">
                            <div class="tw-p-6 tw-border-b tw-border-gray-200">
                                <h2 class="tw-text-xl tw-font-bold text-secondary-color">
                                    Productos ({{ count($cart) }})
                                </h2>
                            </div>
                            
                            <div id="cart-items">
                                @foreach($cart as $id => $item)
                                    <div class="tw-p-6 tw-border-b tw-border-gray-100 tw-flex tw-flex-col sm:tw-flex-row tw-gap-4" id="cart-item-{{ $id }}">
                                        <!-- Product Image -->
                                        <div class="tw-w-full sm:tw-w-24 tw-h-24 tw-flex-shrink-0">
                                            @if($item['imagen'])
                                                <img src="{{ asset('storage/' . $item['imagen']) }}" 
                                                     alt="{{ $item['nombre'] }}" 
                                                     class="tw-w-full tw-h-full tw-object-cover tw-rounded-lg"
                                                     onerror="this.onerror=null;this.src='https://placehold.co/100x100/e2e8f0/64748b?text=Img';">
                                            @else
                                                <img src="https://placehold.co/100x100/e2e8f0/64748b?text=Img" 
                                                     alt="{{ $item['nombre'] }}" 
                                                     class="tw-w-full tw-h-full tw-object-cover tw-rounded-lg">
                                            @endif
                                        </div>
                                        
                                        <!-- Product Info -->
                                        <div class="tw-flex-1">
                                            <h3 class="tw-font-bold text-secondary-color tw-mb-1">{{ $item['nombre'] }}</h3>
                                            <p class="tw-text-sm tw-text-gray-500 tw-mb-2">
                                                Precio unitario: ${{ number_format($item['precio'], 2) }}
                                            </p>
                                            
                                            <!-- Quantity Controls -->
                                            <div class="tw-flex tw-items-center tw-gap-4">
                                                <div class="tw-flex tw-items-center tw-border tw-border-gray-300 tw-rounded-lg tw-overflow-hidden">
                                                    <button type="button" onclick="actualizarCantidad({{ $id }}, -1)" class="tw-px-3 tw-py-1 tw-bg-gray-100 hover:tw-bg-gray-200 tw-transition">
                                                        <i class="fas fa-minus tw-text-xs"></i>
                                                    </button>
                                                    <span class="tw-w-10 tw-text-center text-secondary-color" id="qty-{{ $id }}">{{ $item['cantidad'] }}</span>
                                                    <button type="button" onclick="actualizarCantidad({{ $id }}, 1)" class="tw-px-3 tw-py-1 tw-bg-gray-100 hover:tw-bg-gray-200 tw-transition">
                                                        <i class="fas fa-plus tw-text-xs"></i>
                                                    </button>
                                                </div>
                                                <button onclick="eliminarDelCarrito({{ $id }})" class="tw-text-red-500 hover:tw-text-red-700 tw-transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <!-- Subtotal -->
                                        <div class="tw-text-right">
                                            <p class="tw-text-lg tw-font-bold text-primary-color" id="subtotal-{{ $id }}">
                                                ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                                            </p>
                                            <p class="tw-text-sm tw-text-gray-500" id="subtotal-bs-{{ $id }}">
                                                @php
                                                    $subtotalBs = isset($item['precio_bs']) 
                                                        ? $item['precio_bs'] * $item['cantidad'] 
                                                        : ($tasa ? $item['precio'] * $item['cantidad'] * $tasa->valor : 0);
                                                @endphp
                                                Bs. {{ number_format($subtotalBs, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Continue Shopping -->
                        <div class="tw-mt-6">
                            <a href="{{ route('catalogo.index') }}" class="tw-inline-flex tw-items-center tw-text-teal-600 hover:tw-text-teal-700 tw-font-semibold tw-no-underline">
                                <i class="fas fa-arrow-left tw-mr-2"></i>
                                Continuar comprando
                            </a>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="lg:tw-col-span-1">
                        <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-sticky tw-top-4">
                            <h2 class="tw-text-xl tw-font-bold text-secondary-color tw-mb-6">Resumen del Pedido</h2>
                            
                            <div class="tw-space-y-4 tw-mb-6">
                                <div class="tw-flex tw-justify-between tw-text-gray-600">
                                    <span>Subtotal</span>
                                    <span id="summary-subtotal">${{ number_format($total, 2) }}</span>
                                </div>
                                <div class="tw-flex tw-justify-between tw-text-gray-600">
                                    <span>Envío</span>
                                    <span class="tw-text-green-600">Retiro en tienda</span>
                                </div>
                            </div>
                            
                            <div class="tw-border-t tw-border-gray-200 tw-pt-4 tw-mb-6">
                                <div class="tw-flex tw-justify-between tw-items-baseline tw-mb-2">
                                    <span class="tw-text-lg tw-font-bold text-secondary-color">Total USD</span>
                                    <span class="tw-text-2xl tw-font-bold text-primary-color" id="summary-total-usd">${{ number_format($total, 2) }}</span>
                                </div>
                                @php
                                    $totalBs = 0;
                                    foreach($cart as $item) {
                                        $totalBs += isset($item['precio_bs']) 
                                            ? $item['precio_bs'] * $item['cantidad'] 
                                            : ($tasa ? $item['precio'] * $item['cantidad'] * $tasa->valor : 0);
                                    }
                                @endphp
                                <div class="tw-flex tw-justify-between tw-items-baseline">
                                    <span class="tw-text-sm tw-text-gray-500">Total Bs.</span>
                                    <span class="tw-text-lg tw-font-semibold tw-text-gray-700" id="summary-total-bs">Bs. {{ number_format($totalBs, 2) }}</span>
                                </div>
                                @if($tasa)
                                    <p class="tw-text-xs tw-text-gray-400 tw-mt-2">
                                        Tasa BCV: Bs. {{ number_format($tasa->valor, 2) }} ({{ \Carbon\Carbon::parse($tasa->fecha)->format('d/m/Y') }})
                                    </p>
                                @endif
                            </div>
                            
                            <a href="{{ route('checkout.index') }}" class="tw-block tw-w-full bg-primary-color tw-text-white hover:tw-text-white tw-py-3 tw-px-6 tw-rounded-lg tw-font-bold tw-text-center hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-no-underline">
                                <i class="fas fa-lock tw-mr-2"></i>
                                Proceder al Checkout
                            </a>
                            
                            <div class="tw-mt-6 tw-text-center">
                                <p class="tw-text-xs tw-text-gray-500">
                                    <i class="fas fa-shield-alt tw-mr-1"></i>
                                    Compra segura - Pago en tienda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="tw-text-center tw-py-16">
                    <i class="fas fa-shopping-cart tw-text-8xl tw-text-gray-300 tw-mb-6"></i>
                    <h2 class="tw-text-2xl tw-font-bold text-secondary-color tw-mb-4">Tu carrito está vacío</h2>
                    <p class="tw-text-gray-500 tw-mb-8">¡Explora nuestro catálogo y encuentra los productos perfectos para ti!</p>
                    <a href="{{ route('catalogo.index') }}" class="tw-inline-block bg-primary-color tw-text-white tw-px-8 tw-py-3 tw-rounded-lg tw-font-bold tw-text-lg hover:tw-bg-teal-700 tw-transition tw-duration-300 tw-no-underline">
                        <i class="fas fa-glasses tw-mr-2"></i>
                        Ver Catálogo
                    </a>
                </div>
            @endif
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    const tasaValor = {{ $tasa ? $tasa->valor : 0 }};

    function actualizarCantidad(productoId, cambio) {
        const qtyElement = document.getElementById('qty-' + productoId);
        let currentQty = parseInt(qtyElement.textContent);
        let newQty = currentQty + cambio;
        
        if (newQty < 1) {
            eliminarDelCarrito(productoId);
            return;
        }

        fetch('{{ route("carrito.actualizar") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                producto_id: productoId,
                cantidad: newQty
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                qtyElement.textContent = newQty;
                actualizarContadorCarrito(data.cartCount);
                actualizarTotales();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message
                });
            }
        });
    }

    function eliminarDelCarrito(productoId) {
        Swal.fire({
            title: '¿Eliminar producto?',
            text: '¿Estás seguro de quitar este producto del carrito?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#00a89d',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('{{ route("carrito.quitar") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        producto_id: productoId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cart-item-' + productoId).remove();
                        actualizarContadorCarrito(data.cartCount);
                        
                        if (data.cartCount === 0) {
                            location.reload();
                        } else {
                            actualizarTotales();
                        }
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            text: 'Producto eliminado del carrito',
                            showConfirmButton: false,
                            timer: 1500,
                            toast: true,
                            position: 'top-end'
                        });
                    }
                });
            }
        });
    }

    function actualizarTotales() {
        fetch('{{ route("carrito.data") }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('summary-subtotal').textContent = '$' + data.totalUsd.toFixed(2);
            document.getElementById('summary-total-usd').textContent = '$' + data.totalUsd.toFixed(2);
            if (document.getElementById('summary-total-bs')) {
                document.getElementById('summary-total-bs').textContent = 'Bs. ' + data.totalBs.toFixed(2);
            }
            
            // Actualizar subtotales individuales
            data.items.forEach(item => {
                const subtotalEl = document.getElementById('subtotal-' + item.id);
                const subtotalBsEl = document.getElementById('subtotal-bs-' + item.id);
                if (subtotalEl) {
                    subtotalEl.textContent = '$' + (item.precio * item.cantidad).toFixed(2);
                }
                if (subtotalBsEl) {
                    // Usar precio_bs si existe, sino calcular con tasa
                    const precioBs = item.precio_bs || (item.precio * tasaValor);
                    subtotalBsEl.textContent = 'Bs. ' + (precioBs * item.cantidad).toFixed(2);
                }
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


