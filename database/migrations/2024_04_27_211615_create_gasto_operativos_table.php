<?php

use App\Models\GastoOperativo;
use App\Models\Operativo;
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
        Schema::create('gasto_operativos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Operativo::class);
            $table->foreignIdFor(TipoGasto::class);
            $table->string('monto');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasto_operativos');
    }
};
