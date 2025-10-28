@php
    $tasaBCV = App\Models\Tasa::getLastTasa();
    $tasaBinance = App\Models\Tasa::getLastTasaBinance();
@endphp

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fab fa-bitcoin"></i> <span id="tasa-binance-display">Cargando...</span> Bs
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3" style="min-width: 280px;">
        <h6 class="dropdown-header">Calculadora Binance (Bidireccional)</h6>

        <div class="form-group mb-2">
            <label for="dolares-binance" class="small mb-1"><strong>Dólares (USD)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" id="dolares-binance" class="form-control"
                    placeholder="0.00" step="0.01" min="0" value="1">
            </div>
        </div>

        <div class="form-group mb-2">
            <label for="bolivares-binance" class="small mb-1"><strong>Bolívares (Bs)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Bs</span>
                </div>
                <input type="number" id="bolivares-binance" class="form-control"
                    placeholder="0.00" step="0.01" min="0">
            </div>
        </div>

        <hr class="my-2">

        <p class="mb-1 text-center">
            <strong>Tasa Binance:</strong> <span id="tasa-binance" class="text-success">Cargando...</span> Bs
        </p>

        <small class="text-muted d-block text-center">
            Actualizado: <span id="last-update-binance">-</span>
        </small>
    </div>
</li>

<script>
    class CalculadoraBinance {
        constructor() {
            this.tasaBinance = 0;
            this.lastUpdateBinance = null;
            this.calculando = false; // Bandera para evitar bucles
            this.init();
        }

        init() {
            this.obtenerTasas();
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Evento para calcular Bs cuando cambian los dólares
            const dolaresInput = document.getElementById('dolares-binance');
            if (dolaresInput) {
                dolaresInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.calcularBolivares();
                    }
                });
            }

            // Evento para calcular dólares cuando cambian los bolívares
            const bolivaresInput = document.getElementById('bolivares-binance');
            if (bolivaresInput) {
                bolivaresInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.calcularDolares();
                    }
                });
            }
        }

        async obtenerTasas() {
            try {
                // Obtener tasa Binance
                const responseBinance = await fetch('{{ route('tasa.binance.last') }}');
                if (responseBinance.ok) {
                    const dataBinance = await responseBinance.json();
                    if (dataBinance) {
                        this.tasaBinance = parseFloat(dataBinance.valor);
                        this.lastUpdateBinance = dataBinance.created_at;
                    }
                }

                this.updateUI();
                this.calcularBolivares(); // Calcular inicial
            } catch (error) {
                console.error('Error al obtener las tasas:', error);
                this.updateUIError();
            }
        }

        calcularBolivares() {
            this.calculando = true;
            const dolaresInput = document.getElementById('dolares-binance');
            const bolivaresInput = document.getElementById('bolivares-binance');
            const dolares = parseFloat(dolaresInput?.value || 0);
            
            if (this.tasaBinance > 0 && dolares >= 0) {
                const resultado = dolares * this.tasaBinance;
                bolivaresInput.value = resultado.toFixed(2);
            } else {
                bolivaresInput.value = '0.00';
            }
            this.calculando = false;
        }

        calcularDolares() {
            this.calculando = true;
            const dolaresInput = document.getElementById('dolares-binance');
            const bolivaresInput = document.getElementById('bolivares-binance');
            const bolivares = parseFloat(bolivaresInput?.value || 0);
            
            if (this.tasaBinance > 0 && bolivares >= 0) {
                const resultado = bolivares / this.tasaBinance;
                dolaresInput.value = resultado.toFixed(2);
            } else {
                dolaresInput.value = '0.00';
            }
            this.calculando = false;
        }

        updateUI() {
            // Actualizar tasa Binance en el dropdown toggle
            const tasaDisplay = document.getElementById('tasa-binance-display');
            if (tasaDisplay) {
                tasaDisplay.textContent = this.formatNumber(this.tasaBinance);
            }

            // Actualizar tasas en el contenido del dropdown
            const tasaBinance = document.getElementById('tasa-binance');
            if (tasaBinance) {
                tasaBinance.textContent = this.formatNumber(this.tasaBinance);
            }

            // Actualizar fechas
            const lastUpdateBinanceElement = document.getElementById('last-update-binance');
            if (lastUpdateBinanceElement) {
                lastUpdateBinanceElement.textContent = this.lastUpdateBinance || '-';
            }
        }

        updateUIError() {
            // Mostrar error en la UI
            const tasaDisplay = document.getElementById('tasa-binance-display');
            if (tasaDisplay) {
                tasaDisplay.textContent = 'Error';
            }

            const tasaBinance = document.getElementById('tasa-binance');
            if (tasaBinance) {
                tasaBinance.textContent = 'Error al cargar';
            }
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
        new CalculadoraBinance();
    });
</script>
