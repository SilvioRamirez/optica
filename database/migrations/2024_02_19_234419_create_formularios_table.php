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
            $table->string('numero_orden');
            $table->string('fecha');
            $table->string('paciente');
            $table->string('direccion_operativo');
            $table->string('telefono');
            $table->string('cedula');
            $table->string('edad');
            $table->string('tipo');
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
            $table->string('total');
            $table->string('abono');
            $table->string('saldo');
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
