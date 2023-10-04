<?php

use App\Models\Formula;
use App\Models\Paciente;
use App\Models\Pago;
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
        Schema::create('lentes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Paciente::class);
            $table->foreignIdFor(Pago::class)->nullable();
            $table->string('adicion')->nullable();
            $table->string('distancia_pupilar')->nullable();
            $table->string('alt')->nullable();
            $table->string('tipo_lente')->nullable();
            $table->string('tratamiento')->nullable();
            $table->string('terminado')->nullable();
            $table->string('tallado')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lentes');
    }
};
