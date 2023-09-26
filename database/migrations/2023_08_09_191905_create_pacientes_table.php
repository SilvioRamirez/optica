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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('edad')->nullable();
            $table->string('sexo');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->text('direccion')->nullable();
            $table->text('id_estado')->nullable();
            $table->text('id_municipio')->nullable();
            $table->text('id_parroquia')->nullable();
            $table->text('sector')->nullable();
            $table->text('lugar_registro')->nullable();
            $table->text('observacion')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
