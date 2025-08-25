<?php

use App\Models\Orden;
use App\Models\OrdenPaymentOrigin;
use App\Models\OrdenPaymentType;
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
        Schema::create('orden_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orden::class);
            $table->foreignIdFor(OrdenPaymentOrigin::class);
            $table->foreignIdFor(OrdenPaymentType::class);
            $table->decimal('monto', 8, 2)->nullable();
            $table->string('pago_fecha')->nullable();
            $table->string('referencia')->nullable();
            $table->string('image_path')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_payments');
    }
};
