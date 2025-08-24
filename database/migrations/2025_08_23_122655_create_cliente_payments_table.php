<?php

use App\Models\Cliente;
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
        Schema::create('cliente_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cliente::class);
            $table->decimal('saldo', 8, 2)->nullable();
            $table->decimal('saldo_bs', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('tasa_cambio', 8, 2)->nullable();
            $table->date('fecha')->nullable();
            $table->string('banco_emisor')->nullable();
            $table->string('referencia')->nullable();
            $table->decimal('monto', 8, 2)->nullable();
            $table->decimal('monto_usd', 8, 2)->nullable();
            $table->string('fecha_pago')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_payments');
    }
};
