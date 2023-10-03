<?php

use App\Models\Lente;
use App\Models\Paciente;
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
        Schema::create('lente_paciente', function (Blueprint $table) {
            $table->foreignIdFor(Lente::class);
            $table->foreignIdFor(Paciente::class);
                                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lente_paciente');
    }
};
