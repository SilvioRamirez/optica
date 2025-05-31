<?php
require_once 'bootstrap/app.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== FORMULARIOS CON TOTAL MÁS ALTO ===\n";

$formularios = App\Models\Formulario::whereNotNull('total')
    ->orderByDesc('total')
    ->limit(20)
    ->get(['id', 'numero_orden', 'paciente', 'total', 'created_at']);

foreach($formularios as $f) {
    echo sprintf("Orden: %s - Total: %s - Fecha: %s - Paciente: %s\n", 
        $f->numero_orden, 
        $f->total, 
        $f->created_at->format('Y-m-d'), 
        $f->paciente
    );
}

echo "\n=== VERIFICAR FORMULARIO 13076 ===\n";
$f13076 = App\Models\Formulario::where('numero_orden', '13076')->first();
if($f13076) {
    echo sprintf("Orden 13076 - Total: %s - Fecha: %s\n", $f13076->total, $f13076->created_at->format('Y-m-d'));
} else {
    echo "Formulario 13076 no encontrado\n";
}

echo "\n=== FORMULARIOS DEL MES ACTUAL ===\n";
$mesActual = now();
$formulariosDelMes = App\Models\Formulario::whereMonth('created_at', $mesActual->month)
    ->whereYear('created_at', $mesActual->year)
    ->whereNotNull('total')
    ->orderByDesc('total')
    ->limit(10)
    ->get(['id', 'numero_orden', 'paciente', 'total', 'created_at']);

foreach($formulariosDelMes as $f) {
    echo sprintf("Orden: %s - Total: %s - Fecha: %s\n", 
        $f->numero_orden, 
        $f->total, 
        $f->created_at->format('Y-m-d')
    );
}
?> 