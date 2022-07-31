<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleReingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cantidad');
            $table->string('motivo')->nullable();

            $table->unsignedInteger('herramienta_id');
            $table->foreign('herramienta_id')->references('id')->on('herramienta');

            $table->unsignedInteger('reingreso_id');
            $table->foreign('reingreso_id')->references('id')->on('reingreso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_reingreso');
    }
}
