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
        Schema::create('tasas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 12, 6);   // valor de la tasa (ej: 139.401600)
            $table->date('fecha');             // fecha oficial del BCV
            $table->timestamps();

            $table->unique('fecha'); // evitar duplicados por fecha
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasas');
    }
};
