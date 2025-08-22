@php
    $tasaGlobal = App\Models\Tasa::getLastTasa();
@endphp

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-dollar-sign"></i> Tasa BCV <span id="tasa-bcv-display">Cargando...</span> Bs
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3" style="min-width: 250px;">
        <h6 class="dropdown-header">Calculadora $ → Bs</h6>

        <div class="form-group mb-2">
            <input type="number" id="dolares" class="form-control form-control-sm"
                placeholder="Monto en USD" step="0.01" min="0" value="1">
        </div>

        <p class="mb-1">
            <strong>Tasa BCV:</strong> <span id="tasa-bcv">Cargando...</span> Bs
        </p>

        <p class="mb-1">
            <strong>Total:</strong> <span id="total_calculadora">0.00</span> Bs
        </p>

        <small class="text-muted">
            Última actualización: <span id="last-update">-</span>
        </small>
        
        <div class="mt-2">
            <button id="refresh-rate" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-sync-alt"></i> Actualizar tasa
            </button>
        </div>
    </div>
</li>

<script>
    class CalculadoraDolar {
        constructor() {
            this.tasaCambio = 0;
            this.lastUpdate = null;
            this.init();
        }

        init() {
            this.obtenerTasa();
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Evento para calcular cuando se cambia el monto
            const dolaresInput = document.getElementById('dolares');
            if (dolaresInput) {
                dolaresInput.addEventListener('input', () => this.calcular());
                dolaresInput.addEventListener('keyup', () => this.calcular());
            }

            // Evento para refrescar la tasa
            const refreshButton = document.getElementById('refresh-rate');
            if (refreshButton) {
                refreshButton.addEventListener('click', () => {
                    refreshButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Actualizando...';
                    this.obtenerTasa();
                });
            }
        }

        async obtenerTasa() {
            try {
                const response = await fetch('{{ route('tasa.last') }}');
                
                if (!response.ok) {
                    throw new Error('Error en la respuesta de la API');
                }
                
                const data = await response.json();

                if (data) {
                    this.tasaCambio = parseFloat(data.valor);
                    this.lastUpdate = data.fecha;
                    
                    this.updateUI();
                    this.calcular();
                } else {
                    throw new Error('Datos inválidos de la API');
                }
            } catch (error) {
                console.error('Error al obtener la tasa:', error);
                this.tasaCambio = 0;
                this.lastUpdate = 'Error al consultar';
                this.updateUIError();
            }
        }

        calcular() {
            const dolaresInput = document.getElementById('dolares');
            const dolares = parseFloat(dolaresInput?.value || 0);
            
            if (this.tasaCambio > 0 && dolares >= 0) {
                const resultado = dolares * this.tasaCambio;
                document.getElementById('total_calculadora').textContent = this.formatNumber(resultado);
            } else {
                document.getElementById('total_calculadora').textContent = '0.00';
            }
        }

        updateUI() {
            // Actualizar tasa en el dropdown toggle
            const tasaDisplay = document.getElementById('tasa-bcv-display');
            if (tasaDisplay) {
                tasaDisplay.textContent = this.formatNumber(this.tasaCambio);
            }

            // Actualizar tasa en el contenido del dropdown
            const tasaBcv = document.getElementById('tasa-bcv');
            if (tasaBcv) {
                tasaBcv.textContent = this.formatNumber(this.tasaCambio);
            }

            // Actualizar fecha
            const lastUpdateElement = document.getElementById('last-update');
            if (lastUpdateElement) {
                lastUpdateElement.textContent = this.lastUpdate;
            }

            // Restaurar botón de refresh
            const refreshButton = document.getElementById('refresh-rate');
            if (refreshButton) {
                refreshButton.innerHTML = '<i class="fas fa-sync-alt"></i> Actualizar tasa';
            }
        }

        updateUIError() {
            // Mostrar error en la UI
            const tasaDisplay = document.getElementById('tasa-bcv-display');
            if (tasaDisplay) {
                tasaDisplay.textContent = 'Error';
            }

            const tasaBcv = document.getElementById('tasa-bcv');
            if (tasaBcv) {
                tasaBcv.textContent = 'Error al cargar';
            }

            const lastUpdateElement = document.getElementById('last-update');
            if (lastUpdateElement) {
                lastUpdateElement.textContent = this.lastUpdate;
            }

            // Restaurar botón de refresh
            const refreshButton = document.getElementById('refresh-rate');
            if (refreshButton) {
                refreshButton.innerHTML = '<i class="fas fa-sync-alt"></i> Actualizar tasa';
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
        new CalculadoraDolar();
    });
</script>