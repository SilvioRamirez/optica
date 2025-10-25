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
        Schema::table('tasas', function (Blueprint $table) {
            $table->string('fuente')->nullable()->after('fecha');
            $table->dropUnique('tasas_fecha_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasas', function (Blueprint $table) {
            $table->dropColumn('fuente');
            $table->unique('tasas_fecha_unique');
        });
    }
};
