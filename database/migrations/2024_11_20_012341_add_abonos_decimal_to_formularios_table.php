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
            $table->decimal('abono_1_decimal', total: 8, places: 2)->nullable()->after('ref_pago_5');
            $table->decimal('abono_2_decimal', total: 8, places: 2)->nullable()->after('abono_1_decimal');
            $table->decimal('abono_3_decimal', total: 8, places: 2)->nullable()->after('abono_2_decimal');
            $table->decimal('abono_4_decimal', total: 8, places: 2)->nullable()->after('abono_3_decimal');
            $table->decimal('abono_5_decimal', total: 8, places: 2)->nullable()->after('abono_4_decimal');
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
