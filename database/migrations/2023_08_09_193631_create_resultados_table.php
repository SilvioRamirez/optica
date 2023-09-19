<?php

use App\Models\Caracteristicas;
use App\Models\Paciente;
use App\Models\Bioanalista;
use App\Models\Examen;
use App\Models\Muestra;
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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Paciente::class);
            $table->foreignIdFor(Bioanalista::class);
            $table->foreignIdFor(Examen::class);
            $table->foreignIdFor(Muestra::class);
            $table->boolean('status_cola')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
