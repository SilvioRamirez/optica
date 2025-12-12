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
        Schema::create('pedidos_catalogo', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pedido')->unique();
            $table->string('nombre_cliente');
            $table->string('cedula', 20);
            $table->string('telefono', 20);
            $table->string('email')->nullable();
            $table->text('notas')->nullable();
            $table->decimal('total_usd', 12, 2)->default(0);
            $table->decimal('total_bs', 12, 2)->default(0);
            $table->decimal('tasa_cambio', 12, 4)->default(0);
            $table->enum('status', ['pendiente', 'contactado', 'completado', 'cancelado'])->default('pendiente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_catalogo');
    }
};


