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
        Schema::create('bioanalistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->text('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('documento');
            $table->string('colegio');
            $table->string('fecha_ingreso');
            $table->text('expediente')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bioanalistas');
    }
};
