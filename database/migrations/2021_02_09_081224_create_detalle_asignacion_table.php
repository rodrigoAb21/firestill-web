<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAsignacionTable extends Migration
{
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

            $table->unsignedInteger('asignacion_herramienta_id');
            $table->foreign('asignacion_herramienta_id')->references('id')
                ->on('asignacion_herramienta')->onDelete('cascade');

            $table->unsignedInteger('herramienta_id');
            $table->foreign('herramienta_id')->references('id')
                ->on('herramienta')->onDelete('cascade');
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
