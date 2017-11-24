<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->text('motivo');
            $table->text('arterial')->nullable();
            $table->integer('pulso')->nullable();
            $table->double('saturacion',100,2)->nullable();
            $table->double('axilar',100,2)->nullable();
            $table->double('rectal',100,2)->nullable();
            $table->integer('resp')->nullable();
            $table->double('peso',100,2)->nullable();
            $table->integer('talla')->nullable();
            $table->double('eva',100,2)->nullable();
            $table->double('hgt',100,2)->nullable();
            $table->integer('glasgow')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados_atenciones');
            $table->integer('num_boleta')->nullable();
            $table->integer('valor_boleta')->nullable();
            $table->text('nota_boleta')->nullable();
            $table->integer('box')->nullable();
            $table->text('examen_fisico')->nullable();
            $table->string('destino',100)->nullable();
            $table->string('categoria',100)->nullable();
            $table->boolean('traslado_ambulancia')->nullable();
            $table->text('subproblema')->nullable();
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
        Schema::dropIfExists('atenciones');
    }
}
