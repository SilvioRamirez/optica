@php
    $tasaGlobal = App\Models\Tasa::getLastTasa();
@endphp

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-dollar-sign"></i> <span id="tasa-bcv-display">Cargando...</span> Bs
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3" style="min-width: 280px;">
        <h6 class="dropdown-header">Calculadora BCV (Bidireccional)</h6>

        <div class="form-group mb-2">
            <label for="dolares-bcv" class="small mb-1"><strong>Dólares (USD)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" id="dolares-bcv" class="form-control"
                    placeholder="0.00" step="0.01" min="0" value="1">
            </div>
        </div>

        <div class="form-group mb-2">
            <label for="bolivares-bcv" class="small mb-1"><strong>Bolívares (Bs)</strong></label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Bs</span>
                </div>
                <input type="number" id="bolivares-bcv" class="form-control"
                    placeholder="0.00" step="0.01" min="0">
            </div>
        </div>

        <hr class="my-2">

        <p class="mb-1 text-center">
            <strong>Tasa BCV:</strong> <span id="tasa-bcv" class="text-primary">Cargando...</span> Bs
        </p>

        <small class="text-muted d-block text-center">
            Actualizado: <span id="last-update">-</span>
        </small>
    </div>
</li>

<script>
    class CalculadoraDolar {
        constructor() {
            this.tasaCambio = 0;
            this.lastUpdate = null;
            this.calculando = false; // Bandera para evitar bucles
            this.init();
        }

        init() {
            this.obtenerTasa();
            this.setupEventListeners();
        }

        setupEventListeners() {
            // Evento para calcular Bs cuando cambian los dólares
            const dolaresInput = document.getElementById('dolares-bcv');
            if (dolaresInput) {
                dolaresInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.calcularBolivares();
                    }
                });
            }

            // Evento para calcular dólares cuando cambian los bolívares
            const bolivaresInput = document.getElementById('bolivares-bcv');
            if (bolivaresInput) {
                bolivaresInput.addEventListener('input', () => {
                    if (!this.calculando) {
                        this.calcularDolares();
                    }
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
                    this.calcularBolivares(); // Calcular inicial
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

        calcularBolivares() {
            this.calculando = true;
            const dolaresInput = document.getElementById('dolares-bcv');
            const bolivaresInput = document.getElementById('bolivares-bcv');
            const dolares = parseFloat(dolaresInput?.value || 0);
            
            if (this.tasaCambio > 0 && dolares >= 0) {
                const resultado = dolares * this.tasaCambio;
                bolivaresInput.value = resultado.toFixed(2);
            } else {
                bolivaresInput.value = '0.00';
            }
            this.calculando = false;
        }

        calcularDolares() {
            this.calculando = true;
            const dolaresInput = document.getElementById('dolares-bcv');
            const bolivaresInput = document.getElementById('bolivares-bcv');
            const bolivares = parseFloat(bolivaresInput?.value || 0);
            
            if (this.tasaCambio > 0 && bolivares >= 0) {
                const resultado = bolivares / this.tasaCambio;
                dolaresInput.value = resultado.toFixed(2);
            } else {
                dolaresInput.value = '0.00';
            }
            this.calculando = false;
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
