@extends('landing.app.landing')

@section('title', 'Pedido Confirmado - OPTIRANGO')

@section('content')
<main>
    <section class="tw-py-16 tw-px-4 sm:tw-px-6 lg:tw-px-8 tw-bg-gray-50 tw-min-h-[80vh] tw-flex tw-items-center">
        <div class="tw-container tw-mx-auto">
            <div class="tw-max-w-2xl tw-mx-auto">
                <!-- Success Card -->
                <div class="tw-bg-white tw-rounded-2xl tw-shadow-xl tw-overflow-hidden">
                    <!-- Header -->
                    <div class="tw-bg-gradient-to-r tw-from-green-500 tw-to-teal-500 tw-py-8 tw-px-6 tw-text-center tw-text-white" style="background: linear-gradient(to right, #00a89d, #14b8a6);">
                        <div class="tw-w-20 tw-h-20 tw-bg-white tw-rounded-full tw-flex tw-items-center tw-justify-center tw-mx-auto tw-mb-4">
                            <i class="fas fa-check tw-text-4xl tw-text-teal-500"></i>
                        </div>
                        <h1 class="tw-text-3xl tw-font-extrabold tw-mb-2">¡Pedido Confirmado!</h1>
                        <p class="tw-opacity-90">Tu pedido ha sido recibido exitosamente</p>
                    </div>

                    <!-- Order Details -->
                    <div class="tw-p-8">
                        <!-- Order Number -->
                        <div class="tw-bg-gray-50 tw-rounded-xl tw-p-6 tw-text-center tw-mb-8">
                            <p class="tw-text-sm tw-text-gray-500 tw-mb-1">Número de Pedido</p>
                            <p class="tw-text-2xl tw-font-bold text-primary-color">{{ $pedido->numero_pedido }}</p>
                            <p class="tw-text-xs tw-text-gray-400 tw-mt-2">
                                <i class="fas fa-calendar tw-mr-1"></i>
                                {{ $pedido->created_at }}
                            </p>
                        </div>

                        <!-- Customer Info -->
                        <div class="tw-mb-8">
                            <h3 class="tw-font-bold text-secondary-color tw-mb-4">
                                <i class="fas fa-user tw-mr-2 text-primary-color"></i>
                                Datos del Cliente
                            </h3>
                            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 tw-gap-4 tw-text-sm">
                                <div>
                                    <span class="tw-text-gray-500">Nombre:</span>
                                    <span class="tw-font-medium text-secondary-color tw-ml-2">{{ $pedido->nombre_cliente }}</span>
                                </div>
                                <div>
                                    <span class="tw-text-gray-500">Cédula:</span>
                                    <span class="tw-font-medium text-secondary-color tw-ml-2">{{ $pedido->cedula }}</span>
                                </div>
                                <div>
                                    <span class="tw-text-gray-500">Teléfono:</span>
                                    <span class="tw-font-medium text-secondary-color tw-ml-2">{{ $pedido->telefono }}</span>
                                </div>
                                @if($pedido->email)
                                <div>
                                    <span class="tw-text-gray-500">Email:</span>
                                    <span class="tw-font-medium text-secondary-color tw-ml-2">{{ $pedido->email }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="tw-mb-8">
                            <h3 class="tw-font-bold text-secondary-color tw-mb-4">
                                <i class="fas fa-box tw-mr-2 text-primary-color"></i>
                                Productos del Pedido
                            </h3>
                            <div class="tw-border tw-rounded-lg tw-overflow-hidden">
                                <table class="tw-w-full tw-text-sm">
                                    <thead class="tw-bg-gray-50">
                                        <tr>
                                            <th class="tw-px-4 tw-py-3 tw-text-left text-secondary-color">Producto</th>
                                            <th class="tw-px-4 tw-py-3 tw-text-center text-secondary-color">Cant.</th>
                                            <th class="tw-px-4 tw-py-3 tw-text-right text-secondary-color">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pedido->items as $item)
                                        <tr class="tw-border-t">
                                            <td class="tw-px-4 tw-py-3 text-secondary-color">{{ $item->nombre_producto }}</td>
                                            <td class="tw-px-4 tw-py-3 tw-text-center tw-text-gray-500">{{ $item->cantidad }}</td>
                                            <td class="tw-px-4 tw-py-3 tw-text-right tw-font-medium text-secondary-color">${{ number_format($item->subtotal, 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="tw-bg-gray-50 tw-rounded-xl tw-p-6 tw-mb-8">
                            <div class="tw-flex tw-justify-between tw-items-baseline tw-mb-2">
                                <span class="tw-text-lg tw-font-bold text-secondary-color">Total USD:</span>
                                <span class="tw-text-2xl tw-font-bold text-primary-color">${{ number_format($pedido->total_usd, 2) }}</span>
                            </div>
                            <div class="tw-flex tw-justify-between tw-items-baseline">
                                <span class="tw-text-sm tw-text-gray-500">Total Bs.:</span>
                                <span class="tw-text-lg tw-font-semibold tw-text-gray-700">Bs. {{ number_format($pedido->total_bs, 2) }}</span>
                            </div>
                            <p class="tw-text-xs tw-text-gray-400 tw-mt-2">
                                Tasa aplicada: Bs. {{ number_format($pedido->tasa_cambio, 2) }} por dólar
                            </p>
                        </div>

                        <!-- Next Steps -->
                        <div class="tw-bg-blue-50 tw-border tw-border-blue-200 tw-rounded-xl tw-p-6 tw-mb-8">
                            <h3 class="tw-font-bold tw-text-blue-800 tw-mb-3">
                                <i class="fas fa-info-circle tw-mr-2"></i>
                                ¿Qué sigue?
                            </h3>
                            <ol class="tw-text-sm tw-text-blue-700 tw-space-y-2 tw-list-decimal tw-list-inside">
                                <li>Nos comunicaremos contigo para confirmar disponibilidad</li>
                                <li>Coordinaremos la fecha y hora de retiro</li>
                                <li>Realiza el pago al momento de retirar en tienda</li>
                                <li>Los productos estarán reservados por 48 horas</li>
                            </ol>
                        </div>

                        <!-- Contact Info -->
                        <div class="tw-text-center tw-mb-6">
                            <p class="tw-text-gray-600 tw-mb-2">¿Tienes alguna pregunta?</p>
                            <p class="tw-text-lg tw-font-semibold text-primary-color">
                                <i class="fas fa-phone tw-mr-2"></i>+58 412-088-3674
                            </p>
                        </div>

                        <!-- Actions -->
                        <div class="tw-flex tw-flex-col sm:tw-flex-row tw-gap-4 tw-justify-center">
                            <a href="{{ route('catalogo.index') }}" class="tw-inline-flex tw-items-center tw-justify-center tw-px-6 tw-py-3 tw-border-2 tw-border-teal-500 tw-text-teal-600 hover:tw-text-teal-800 tw-rounded-lg tw-font-semibold hover:tw-bg-teal-50 tw-transition tw-no-underline">
                                <i class="fas fa-glasses tw-mr-2"></i>
                                Seguir Comprando
                            </a>
                            <a href="{{ route('index') }}" class="tw-inline-flex tw-items-center tw-justify-center tw-px-6 tw-py-3 bg-primary-color tw-text-white hover:tw-text-white tw-rounded-lg tw-font-semibold hover:tw-bg-teal-700 tw-transition tw-no-underline">
                                <i class="fas fa-home tw-mr-2"></i>
                                Ir al Inicio
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Print Button -->
                <div class="tw-text-center tw-mt-6">
                    <button onclick="window.print()" class="tw-text-gray-500 hover:tw-text-gray-700 tw-transition">
                        <i class="fas fa-print tw-mr-2"></i>
                        Imprimir Comprobante
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection


