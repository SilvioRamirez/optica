<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Formulario;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('condicion_opticas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Formulario::class);
            $table->string('eval_esf_od')->nullable();   // AQ
            $table->string('eval_esf_oi')->nullable();   // AR
            $table->string('eval_esf')->nullable();      // AS
            $table->string('eval_cil_od')->nullable();   // AT
            $table->string('eval_cil_oi')->nullable();   // AU
            $table->string('eval_cil')->nullable();      // AV
            $table->string('cond_od')->nullable();       // AW
            $table->string('cond_oi')->nullable();       // AX
            $table->string('eval_oj')->nullable();       // AY
            $table->string('presbicia')->nullable();     // AZ
            $table->string('miopia_magna')->nullable();  // BA
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicion_opticas');
    }
};
