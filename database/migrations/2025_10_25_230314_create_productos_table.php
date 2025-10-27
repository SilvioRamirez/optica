<?php

use App\Models\Categoria;
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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('precio');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('barcode')->default(0)->nullable();
            $table->string('qrcode')->nullable();
            $table->string('stock')->default(0)->nullable();
            $table->foreignIdFor(Categoria::class)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
