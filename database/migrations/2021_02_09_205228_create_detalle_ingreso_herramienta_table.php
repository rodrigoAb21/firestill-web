<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoHerramientaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso_herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cantidad');
            $table->float('costo');
            $table->softDeletes();
            $table->unsignedInteger('herramienta_id');
            $table->foreign('herramienta_id')->references('id')
                ->on('herramienta')->onDelete('cascade');
            $table->unsignedInteger('ingreso_herramienta_id');
            $table->foreign('ingreso_herramienta_id')->references('id')
                ->on('ingreso_herramienta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ingreso_herramienta');
    }
}
