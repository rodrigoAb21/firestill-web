<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     *************************************************************************
     * Clase.........: CreateClienteTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "cliente" en la BD.
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
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_empresa');
            $table->string('nit')->nullable();
            $table->string('telefono_empresa')->nullable();
            $table->string('email')->nullable();
            $table->string('email_encargado')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre_encargado')->nullable();
            $table->string('cargo_encargado')->nullable();
            $table->string('telefono_encargado')->nullable();
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
        Schema::dropIfExists('cliente');
    }
}
