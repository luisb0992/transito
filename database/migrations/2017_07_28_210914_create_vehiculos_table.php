<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->string('serial')->nullable();
            $table->integer('marca_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('año')->unsigned();
            $table->integer('capacidad')->unsigned();
            $table->integer('propietario_id')->unsigned();
            $table->integer('operadora_id')->unsigned();
            $table->integer('status_vehiculo_id')->unsigned();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('color_id')->references('id')->on('colores');
            $table->foreign('status_vehiculo_id')->references('id')->on('status_vehiculos');
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');
            $table->foreign('operadora_id')->references('id')->on('operadoras')->onDelete('cascade');;
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
        Schema::dropIfExists('vehiculos');
    }
}
