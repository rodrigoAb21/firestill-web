<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerramientaTable extends Migration
{
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
