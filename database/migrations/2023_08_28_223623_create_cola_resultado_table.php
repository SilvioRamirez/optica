<?php

use App\Models\Cola;
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
        Schema::create('cola_resultado', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resultados::class);
            $table->foreignIdFor(Cola::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cola_resultado');
    }
};
