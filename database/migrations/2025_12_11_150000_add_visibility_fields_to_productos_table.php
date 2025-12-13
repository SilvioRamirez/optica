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
        Schema::table('productos', function (Blueprint $table) {
            $table->boolean('mostrar_externo')->default(false)->after('exento_iva')
                  ->comment('Mostrar en catálogo público (e-commerce)');
            $table->boolean('mostrar_interno')->default(true)->after('mostrar_externo')
                  ->comment('Mostrar en listado de precios interno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['mostrar_externo', 'mostrar_interno']);
        });
    }
};
