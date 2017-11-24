<?php

use Illuminate\Database\Seeder;

class ProfesionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $profesion1 = new App\Profesion();
	    $profesion1->nombre = 'Informatico';
	    $profesion1->save();

	    $profesion2 = new App\Profesion();
	    $profesion2->nombre = 'Médico';
	    $profesion2->save();

	    $profesion3 = new App\Profesion();
	    $profesion3->nombre = 'Enfermero';
	    $profesion3->save();

    }
}
