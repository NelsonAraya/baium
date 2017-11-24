<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionesEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones_eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesional_id')->unsigned();
            $table->foreign('profesional_id')->references('id')->on('profesionales');
            $table->integer('atencion_id')->unsigned();
            $table->foreign('atencion_id')->references('id')->on('atenciones');
            $table->string('evento',150);
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
        Schema::dropIfExists('atenciones_eventos');
    }
}
