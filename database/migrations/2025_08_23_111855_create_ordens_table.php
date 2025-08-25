<?php

use App\Models\Cliente;
use App\Models\TipoLente;
use App\Models\TipoTratamiento;
use App\Models\OrdenStatus;
use App\Models\OrdenPaymentOrigin;
use App\Models\OrdenPaymentType;
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
            $table->foreignIdFor(OrdenStatus::class);
            $table->string('cedula');
            $table->string('paciente');
            $table->string('edad');
            $table->string('genero');
            $table->foreignIdFor(TipoLente::class);
            $table->foreignIdFor(TipoTratamiento::class);
            $table->string('od_esf')->nullable();
            $table->string('od_cil')->nullable();
            $table->string('od_eje')->nullable();
            $table->string('oi_esf')->nullable();
            $table->string('oi_cil')->nullable();
            $table->string('oi_eje')->nullable();
            $table->string('add')->nullable();
            $table->string('dp')->nullable();
            $table->string('alt')->nullable();
            $table->string('observaciones_extras')->nullable();
            $table->enum('tipo_formula', ['TERMINADA', 'TALLADA']);
            $table->float('precio_cristal', 8, 2)->nullable()->default(0);
            $table->float('precio_montaje', 8, 2)->nullable()->default(0);
            $table->float('precio_total', 8, 2)->nullable()->default(0);
            $table->float('precio_descuento', 8, 2)->nullable()->default(0);
            $table->float('precio_saldo', 8, 2)->nullable()->default(0);
            $table->float('precio_porcentaje_pago', 8, 2)->nullable()->default(0);
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
