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
        Schema::table('refractantes', function (Blueprint $table) {
            $table->boolean('whatsapp_send')->default(false)->after('telefono');
            $table->date('fecha_nacimiento')->nullable()->after('telefono');
            $table->string('genero')->nullable()->after('fecha_nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refractantes', function (Blueprint $table) {
            $table->dropColumn('whatsapp_send');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('genero');
        });
    }
};
