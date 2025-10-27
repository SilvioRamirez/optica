@php
    $tasaBCV = App\Models\Tasa::getLastTasa();
    $tasaBinance = App\Models\Tasa::getLastTasaBinance();
@endphp

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fab fa-bitcoin"></i> <span id="tasa-binance-display">Cargando...</span> Bs
        <span id="diferencia-display" class="badge badge-info ml-1">-</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3" style="min-width: 300px;">
        <h6 class="dropdown-header">Calculadora $ → Bs (Binance vs BCV)</h6>

        <div class="form-group mb-2">
            <input type="number" id="dolares-binance" class="form-control form-control-sm"
                placeholder="Monto en USD" step="0.01" min="0" value="1">
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <p class="mb-1">
                    <strong>Tasa Binance:</strong><br>
                    <span id="tasa-binance">Cargando...</span> Bs
                </p>
            </div>
            <div class="col-6">
                <p class="mb-1">
                    <strong>Tasa BCV:</strong><br>
                    <span id="tasa-bcv-comp">Cargando...</span> Bs
                </p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-6">
                <p class="mb-1">
                    <strong>Total Binance:</strong><br>
                    <span id="total-binance" class="text-success">0.00</span> Bs
                </p>
            </div>
            <div class="col-6">
                <p class="mb-1">
                    <strong>Total BCV:</strong><br>
                    <span id="total-bcv" class="text-primary">0.00</span> Bs
                </p>
            </div>
        </div>

        <div class="alert alert-info py-2 mb-2">
            <strong>Diferencia:</strong> <span id="diferencia-absoluta">0.00</span> Bs 
            (<span id="diferencia-porcentaje">0.00</span>%)
        </div>

        <small class="text-muted d-block mb-2">
            <strong>Binance:</strong> <span id="last-update-binance">-</span><br>
            <strong>BCV:</strong> <span id="last-update-bcv">-</span>
        </small>
        
        <div class="mt-2">
            <button id="refresh-binance" class="btn btn-sm btn-outline-warning mr-1">
                <i class="fab fa-bitcoin"></i> Actualizar Binance
            </button>
            <button id="refresh-comparison" class="btn btn-sm btn-outline-info">
                <i class="fas fa-sync-alt"></i> Comparar
            </button>
        </div>
    </div>
</li>

<script>
    class CalculadoraBinance {
        constructor() {
            this.tasaBinance = 0;
            this.tasaBCV = 0;
            this.lastUpdateBinance = null;
            this.lastUpdateBCV = null;
            this.init();
        }

        init() {
            this.obtenerTasas();
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Evento para calcular cuando se cambia el monto
            const dolaresInput = document.getElementById('dolares-binance');
            if (dolaresInput) {
                dolaresInput.addEventListener('input', () => this.calcular());
                dolaresInput.addEventListener('keyup', () => this.calcular());
            }

            // Evento para refrescar Binance
            const refreshBinanceButton = document.getElementById('refresh-binance');
            if (refreshBinanceButton) {
                refreshBinanceButton.addEventListener('click', () => {
                    refreshBinanceButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Actualizando...';
                    this.actualizarBinance();
                });
            }

            // Evento para comparar tasas
            const refreshComparisonButton = document.getElementById('refresh-comparison');
            if (refreshComparisonButton) {
                refreshComparisonButton.addEventListener('click', () => {
                    refreshComparisonButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Comparando...';
                    this.compararTasas();
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
                        this.lastUpdateBCV = dataBCV.fecha;
                    }
                }

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
                this.calcular();
            } catch (error) {
                console.error('Error al obtener las tasas:', error);
                this.updateUIError();
            }
        }

        async actualizarBinance() {
            try {
                const response = await fetch('{{ route('tasa.binance') }}');
                
                if (!response.ok) {
                    throw new Error('Error en la respuesta de la API');
                }
                
                const data = await response.json();

                if (data.success) {
                    this.tasaBinance = parseFloat(data.precio);
                    this.lastUpdateBinance = data.fecha;
                    
                    this.updateUI();
                    this.calcular();
                } else {
                    throw new Error(data.error || 'Error desconocido');
                }
            } catch (error) {
                console.error('Error al actualizar Binance:', error);
                this.updateUIError();
            }
        }

        async compararTasas() {
            try {
                const response = await fetch('{{ route('tasa.comparar') }}');
                
                if (!response.ok) {
                    throw new Error('Error en la respuesta de la API');
                }
                
                const data = await response.json();

                if (data.success) {
                    this.tasaBinance = parseFloat(data.tasa_binance);
                    this.tasaBCV = parseFloat(data.tasa_bcv);
                    this.lastUpdateBinance = data.fecha_binance;
                    this.lastUpdateBCV = data.fecha_bcv;
                    
                    this.updateUI();
                    this.calcular();
                } else {
                    throw new Error(data.error || 'Error al comparar tasas');
                }
            } catch (error) {
                console.error('Error al comparar tasas:', error);
                this.updateUIError();
            }
        }

        calcular() {
            const dolaresInput = document.getElementById('dolares-binance');
            const dolares = parseFloat(dolaresInput?.value || 0);
            
            if (dolares >= 0) {
                // Calcular totales
                const totalBinance = this.tasaBinance > 0 ? dolares * this.tasaBinance : 0;
                const totalBCV = this.tasaBCV > 0 ? dolares * this.tasaBCV : 0;
                
                // Actualizar totales
                document.getElementById('total-binance').textContent = this.formatNumber(totalBinance);
                document.getElementById('total-bcv').textContent = this.formatNumber(totalBCV);
                
                // Calcular diferencia
                const diferencia = totalBinance - totalBCV;
                const porcentajeDiferencia = this.tasaBCV > 0 ? (diferencia / totalBCV) * 100 : 0;
                
                // Actualizar diferencia
                document.getElementById('diferencia-absoluta').textContent = this.formatNumber(Math.abs(diferencia));
                document.getElementById('diferencia-porcentaje').textContent = this.formatNumber(Math.abs(porcentajeDiferencia));
                
                // Actualizar badge en el dropdown toggle
                const badge = document.getElementById('diferencia-display');
                if (badge) {
                    const porcentajeTasa = this.tasaBCV > 0 ? ((this.tasaBinance - this.tasaBCV) / this.tasaBCV) * 100 : 0;
                    badge.textContent = (porcentajeTasa >= 0 ? '+' : '') + this.formatNumber(porcentajeTasa) + '%';
                    badge.className = `badge ml-1 ${porcentajeTasa >= 0 ? 'badge-success' : 'badge-danger'}`;
                }
            } else {
                document.getElementById('total-binance').textContent = '0.00';
                document.getElementById('total-bcv').textContent = '0.00';
                document.getElementById('diferencia-absoluta').textContent = '0.00';
                document.getElementById('diferencia-porcentaje').textContent = '0.00';
            }
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

            const tasaBCV = document.getElementById('tasa-bcv-comp');
            if (tasaBCV) {
                tasaBCV.textContent = this.formatNumber(this.tasaBCV);
            }

            // Actualizar fechas
            const lastUpdateBinanceElement = document.getElementById('last-update-binance');
            if (lastUpdateBinanceElement) {
                lastUpdateBinanceElement.textContent = this.lastUpdateBinance || '-';
            }

            const lastUpdateBCVElement = document.getElementById('last-update-bcv');
            if (lastUpdateBCVElement) {
                lastUpdateBCVElement.textContent = this.lastUpdateBCV || '-';
            }

            // Restaurar botones
            this.restoreButtons();
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

            // Restaurar botones
            this.restoreButtons();
        }

        restoreButtons() {
            const refreshBinanceButton = document.getElementById('refresh-binance');
            if (refreshBinanceButton) {
                refreshBinanceButton.innerHTML = '<i class="fab fa-bitcoin"></i> Actualizar Binance';
            }

            const refreshComparisonButton = document.getElementById('refresh-comparison');
            if (refreshComparisonButton) {
                refreshComparisonButton.innerHTML = '<i class="fas fa-sync-alt"></i> Comparar';
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