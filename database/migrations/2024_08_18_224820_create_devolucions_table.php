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
        Schema::create('devolucion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_order')->nullable()->index('id_order');
            $table->string('motivo')->nullable();
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->nullable()->default('pendiente');
            $table->date('fecha_solicitud')->nullable();
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
        Schema::dropIfExists('devolucion');
    }
};
