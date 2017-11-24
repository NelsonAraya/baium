<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('run')->unique()->nullable();
            $table->char('dv',1)->nullable();
            $table->string('run_acompanante',11)->nullable();
            $table->string('dni',100)->nullable();
            $table->string('nombres',200);
            $table->string('apellidop',200);
            $table->string('apellidom',200);
            $table->string('direccion',200)->nullable();
            $table->date('fecha_nacimiento');
            $table->integer('telefono')->nullable();
            $table->integer('prevision_id')->unsigned();
            $table->foreign('prevision_id')->references('id')->on('previsiones');
            $table->integer('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('paises');
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
        Schema::dropIfExists('usuarios');
    }
}
