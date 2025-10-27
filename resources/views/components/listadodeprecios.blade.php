<!-- Botón para abrir el modal -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#listadoPreciosModal">
        <i class="fas fa-list-alt"></i> Precios
    </a>
</li>

@once
    @push('js')
        @php
            $categorias = \App\Models\Categoria::with([
                'productos' => function ($query) {
                    $query->where('status', 1)->orderBy('nombre');
                }
            ])->orderBy('nombre')->get();
            $tasaBinance = \App\Models\Tasa::where('fuente', 'Binance')->orderBy('created_at', 'desc')->first();
            $tasaBCV = \App\Models\Tasa::where('fuente', 'BCV')->orderBy('created_at', 'desc')->first();
        @endphp

        <!-- Modal de Lista de Precios - Fuera del navbar -->
        <div class="modal fade" id="listadoPreciosModal" tabindex="-1" role="dialog" aria-labelledby="listadoPreciosModalLabel"
            aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-xl" role="document" style="max-width: 95%;">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white;">
                        <div>
                            <h5 class="modal-title" id="listadoPreciosModalLabel">
                                <i class="fas fa-list-alt"></i> Lista de Precios
                            </h5>
                        </div>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: #f8f9fa; max-height: 70vh; overflow-y: auto;">
                        @if($categorias->isEmpty() || $categorias->every(fn($cat) => $cat->productos->isEmpty()))
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> No hay productos disponibles en este momento.
                            </div>
                        @else
                            @foreach($categorias as $categoria)
                                @if($categoria->productos->isNotEmpty())
                                    <div class="mb-4">
                                        <!-- Encabezado de Categoría -->
                                        <div class="text-center mb-3"
                                            style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 12px; border-radius: 5px;">
                                            <h5 class="mb-1" style="font-weight: 600; text-transform: uppercase;">
                                                {{ $categoria->nombre }}
                                            </h5>
                                            @if($categoria->descripcion)
                                                <small class="d-block" style="font-size: 0.85rem; opacity: 0.9;">
                                                    {{ $categoria->descripcion }}
                                                </small>
                                            @endif
                                        </div>

                                        <!-- Tabla de Productos -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover mb-0"
                                                style="background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                                <thead style="background: linear-gradient(135deg, #4a6fa5 0%, #5b7fb8 100%); color: white;">
                                                    <tr>
                                                        <th style="width: 60px; text-align: center; font-weight: 600;">#</th>
                                                        <th style="font-weight: 600;">PRODUCTO</th>
                                                        <th style="width: 200px; text-align: center; font-weight: 600;">PRECIO (USD)</th>
                                                        <th style="width: 200px; text-align: center; font-weight: 600;">PRECIO (Bs)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($categoria->productos as $index => $producto)
                                                        @php
                                                            // Cálculo: precio_producto * tasa_binance = precio en Bs
                                                            // (precio_producto * tasa_binance) / tasa_bcv = precio en USD mostrado
                                                            $precioBs = ($tasaBinance && $producto->precio) ? $producto->precio * $tasaBinance->valor : 0;
                                                            $precioUSD = ($tasaBCV && $tasaBCV->valor > 0 && $precioBs > 0) ? $precioBs / $tasaBCV->valor : 0;
                                                        @endphp
                                                        <tr style="background-color: {{ $index % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                                                            <td style="text-align: center; font-weight: 600; color: #495057;">
                                                                {{ $index + 1 }}
                                                            </td>
                                                            <td style="padding-left: 15px; font-weight: 500;">
                                                                {{ $producto->nombre }}
                                                                @if($producto->descripcion)
                                                                    <br><small class="text-muted">{{ $producto->descripcion }}</small>
                                                                @endif
                                                            </td>
                                                            <td style="text-align: center; font-weight: 600; color: #28a745;">
                                                                ${{ number_format($precioUSD, 0, ',', '.') }}
                                                            </td>
                                                            <td style="text-align: center; font-weight: 600; color: #007bff;">
                                                                {{ number_format($precioBs, 2, ',', '.') }} Bs
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <!-- Nota al pie -->
                            <div class="text-center mt-3 p-3"
                                style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; border-radius: 5px;">
                                <small style="font-weight: 500;">
                                    <i class="fas fa-info-circle"></i> Los precios están sujetos a cambios según la tasa de cambio vigente.
                                </small>
                            </div>
                        @endif
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="imprimirListaPrecios()">
                    <i class="fas fa-print"></i> Imprimir
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
            </div>
                </div>
            </div>
        </div>

        <style>
            /* Asegurar que el modal tenga el z-index correcto */
            #listadoPreciosModal {
                z-index: 9999 !important;
            }

            #listadoPreciosModal .modal-backdrop {
                z-index: 9998 !important;
            }

            /* Estilos para impresión */
            @media print {
                body * {
                    visibility: hidden;
                }

                #listadoPreciosModal,
                #listadoPreciosModal * {
                    visibility: visible;
                }

                #listadoPreciosModal {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }

                #listadoPreciosModal .modal-header {
                    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
                    color: white !important;
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }

                #listadoPreciosModal .modal-footer {
                    display: none;
                }

                #listadoPreciosModal .modal-dialog {
                    max-width: 100%;
                    margin: 0;
                }

                #listadoPreciosModal .modal-content {
                    border: none;
                    box-shadow: none;
                }
            }

            /* Estilos adicionales para el modal */
            #listadoPreciosModal .table {
                margin-bottom: 0;
            }

            #listadoPreciosModal .table thead th {
                border-color: #2a5298;
                padding: 12px 8px;
            }

            #listadoPreciosModal .table tbody td {
                border-color: #dee2e6;
                padding: 10px 8px;
                vertical-align: middle;
            }
        </style>

        <script>
            // Esperar a que jQuery y Bootstrap estén disponibles
            (function() {
                function initListaPrecios() {
                    if (typeof jQuery === 'undefined' || typeof jQuery.fn.modal === 'undefined') {
                        setTimeout(initListaPrecios, 100);
                        return;
                    }

                    // Limpiar modal al cerrar
                    jQuery('#listadoPreciosModal').on('hidden.bs.modal', function () {
                        jQuery('body').removeClass('modal-open');
                        jQuery('.modal-backdrop').remove();
                    });
                }

                // Iniciar cuando el DOM esté listo
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initListaPrecios);
                } else {
                    initListaPrecios();
                }
            })();

            // Función para imprimir
            function imprimirListaPrecios() {
                window.print();
            }
        </script>
    @endpush
@endonce