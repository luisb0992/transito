<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenadaRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordenadas_rutas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruta_id')->unsigned();
            $table->string('longitud');
            $table->string('latitud');

            $table->foreign('ruta_id')->references('id')->on('rutas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordenadas_rutas');
    }
}
