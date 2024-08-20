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
        Schema::table('formularios', function (Blueprint $table) {
            $table->string('tipo_formula')->nullable()->after('alt');
            $table->string('fecha_proxima_cita')->nullable()->after('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            //
        });
    }
};
