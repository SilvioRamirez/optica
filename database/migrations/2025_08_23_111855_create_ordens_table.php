<?php

use App\Models\Cliente;
use App\Models\TipoLente;
use App\Models\TipoTratamiento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cliente::class);
            $table->string('numero_orden');
            $table->date('fecha_recibida')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->string('status');
            $table->string('cedula');
            $table->string('paciente');
            $table->string('edad');
            $table->string('genero');
            $table->foreignIdFor(TipoLente::class);
            $table->foreignIdFor(TipoTratamiento::class);
            $table->string('od_esf');
            $table->string('od_cil');
            $table->string('od_eje');
            $table->string('oi_esf');
            $table->string('oi_cil');
            $table->string('oi_eje');
            $table->string('add');
            $table->string('dp');
            $table->string('alt');
            $table->string('observaciones_extras');
            $table->enum('tipo_formula', ['TERMINADA', 'TALLADA']);
            $table->float('precio_cristal', 8, 2)->nullable();
            $table->float('precio_montaje', 8, 2)->nullable();
            $table->float('precio_total', 8, 2)->nullable();
            $table->float('precio_descuento', 8, 2)->nullable();
            $table->float('precio_saldo', 8, 2)->nullable();
            $table->float('precio_porcentaje_pago', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
