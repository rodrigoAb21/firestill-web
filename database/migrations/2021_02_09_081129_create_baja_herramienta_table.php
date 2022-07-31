<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajaHerramientaTable extends Migration
{

    /**
     *************************************************************************
     * Clase.........: CreateBajaHerramientaTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "baja_herramienta" en la BD.
     * Fecha.........: 06-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('motivo');
            $table->unsignedInteger('cantidad');
            $table->softDeletes();

            $table->unsignedInteger('herramienta_id');
            $table->foreign('herramienta_id')->references('id')
                ->on('herramienta')->onDelete('cascade');

            $table->unsignedInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')
                ->on('trabajador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baja_herramienta');
    }
}
