<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientaTable extends Migration
{

    /**
     *************************************************************************
     * Clase.........: CreateHerramientaTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "herramienta" en la BD.
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
        Schema::create('herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->unsignedInteger('cantidad_taller');
            $table->unsignedInteger('cantidad_asignada');
            $table->unsignedInteger('cantidad_total');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herramienta');
    }
}
