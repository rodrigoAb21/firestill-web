<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionHerramientaTable extends Migration
{

    /**
     *************************************************************************
     * Clase.........: CreateAsignacionHerramientaTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "asignacion_herramienta" en la BD.
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
        Schema::create('asignacion_herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('estado');
            $table->softDeletes();

            $table->unsignedInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_herramienta');
    }
}
