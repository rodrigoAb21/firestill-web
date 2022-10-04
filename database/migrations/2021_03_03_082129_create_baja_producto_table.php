<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBajaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->float('cantidad');
            $table->string('motivo');

            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')
                ->on('producto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baja_producto');
    }
}
