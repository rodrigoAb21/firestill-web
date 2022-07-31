<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('foto')->nullable();
            $table->string('origen');
            $table->text('descripcion')->nullable();
            $table->float('precio');
            $table->unsignedInteger('cantidad');
            $table->softDeletes();

            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categoria');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
