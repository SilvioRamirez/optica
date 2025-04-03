<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Operativo;
use App\Models\Persona;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asesor_operativo', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Operativo::class);
            $table->foreignIdFor(Persona::class);
            $table->string('rol')->nullable(); // Para especificar el tipo de asesoría
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asesor_operativo');
    }
}; 