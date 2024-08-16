<?php

use App\Models\GastoOperativo;
use App\Models\TipoGasto;
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
        Schema::create('gasto_operativo_tipo_gasto', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GastoOperativo::class);
            $table->foreignIdFor(TipoGasto::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasto_operativo_tipo_gasto');
    }
};
