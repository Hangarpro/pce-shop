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
        Schema::create('carrito', function (Blueprint $table) {
            $table->id();
            $table->string('tarjeta')->nullable();
            $table->tinyInteger('compra_estado');
            $table->enum('envio_tipo', ['Regular', 'Premium'])->nullable();
            $table->enum('envio_estado', ['Pendiente', 'Pagado', 'En tránsito', 'Entregado'])->nullable();
            $table->string('envio_numero')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->decimal('total', 19, 2)->nullable();

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')
            ->references('id')
            ->on('usuarios')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('direccion_id');
            $table->foreign('direccion_id')
            ->references('id')
            ->on('direcciones')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
