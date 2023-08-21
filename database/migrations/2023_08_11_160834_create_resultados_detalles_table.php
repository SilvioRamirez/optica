<?php

use App\Models\Caracteristicas;
use App\Models\Resultados;

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
        Schema::create('resultados_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resultados::class);
            $table->foreignIdFor(Caracteristicas::class);
            $table->text('resultado')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_detalles');
    }
};
