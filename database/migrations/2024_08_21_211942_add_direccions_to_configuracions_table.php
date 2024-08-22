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
        Schema::table('configuracions', function (Blueprint $table) {
            $table->string('direccion_2')->nullable()->after('direccion');
            $table->string('descripcion_1')->nullable()->after('nombre_organizacion');
            $table->string('descripcion_2')->nullable()->after('descripcion_1');
            $table->string('instagram')->nullable()->after('correo');
            $table->string('pagina_web')->nullable()->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configuracions', function (Blueprint $table) {
            //
        });
    }
};
