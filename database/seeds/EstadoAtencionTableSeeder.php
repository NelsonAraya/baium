<?php

use Illuminate\Database\Seeder;

class EstadoAtencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $p = new App\EstadoAtencion();
       $p->cod='ING';
       $p->nombre='Ingresado';
       $p->save();

       $p = new App\EstadoAtencion();
       $p->cod='CAT';
       $p->nombre='Categorizado';
       $p->save();


    }
}
