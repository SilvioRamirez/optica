<?php

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
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
        Schema::create('operativos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Estado::class);
            $table->foreignIdFor(Municipio::class);
            $table->foreignIdFor(Parroquia::class);
            $table->text('sector')->nullable();
            $table->longText('direccion')->nullable();
            $table->text('lugar')->nullable();
            $table->text('nombre_operativo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operativos');
    }
};
