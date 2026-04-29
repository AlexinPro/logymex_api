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
        Schema::create('orden_servicio', function (Blueprint $table) {
            $table->id();

            $table->string('folio')->unique();
            $table->date('fecha');

            $table->string('tipo_servicio');

            $table->enum('estado', [
                'pendiente',
                'completado',
                'cancelado'
            ])->default('pendiente');

            $table->foreignId('ejecutivo_id')->constrained('ejecutivos')->cascadeOnDelete();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();
            $table->foreignId('unidad_id')->constrained('unidades')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_servicio');
    }
};
