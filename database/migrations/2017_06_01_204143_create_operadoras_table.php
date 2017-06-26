<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operadoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('tipo_id')->unsigned();
            $table->string('rif_ope');
            $table->string('representante');
            $table->string('ci_rif');

            $table->foreign("tipo_id")->references("id")->on("tipos_operadoras");
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
        Schema::dropIfExists('operadoras');
    }
}
