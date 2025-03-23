<?php

use App\Models\Formulario;
use App\Models\Tipo;
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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Formulario::class)->nullable();
            $table->decimal('monto', 8, 2)->nullable();
            $table->date('pago_fecha')->nullable();
            $table->foreignIdFor(Tipo::class)->nullable();
            $table->string('referencia')->nullable();
            $table->string('image_path')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
