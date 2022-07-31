<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerta', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha');
            $table->text('descripcion');
            $table->boolean('estado')->default(true);  //true->NO VISTA false->VISTA
            $table->unsignedInteger('equipo_id');
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
        Schema::dropIfExists('alerta');
    }
}
