<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Operativo;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->foreignIdFor(Operativo::class)->nullable()->after('direccion_operativo');
            $table->dropColumn('direccion_operativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropForeign(['operativo_id']);
            $table->dropColumn('operativo_id');
            $table->string('direccion_operativo')->nullable();
        });
    }
};
