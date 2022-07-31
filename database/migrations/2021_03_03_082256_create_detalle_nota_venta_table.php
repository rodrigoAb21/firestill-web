<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleNotaVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_nota_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('precio');
            $table->softDeletes();

            $table->unsignedInteger('nota_venta_id');
            $table->foreign('nota_venta_id')->references('id')->on('nota_venta');

            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
