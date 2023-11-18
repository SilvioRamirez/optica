<?php

use App\Models\Formula;
use App\Models\Laboratorio;
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
            $table->foreignIdFor(Laboratorio::class)->nullable();
            $table->string('numero_orden');
            $table->string('adicion')->nullable();
            $table->string('distancia_pupilar')->nullable();
            $table->string('alt')->nullable();
            $table->string('tipo_lente')->nullable();
            $table->string('tratamiento')->nullable();
            $table->string('tallado')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_create_id')->nullable();
            $table->timestamp('user_create_date')->nullable();
            $table->foreignId('user_lb_id')->nullable();
            $table->timestamp('user_lb_date')->nullable();
            $table->foreignId('user_pe_id')->nullable();
            $table->timestamp('user_pe_date')->nullable();
            $table->foreignId('user_ent_id')->nullable();
            $table->timestamp('user_ent_date')->nullable();
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
