<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Formulario;
use App\Models\Laboratorio;
use App\Models\Orden;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulario_laboratorios', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Formulario::class)->nullable();
            $table->foreignIdFor(Orden::class)->nullable();
            $table->foreignIdFor(Laboratorio::class);
            $table->date('fecha_envio');
            $table->date('fecha_retorno')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_laboratorios');
    }
};
