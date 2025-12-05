@php
    $tasaBCV = App\Models\Tasa::getLastTasa();
    $tasaBinance = App\Models\Tasa::getLastTasaBinance();
    $tasaEuro = App\Models\Tasa::getLastTasaEuro();
@endphp

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-exchange-alt"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3" style="min-width: 380px;">
        <h6 class="dropdown-header">Conversor Multicurrency</h6>

        <!-- Bolívares -->
        <div class="form-group mb-2">
            <label for="bolivares-multi" class="small mb-1"><strong>Bolívares (Bs)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Bs</span>
                </div>
                <input type="number" id="bolivares-multi" class="form-control"
                    placeholder="0.00" step="0.01" min="0" value="">
            </div>
        </div>

        <!-- Euro -->
        <div class="form-group mb-2">
            <label for="euro-multi" class="small mb-1"><strong>Euro BCV (€)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">€</span>
                </div>
                <input type="number" id="euro-multi" class="form-control"
                    placeholder="0.00" step="0.01" min="0">
                <div class="input-group-append">
                    <span class="input-group-text badge-diff" id="diff-euro">-</span>
                </div>
            </div>
        </div>

        <!-- Dólar BCV -->
        <div class="form-group mb-2">
            <label for="usd-bcv-multi" class="small mb-1"><strong>Dólar BCV ($)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" id="usd-bcv-multi" class="form-control"
                    placeholder="0.00" step="0.01" min="0" value="1">
                <div class="input-group-append">
                    <span class="input-group-text badge-diff" id="diff-bcv">-</span>
                </div>
            </div>
        </div>

        <!-- Dólar Binance -->
        <div class="form-group mb-2">
            <label for="usd-binance-multi" class="small mb-1"><strong>Dólar Binance ($)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" id="usd-binance-multi" class="form-control"
                    placeholder="0.00" step="0.01" min="0">
                <div class="input-group-append">
                    <span class="input-group-text badge-diff" id="diff-binance">-</span>
                </div>
            </div>
        </div>

        <hr class="my-2">

        <!-- Tasas actuales -->
        <div class="row text-center">
            <div class="col-4">
                <small class="text-muted d-block">Tasa BCV</small>
                <strong class="text-primary" id="display-tasa-bcv">-</strong>
            </div>
            <div class="col-4">
                <small class="text-muted d-block">Tasa Binance</small>
                <strong class="text-success" id="display-tasa-binance">-</strong>
            </div>
            <div class="col-4">
                <small class="text-muted d-block">Tasa Euro</small>
                <strong class="text-warning" id="display-tasa-euro">-</strong>
            </div>
        </div>

        <small class="text-muted d-block text-center mt-2">
            <i class="fas fa-info-circle"></i> Los porcentajes muestran diferencia respecto a BCV
        </small>
    </div>
</li>

<style>
    .badge-diff {
        font-size: 0.75rem;
        min-width: 50px;
        font-weight: 600;
    }
</style>

<script>
    class CalculadoraMulticurrency {
        constructor() {
            this.tasaBCV = 0;
            this.tasaBinance = 0;
            this.tasaEuro = 0;
            this.calculando = false;
            this.init();
        }

        init() {
            this.obtenerTasas();
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Bolivares
            const bolivaresInput = document.getElementById('bolivares-multi');
            if (bolivaresInput) {
                bolivaresInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.convertirDesdeBolivares();
                    }
                });
            }

            // Euro
            const euroInput = document.getElementById('euro-multi');
            if (euroInput) {
                euroInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.convertirDesdeEuro();
                    }
                });
            }

            // USD BCV
            const usdBcvInput = document.getElementById('usd-bcv-multi');
            if (usdBcvInput) {
                usdBcvInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.convertirDesdeUsdBcv();
                    }
                });
            }

            // USD Binance
            const usdBinanceInput = document.getElementById('usd-binance-multi');
            if (usdBinanceInput) {
                usdBinanceInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.convertirDesdeUsdBinance();
                    }
                });
            }
        }

        async obtenerTasas() {
            try {
                // Obtener tasa BCV
                const responseBCV = await fetch('{{ route('tasa.last') }}');
                if (responseBCV.ok) {
                    const dataBCV = await responseBCV.json();
                    if (dataBCV) {
                        this.tasaBCV = parseFloat(dataBCV.valor);
                    }
                }

                // Obtener tasa Binance
                const responseBinance = await fetch('{{ route('tasa.binance.last') }}');
                if (responseBinance.ok) {
                    const dataBinance = await responseBinance.json();
                    if (dataBinance) {
                        this.tasaBinance = parseFloat(dataBinance.valor);
                    }
                }

                // Obtener tasa Euro
                const responseEuro = await fetch('{{ route('tasa.euro.last') }}');
                if (responseEuro.ok) {
                    const dataEuro = await responseEuro.json();
                    if (dataEuro) {
                        this.tasaEuro = parseFloat(dataEuro.valor);
                    }
                }

                this.updateTasasDisplay();
                this.convertirDesdeUsdBcv(); // Calcular inicial desde 1 USD BCV
            } catch (error) {
                console.error('Error al obtener las tasas:', error);
                this.updateUIError();
            }
        }

        convertirDesdeBolivares() {
            this.calculando = true;
            const bolivares = parseFloat(document.getElementById('bolivares-multi')?.value || 0);

            if (bolivares >= 0) {
                // Convertir a cada moneda
                const euro = this.tasaEuro > 0 ? bolivares / this.tasaEuro : 0;
                const usdBcv = this.tasaBCV > 0 ? bolivares / this.tasaBCV : 0;
                const usdBinance = this.tasaBinance > 0 ? bolivares / this.tasaBinance : 0;

                document.getElementById('euro-multi').value = euro.toFixed(2);
                document.getElementById('usd-bcv-multi').value = usdBcv.toFixed(2);
                document.getElementById('usd-binance-multi').value = usdBinance.toFixed(2);

                this.actualizarPorcentajes(usdBcv);
            }
            this.calculando = false;
        }

        convertirDesdeEuro() {
            this.calculando = true;
            const euro = parseFloat(document.getElementById('euro-multi')?.value || 0);

            if (this.tasaEuro > 0 && euro >= 0) {
                const bolivares = euro * this.tasaEuro;
                const usdBcv = this.tasaBCV > 0 ? bolivares / this.tasaBCV : 0;
                const usdBinance = this.tasaBinance > 0 ? bolivares / this.tasaBinance : 0;

                document.getElementById('bolivares-multi').value = bolivares.toFixed(2);
                document.getElementById('usd-bcv-multi').value = usdBcv.toFixed(2);
                document.getElementById('usd-binance-multi').value = usdBinance.toFixed(2);

                this.actualizarPorcentajes(usdBcv);
            }
            this.calculando = false;
        }

        convertirDesdeUsdBcv() {
            this.calculando = true;
            const usdBcv = parseFloat(document.getElementById('usd-bcv-multi')?.value || 0);

            if (this.tasaBCV > 0 && usdBcv >= 0) {
                const bolivares = usdBcv * this.tasaBCV;
                const euro = this.tasaEuro > 0 ? bolivares / this.tasaEuro : 0;
                const usdBinance = this.tasaBinance > 0 ? bolivares / this.tasaBinance : 0;

                document.getElementById('bolivares-multi').value = bolivares.toFixed(2);
                document.getElementById('euro-multi').value = euro.toFixed(2);
                document.getElementById('usd-binance-multi').value = usdBinance.toFixed(2);

                this.actualizarPorcentajes(usdBcv);
            }
            this.calculando = false;
        }

        convertirDesdeUsdBinance() {
            this.calculando = true;
            const usdBinance = parseFloat(document.getElementById('usd-binance-multi')?.value || 0);

            if (this.tasaBinance > 0 && usdBinance >= 0) {
                const bolivares = usdBinance * this.tasaBinance;
                const euro = this.tasaEuro > 0 ? bolivares / this.tasaEuro : 0;
                const usdBcv = this.tasaBCV > 0 ? bolivares / this.tasaBCV : 0;

                document.getElementById('bolivares-multi').value = bolivares.toFixed(2);
                document.getElementById('euro-multi').value = euro.toFixed(2);
                document.getElementById('usd-bcv-multi').value = usdBcv.toFixed(2);

                this.actualizarPorcentajes(usdBcv);
            }
            this.calculando = false;
        }

        actualizarPorcentajes(usdBcvBase) {
            // Calcular 1 USD en cada moneda para comparar
            const bsEnBCV = this.tasaBCV;
            const bsEnBinance = this.tasaBinance;
            const bsEnEuro = this.tasaEuro;

            // Porcentaje de diferencia respecto a BCV (base de referencia)
            const diffBinance = this.tasaBCV > 0 ? ((this.tasaBinance - this.tasaBCV) / this.tasaBCV) * 100 : 0;
            const diffEuro = this.tasaBCV > 0 && this.tasaEuro > 0 ? ((this.tasaEuro - this.tasaBCV) / this.tasaBCV) * 100 : 0;

            // Actualizar badges
            this.actualizarBadge('diff-euro', diffEuro);
            this.actualizarBadge('diff-bcv', 0); // BCV es la base, siempre 0%
            this.actualizarBadge('diff-binance', diffBinance);
        }

        actualizarBadge(elementId, porcentaje) {
            const badge = document.getElementById(elementId);
            if (badge) {
                const texto = porcentaje === 0 ? 'Base' : (porcentaje >= 0 ? '+' : '') + porcentaje.toFixed(2) + '%';
                badge.textContent = texto;
                
                // Aplicar color según el valor
                badge.className = 'input-group-text badge-diff';
                if (porcentaje > 0) {
                    badge.style.backgroundColor = '#28a745';
                    badge.style.color = 'white';
                } else if (porcentaje < 0) {
                    badge.style.backgroundColor = '#dc3545';
                    badge.style.color = 'white';
                } else {
                    badge.style.backgroundColor = '#6c757d';
                    badge.style.color = 'white';
                }
            }
        }

        updateTasasDisplay() {
            const displayBCV = document.getElementById('display-tasa-bcv');
            if (displayBCV) {
                displayBCV.textContent = this.formatNumber(this.tasaBCV) + ' Bs';
            }

            const displayBinance = document.getElementById('display-tasa-binance');
            if (displayBinance) {
                displayBinance.textContent = this.formatNumber(this.tasaBinance) + ' Bs';
            }

            const displayEuro = document.getElementById('display-tasa-euro');
            if (displayEuro) {
                displayEuro.textContent = this.formatNumber(this.tasaEuro) + ' Bs';
            }
        }

        updateUIError() {
            console.error('Error al cargar tasas');
            document.getElementById('display-tasa-bcv').textContent = 'Error';
            document.getElementById('display-tasa-binance').textContent = 'Error';
            document.getElementById('display-tasa-euro').textContent = 'Error';
        }

        formatNumber(number) {
            return parseFloat(number).toLocaleString('es-VE', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    }

    // Inicializar la calculadora cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        new CalculadoraMulticurrency();
    });
</script>

