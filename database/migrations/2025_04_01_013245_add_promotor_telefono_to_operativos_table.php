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
        Schema::table('operativos', function (Blueprint $table) {
            $table->string('promotor_nombre')->nullable();
            $table->string('promotor_telefono')->nullable();
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operativos', function (Blueprint $table) {
            $table->dropColumn('promotor_nombre');
            $table->dropColumn('promotor_telefono');
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
        });
    }
};
