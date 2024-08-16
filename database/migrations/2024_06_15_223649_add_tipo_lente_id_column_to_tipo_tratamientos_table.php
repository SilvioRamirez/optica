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
        Schema::table('tipo_tratamientos', function (Blueprint $table) {
            $table->string('tipo_lente_id')->nullable()->after('cantidad_stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tipo_tratamientos', function (Blueprint $table) {
            //
        });
    }
};
