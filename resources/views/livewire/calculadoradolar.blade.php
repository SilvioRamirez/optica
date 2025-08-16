<?php

use Illuminate\Support\Facades\Http;
use Livewire\Volt\Component;

new class extends Component {

    public $dolares = 1;
    public $tasaCambio = 0;
    public $resultado = 0;
    public $lastUpdate = null;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->obtenerTasa();
        /* $this->calcular(); */
    }

    /* public function updatedDolares()
    {
        $this->calcular();
    } */

    public function obtenerTasa()
    {
        try {
            $response = Http::get('https://pydolarve.org/api/v1/dollar?page=bcv');
            $data = $response->json();

            if ($data && isset($data['monitors']['usd']['price'])) {
                $this->tasaCambio = $data['monitors']['usd']['price'];
                $this->lastUpdate = $data['monitors']['usd']['last_update'];
            }
        } catch (\Exception $e) {
            $this->tasaCambio = 0;
            $this->lastUpdate = 'Error al consultar';
        }
    }

    /* public function calcular()
    {
        $this->resultado = floatval($this->dolares) * floatval($this->tasaCambio);
    } */

}

?>

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-dollar-sign"></i> Tasa BCV {{ $tasaCambio }} Bs
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3" style="min-width: 250px;">
        <h6 class="dropdown-header">Calculadora $ → Bs</h6>

        <div class="form-group mb-2">
            <input type="number" id="dolares" class="form-control form-control-sm"
                placeholder="Monto en USD" step="0.01" min="0">
        </div>

        <p class="mb-1">
            <strong>Tasa BCV:</strong> <span id="tasa-bcv">{{ $tasaCambio }}</span> Bs
            <input type="hidden" id="tasa-bcv-hidden" value="{{ $tasaCambio }}">
        </p>

        <p class="mb-1">
            <strong>Total:</strong> <span id="total">{{ $resultado }}</span> Bs
            <input type="hidden" id="total-hidden" value="{{ $resultado }}">
        </p>

        <small class="text-muted">
            Última actualización: {{ $lastUpdate }}
        </small>
    </div>
</li>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('dolares').addEventListener('keyup', function() {
            const dolares = document.getElementById('dolares').value;
            const tasaBcv = document.getElementById('tasa-bcv-hidden').value;
            const total = document.getElementById('total-hidden').value;
            const calculo = dolares * tasaBcv;

            const totalCalculado = document.getElementById('total');
            totalCalculado.innerHTML = parseFloat(calculo).toFixed(2);
        });
    });
</script>