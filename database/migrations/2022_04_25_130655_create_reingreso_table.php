<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');

            $table->unsignedInteger('asignacion_herramienta_id');
            $table->foreign('asignacion_herramienta_id')->references('id')->on('asignacion_herramienta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reingreso');
    }
}
