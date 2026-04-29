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
        Schema::create('orden_residuo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('orden_servicio')->cascadeOnDelete();
            $table->foreignId('residuo_id')->constrained('residuos')->cascadeOnDelete();
            $table->decimal('cantidad', 10, 2);
            $table->string('unidad_medida');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_residuo');
    }
};
