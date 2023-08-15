<?php

use App\Models\Resultados;
use App\Models\ResultadosDetalle;
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
        Schema::create('resultados_resultados_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resultados::class);
            $table->foreignIdFor(ResultadosDetalle::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_resultados_detalle');
    }
};