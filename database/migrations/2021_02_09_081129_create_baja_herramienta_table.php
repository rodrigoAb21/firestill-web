<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajaHerramientaTable extends Migration
{
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
