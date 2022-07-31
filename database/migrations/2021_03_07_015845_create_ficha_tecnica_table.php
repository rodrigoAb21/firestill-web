<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tecnica', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('eCanioPesca');
            $table->string('eZuncho');
            $table->string('eChasis');
            $table->string('eRueda');
            $table->string('eRosca');
            $table->string('eManguera');
            $table->string('eValvula');
            $table->string('eTobera');
            $table->string('eRobinete');
            $table->string('ePalanca');
            $table->string('eManometro');
            $table->string('eVastago');
            $table->string('eDifusor');
            $table->string('eDisco');
            $table->string('ultimaPh');
            $table->float('carga')->nullable();
            $table->text('observacion')->nullable();
            $table->string('resultado');
            $table->softDeletes();

            $table->unsignedInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajador');

            $table->unsignedInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_tecnica');
    }
}
