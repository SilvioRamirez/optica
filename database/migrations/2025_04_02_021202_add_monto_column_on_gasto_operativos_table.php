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
        Schema::table('gasto_operativos', function (Blueprint $table) {
            $table->decimal('monto', 10, 2)->after('operativo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gasto_operativos', function (Blueprint $table) {
            $table->dropColumn('monto');
        });
    }
};
