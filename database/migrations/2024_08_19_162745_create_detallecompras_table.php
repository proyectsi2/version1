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
        Schema::create('detallecompra', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->unsignedBigInteger('compra_id')->nullable()->index();
            $table->unsignedBigInteger('products_id')->nullable()->index();
            $table->integer('cantidad')->nullable();
            $table->timestamps();

            // Agregar llaves foráneas
            $table->foreign('compra_id')->references('id')->on('compra')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallecompra');
    }
};
