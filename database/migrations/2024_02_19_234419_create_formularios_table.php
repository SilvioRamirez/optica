<?php

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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('numero_orden')->nullable();
            $table->string('estatus')->nullable();
            $table->string('fecha')->nullable();
            $table->string('paciente')->nullable();
            $table->string('direccion_operativo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cedula')->nullable();
            $table->string('edad')->nullable();
            $table->string('tipo')->nullable();
            $table->string('observaciones_extras')->nullable();
            $table->string('od_esf')->nullable();
            $table->string('od_cil')->nullable();
            $table->string('od_eje')->nullable();
            $table->string('oi_esf')->nullable();
            $table->string('oi_cil')->nullable();
            $table->string('oi_eje')->nullable();
            $table->string('add')->nullable();
            $table->string('dp')->nullable();
            $table->string('alt')->nullable();
            $table->string('especialista')->nullable();
            $table->string('total')->nullable();
            $table->string('saldo')->nullable();
            $table->string('abono_1')->nullable();
            $table->string('abono_fecha_1')->nullable();
            $table->string('abono_2')->nullable();
            $table->string('abono_fecha_2')->nullable();
            $table->string('abono_3')->nullable();
            $table->string('abono_fecha_3')->nullable();
            $table->string('abono_4')->nullable();
            $table->string('abono_fecha_4')->nullable();
            $table->string('abono_5')->nullable();
            $table->string('abono_fecha_5')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
