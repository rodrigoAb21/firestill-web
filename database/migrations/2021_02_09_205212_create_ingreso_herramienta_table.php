<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoHerramientaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_herramienta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('tienda');
            $table->string('nro_factura')->nullable();
            $table->string('foto_factura')->nullable();
            $table->float('total');
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
        Schema::dropIfExists('ingreso_herramienta');
    }
}
