<?php

use App\Models\Caracteristicas;
use App\Models\Paciente;
use App\Models\Bioanalista;

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
            $table->foreignIdFor(Caracteristicas::class);
            $table->foreignIdFor(Paciente::class);
            $table->foreignIdFor(Bioanalista::class);
            $table->string('resultado');
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
