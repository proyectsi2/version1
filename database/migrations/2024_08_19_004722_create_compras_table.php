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
        Schema::create('compra', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->unsignedBigInteger('proveedor_id')->nullable()->index('proveedor_id');
            $table->date('fecha_recepcion')->nullable();
            $table->unsignedBigInteger('moneda_id')->nullable()->index('moneda_id');
            $table->decimal('monto', 10)->nullable();
            $table->string('estado', 100)->nullable();
            $table->string('descripcion', 100)->nullable();
            $table->timestamps();

            // Agregar llaves foráneas
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('moneda_id')->references('id')->on('moneda')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
};

