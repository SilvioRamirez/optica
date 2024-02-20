<?php

use App\Models\Cuota;
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
        Schema::create('cuota_pago', function (Blueprint $table) {
            $table->foreignIdFor(Cuota::class);
            $table->foreignIdFor(Pago::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
