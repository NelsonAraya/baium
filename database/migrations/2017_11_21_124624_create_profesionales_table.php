<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('run')->unique();
            $table->char('dv',1);
            $table->string('nombres',200);
            $table->string('apellidop',200);
            $table->string('apellidom',200);
            $table->string('direccion',250);
            $table->integer('telefono');
            $table->string('mail',150)->unique();
            $table->date('fecha_nacimiento');
            $table->integer('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->string('password');
            $table->integer('profesion_id')->unsigned();
            $table->foreign('profesion_id')->references('id')->on('profesiones');
            $table->rememberToken();
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
        Schema::dropIfExists('profesionales');
    }
}
