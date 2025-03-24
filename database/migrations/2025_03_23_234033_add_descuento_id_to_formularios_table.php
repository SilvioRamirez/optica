<?php

use App\Models\Descuento;
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
            $table->foreignIdFor(Descuento::class)->nullable()->after('total');
            $table->decimal('total_descuento', 8, 2)->nullable()->after('descuento_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropForeign(['descuento_id']);
            $table->dropColumn('descuento_id');
            $table->dropColumn('total_descuento');
        });
    }
};
