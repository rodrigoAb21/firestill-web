<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->float('costo');
            $table->unsignedInteger('cantidad');
            $table->softDeletes();

            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('producto');

            $table->unsignedInteger('ingreso_producto_id');
            $table->foreign('ingreso_producto_id')->references('id')->on('ingreso_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingreso_producto');
    }
}
