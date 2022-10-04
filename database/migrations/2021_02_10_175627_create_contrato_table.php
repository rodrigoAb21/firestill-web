<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado')->default('Vigente');
            $table->boolean('edicion')->default(true);
            $table->unsignedInteger('periodo');

            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente')
                ->onDelete('cascade');

            $table->unsignedInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajador')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato');
    }
}
