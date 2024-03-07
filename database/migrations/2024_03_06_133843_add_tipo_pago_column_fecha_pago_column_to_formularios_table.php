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
            $table->string('tipo_pago_1')->nullable()->after('abono_fecha_1');
            $table->string('ref_pago_1')->nullable()->after('tipo_pago_1');

            $table->string('tipo_pago_2')->nullable()->after('abono_fecha_2');
            $table->string('ref_pago_2')->nullable()->after('tipo_pago_2');

            $table->string('tipo_pago_3')->nullable()->after('abono_fecha_3');
            $table->string('ref_pago_3')->nullable()->after('tipo_pago_3');

            $table->string('tipo_pago_4')->nullable()->after('abono_fecha_4');
            $table->string('ref_pago_4')->nullable()->after('tipo_pago_4');

            $table->string('tipo_pago_5')->nullable()->after('abono_fecha_5');
            $table->string('ref_pago_5')->nullable()->after('tipo_pago_5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn('tipo_pago_1');
            $table->dropColumn('ref_pago_1');

            $table->dropColumn('tipo_pago_2');
            $table->dropColumn('ref_pago_2');

            $table->dropColumn('tipo_pago_3');
            $table->dropColumn('ref_pago_3');

            $table->dropColumn('tipo_pago_4');
            $table->dropColumn('ref_pago_4');

            $table->dropColumn('tipo_pago_5');
            $table->dropColumn('ref_pago_5');
        });
    }
};
