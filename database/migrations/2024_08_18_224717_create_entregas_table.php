<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega', function (Blueprint $table) {
            $table->id();
            $table->integer('id_order')->nullable()->index('id_order');
            $table->string('direccion_entrega')->nullable();
            $table->enum('estado_entrega', ['pendiente', 'en camino', 'entregado'])->nullable()->default('pendiente');
            $table->string('numero_seguimiento', 50)->nullable();
            $table->string('nombre_mensajeria', 100)->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->timestamp('entregado_en')->useCurrentOnUpdate()->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega');
    }
};
