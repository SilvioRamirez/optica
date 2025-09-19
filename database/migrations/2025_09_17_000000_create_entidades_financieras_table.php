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
        Schema::create('entidades_financieras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 4)->unique()->comment('Código del banco');
            $table->string('nombre')->comment('Nombre del banco');
            $table->string('rif', 20)->comment('RIF del banco');
            $table->string('logo')->nullable()->comment('Path del logo del banco');
            $table->boolean('activo')->default(true)->comment('Estado activo del banco');
            $table->timestamps();
            
            $table->index(['codigo']);
            $table->index(['activo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades_financieras');
    }
};
