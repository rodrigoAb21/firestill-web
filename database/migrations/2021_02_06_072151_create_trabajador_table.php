<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadorTable extends Migration
{
    /**
     *************************************************************************
     * Clase.........: CreateEmpleadoTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "trabajador" en la BD.
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
        Schema::create('trabajador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('carnet');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('tipo');
            $table->string('email')->unique();
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
        });

        DB::table('trabajador')->insert([
            'nombre' => 'Rodrigo',
            'apellido' => 'Abasto',
            'carnet' => 'carnet',
            'telefono' => '3532021',
            'direccion' => 'direccion',
            'tipo' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajador');
    }
}
