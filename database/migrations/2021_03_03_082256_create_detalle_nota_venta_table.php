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
            $table->float('cantidad');
            $table->float('precio');

            $table->unsignedInteger('nota_venta_id');
            $table->foreign('nota_venta_id')->references('id')
                ->on('nota_venta')->onDelete('cascade');

            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')
                ->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_nota_venta');
    }
}
