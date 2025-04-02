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
        Schema::table('refractantes', function (Blueprint $table) {
            $table->foreignIdFor(Operativo::class)->nullable();
            $table->dropColumn('direccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refractantes', function (Blueprint $table) {
            $table->dropForeign(['operativo_id']);
            $table->dropColumn('operativo_id');
            $table->string('direccion')->nullable();
        });
    }
};
