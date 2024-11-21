<?php

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
        Schema::table('formularios', function (Blueprint $table) {
            $table->decimal('abono_1', total: 8, places: 2)->change();
            $table->decimal('abono_2', total: 8, places: 2)->change();
            $table->decimal('abono_3', total: 8, places: 2)->change();
            $table->decimal('abono_4', total: 8, places: 2)->change();
            $table->decimal('abono_5', total: 8, places: 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            //
        });
    }
};
