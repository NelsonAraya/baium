<?php

use Illuminate\Database\Seeder;

class SexosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $sexo1 = new App\Sexo();
	    $sexo1->cod = 'I';
	    $sexo1->nombre = 'Indefinido';
	    $sexo1->save();

	    $sexo2 = new App\Sexo();
	    $sexo2->cod = 'F';
	    $sexo2->nombre = 'Femenino';
	    $sexo2->save();

	    $sexo3 = new App\Sexo();
	    $sexo3->cod = 'M';
	    $sexo3->nombre = 'Masculino';
	    $sexo3->save();

    }
}
