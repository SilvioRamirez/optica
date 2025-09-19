<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Laboratorio;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->foreignIdFor(Laboratorio::class)->nullable()->after('laboratorio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn('laboratorio_id');
        });
    }
};
