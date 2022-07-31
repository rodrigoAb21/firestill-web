<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAsignacionTable extends Migration
{

    /**
     *************************************************************************
     * Clase.........: CreateCategoriaTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "categoria" en la BD.
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
        Schema::create('detalle_asignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cantidad');
            $table->softDeletes();

            $table->unsignedInteger('asignacion_herramienta_id');
            $table->foreign('asignacion_herramienta_id')->references('id')->on('asignacion_herramienta');

            $table->unsignedInteger('herramienta_id');
            $table->foreign('herramienta_id')->references('id')->on('herramienta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_asignacion');
    }
}
