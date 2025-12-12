@extends('landing.app.landing')

@section('title', 'Finalizar Pedido - OPTIRANGO')

@section('content')
<main>
    <!-- Header -->
    <section class="tw-bg-gradient-to-r tw-from-green-500 tw-to-teal-500 tw-py-8 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-text-white" style="background: linear-gradient(to right, #00a89d, #14b8a6);">
        <div class="tw-container tw-mx-auto">
            <h1 class="tw-text-3xl tw-font-extrabold">
                <i class="fas fa-clipboard-check tw-mr-3"></i>Finalizar Pedido
            </h1>
        </div>
    </section>

    <section class="tw-py-12 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-50">
        <div class="tw-container tw-mx-auto">
            <div class="tw-grid tw-grid-cols-1 lg:tw-grid-cols-3 tw-gap-8">
                <!-- Checkout Form -->
                <div class="lg:tw-col-span-2">
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-mb-6">
                        <h2 class="tw-text-xl tw-font-bold text-secondary-color tw-mb-6">
                            <i class="fas fa-user tw-mr-2 text-primary-color"></i>
                            Datos de Contacto
                        </h2>
                        
                        <form action="{{ route('checkout.procesar') }}" method="POST" id="checkout-form">
                            @csrf
                            
                            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-6">
                                <!-- Nombre -->
                                <div class="md:tw-col-span-2">
                                    <label for="nombre" class="tw-block tw-text-sm tw-font-medium text-secondary-color tw-mb-2">
                                        Nombre Completo <span class="tw-text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="nombre" 
                                        name="nombre" 
                                        value="{{ old('nombre') }}"
                                        required
                                        class="tw-w-full tw-px-4 tw-py-3 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color @error('nombre') tw-border-red-500 @enderror"
                                        placeholder="Ej: Juan Pérez"
                                    >
                                    @error('nombre')
                                        <p class="tw-mt-1 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Cédula -->
                                <div>
                                    <label for="cedula" class="tw-block tw-text-sm tw-font-medium text-secondary-color tw-mb-2">
                                        Cédula de Identidad <span class="tw-text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="cedula" 
                                        name="cedula" 
                                        value="{{ old('cedula') }}"
                                        required
                                        class="tw-w-full tw-px-4 tw-py-3 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color @error('cedula') tw-border-red-500 @enderror"
                                        placeholder="Ej: V12345678"
                                    >
                                    @error('cedula')
                                        <p class="tw-mt-1 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Teléfono -->
                                <div>
                                    <label for="telefono" class="tw-block tw-text-sm tw-font-medium text-secondary-color tw-mb-2">
                                        Teléfono <span class="tw-text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="telefono" 
                                        name="telefono" 
                                        value="{{ old('telefono') }}"
                                        required
                                        class="tw-w-full tw-px-4 tw-py-3 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color @error('telefono') tw-border-red-500 @enderror"
                                        placeholder="Ej: 0412-1234567"
                                    >
                                    @error('telefono')
                                        <p class="tw-mt-1 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Email -->
                                <div class="md:tw-col-span-2">
                                    <label for="email" class="tw-block tw-text-sm tw-font-medium text-secondary-color tw-mb-2">
                                        Correo Electrónico <span class="tw-text-gray-400">(opcional)</span>
                                    </label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}"
                                        class="tw-w-full tw-px-4 tw-py-3 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color @error('email') tw-border-red-500 @enderror"
                                        placeholder="Ej: correo@ejemplo.com"
                                    >
                                    @error('email')
                                        <p class="tw-mt-1 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Notas -->
                                <div class="md:tw-col-span-2">
                                    <label for="notas" class="tw-block tw-text-sm tw-font-medium text-secondary-color tw-mb-2">
                                        Notas adicionales <span class="tw-text-gray-400">(opcional)</span>
                                    </label>
                                    <textarea 
                                        id="notas" 
                                        name="notas" 
                                        rows="3"
                                        class="tw-w-full tw-px-4 tw-py-3 tw-rounded-lg tw-border tw-border-gray-300 focus:tw-ring-2 focus:tw-ring-teal-500 focus:tw-border-transparent text-secondary-color @error('notas') tw-border-red-500 @enderror"
                                        placeholder="¿Tienes alguna indicación especial?"
                                    >{{ old('notas') }}</textarea>
                                    @error('notas')
                                        <p class="tw-mt-1 tw-text-sm tw-text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Important Info -->
                    <div class="tw-bg-blue-50 tw-border tw-border-blue-200 tw-rounded-xl tw-p-6">
                        <h3 class="tw-font-bold tw-text-blue-800 tw-mb-3">
                            <i class="fas fa-info-circle tw-mr-2"></i>
                            Información Importante
                        </h3>
                        <ul class="tw-text-sm tw-text-blue-700 tw-space-y-2">
                            <li><i class="fas fa-check tw-mr-2"></i>Nos comunicaremos contigo para confirmar tu pedido</li>
                            <li><i class="fas fa-check tw-mr-2"></i>El pago se realiza al momento de retirar en tienda</li>
                            <li><i class="fas fa-check tw-mr-2"></i>Los productos estarán reservados por 48 horas</li>
                            <li><i class="fas fa-check tw-mr-2"></i>Aceptamos efectivo, transferencias y pago móvil</li>
                        </ul>
                    </div>

                    <!-- Back Link -->
                    <div class="tw-mt-6">
                        <a href="{{ route('carrito.index') }}" class="tw-inline-flex tw-items-center tw-text-teal-600 hover:tw-text-teal-700 tw-font-semibold tw-no-underline">
                            <i class="fas fa-arrow-left tw-mr-2"></i>
                            Volver al carrito
                        </a>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:tw-col-span-1">
                    <div class="tw-bg-white tw-rounded-xl tw-shadow-lg tw-p-6 tw-sticky tw-top-4">
                        <h2 class="tw-text-xl tw-font-bold text-secondary-color tw-mb-6">Resumen del Pedido</h2>
                        
                        <!-- Products List -->
                        <div class="tw-space-y-4 tw-mb-6 tw-max-h-64 tw-overflow-y-auto">
                            @foreach($cart as $id => $item)
                                <div class="tw-flex tw-gap-3 tw-pb-3 tw-border-b tw-border-gray-100">
                                    <div class="tw-w-12 tw-h-12 tw-flex-shrink-0">
                                        @if($item['imagen'])
                                            <img src="{{ asset('storage/' . $item['imagen']) }}" 
                                                 alt="{{ $item['nombre'] }}" 
                                                 class="tw-w-full tw-h-full tw-object-cover tw-rounded"
                                                 onerror="this.onerror=null;this.src='https://placehold.co/50x50/e2e8f0/64748b?text=Img';">
                                        @else
                                            <img src="https://placehold.co/50x50/e2e8f0/64748b?text=Img" 
                                                 alt="{{ $item['nombre'] }}" 
                                                 class="tw-w-full tw-h-full tw-object-cover tw-rounded">
                                        @endif
                                    </div>
                                    <div class="tw-flex-1 tw-min-w-0">
                                        <p class="tw-text-sm tw-font-medium text-secondary-color tw-truncate">{{ $item['nombre'] }}</p>
                                        <p class="tw-text-xs tw-text-gray-500">Cantidad: {{ $item['cantidad'] }}</p>
                                    </div>
                                    <div class="tw-text-right">
                                        <p class="tw-text-sm tw-font-semibold text-primary-color">
                                            ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Totals -->
                        <div class="tw-border-t tw-border-gray-200 tw-pt-4 tw-mb-6">
                            <div class="tw-flex tw-justify-between tw-items-baseline tw-mb-2">
                                <span class="tw-text-lg tw-font-bold text-secondary-color">Total USD</span>
                                <span class="tw-text-2xl tw-font-bold text-primary-color">${{ number_format($total, 2) }}</span>
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
                                <span class="tw-text-lg tw-font-semibold tw-text-gray-700">Bs. {{ number_format($totalBs, 2) }}</span>
                            </div>
                            @if($tasa)
                                <p class="tw-text-xs tw-text-gray-400 tw-mt-2">
                                    Tasa BCV: Bs. {{ number_format($tasa->valor, 2) }}
                                </p>
                            @endif
                        </div>
                        
                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            form="checkout-form"
                            class="tw-w-full bg-primary-color tw-text-white tw-py-4 tw-px-6 tw-rounded-lg tw-font-bold tw-text-lg hover:tw-bg-teal-700 tw-transition tw-duration-300"
                        >
                            <i class="fas fa-check-circle tw-mr-2"></i>
                            Confirmar Pedido
                        </button>
                        
                        <div class="tw-mt-4 tw-text-center">
                            <p class="tw-text-xs tw-text-gray-500">
                                <i class="fas fa-lock tw-mr-1"></i>
                                Tus datos están seguros con nosotros
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script type="module">
    // Máscara para cédula
    IMask(document.getElementById('cedula'), {
        mask: '{v}00000000',
        prepareChar: str => str.toUpperCase(),
        definitions: {
            'v': /[V,J,G,E,P]/
        }
    });

    // Máscara para teléfono
    IMask(document.getElementById('telefono'), {
        mask: '0000-0000000'
    });
</script>
@endpush


