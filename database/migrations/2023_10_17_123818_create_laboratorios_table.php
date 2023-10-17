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
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            $table->string('documento_fiscal')->nullable();
            $table->string('razon_social');
            $table->string('representante_organizacion')->nullable();
            $table->string('representante_cargo')->nullable();
            $table->string('direccion_fiscal')->nullable();
            $table->string('telefono_uno')->nullable();
            $table->string('telefono_dos')->nullable();
            $table->string('correo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratorios');
    }
};
