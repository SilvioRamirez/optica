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
            $table->string('created_by')->nullable()->after('created_at');
            $table->string('updated_by')->nullable()->after('updated_at');
        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->string('created_by')->nullable()->after('created_at');
            $table->string('updated_by')->nullable()->after('updated_at');
        });

        Schema::table('refractantes', function (Blueprint $table) {
            $table->string('created_by')->nullable()->after('created_at');
            $table->string('updated_by')->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by']);
        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by']);
        });

        Schema::table('refractantes', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by']);
        });
    }
}; 