<?php

use App\Models\Formula;
use App\Models\Lente;
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
        Schema::create('formula_lente', function (Blueprint $table) {
            $table->foreignIdFor(Formula::class);
            $table->foreignIdFor(Lente::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formula_lente');
    }
};
