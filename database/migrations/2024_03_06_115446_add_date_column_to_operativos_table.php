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
            $table->string('fecha')->nullable()->after('nombre_operativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operativos', function (Blueprint $table) {
            $table->dropColumn('fecha');
        });
    }
};
