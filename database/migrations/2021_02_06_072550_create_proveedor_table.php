<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nit')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion');
            $table->string('telefono');
            $table->text('informacion')->nullable();
            $table->string('titular')->nullable();
            $table->string('banco')->nullable();
            $table->string('sucursal')->nullable();
            $table->string('nro_cuenta')->nullable();
            $table->string('moneda')->nullable();
            $table->string('tipo_identificacion')->nullable();
            $table->string('nro_identificacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
}
