<?php

use Illuminate\Database\Seeder;

class ProfesionalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $p1 = new App\Profesional();
	    $p1->run = 17096233;
	    $p1->dv = '8';
	    $p1->password = bcrypt('baium');
	    $p1->nombres = "Nelson Antonio";
	    $p1->apellidop = 'Araya';
	    $p1->apellidom = 'Vacca';
	    $p1->direccion = 'Direccion';
	    $p1->telefono = '999';
	    $p1->mail = 'nelson.araya@cormudesi.cl';
	    $p1->fecha_nacimiento = '1989-05-30';
	    $p1->sexo()->associate(App\Sexo::find(3));
	    $p1->profesion()->associate(App\Profesion::find(1));
	    $p1->save();

	    $p2 = new App\Profesional();
	    $p2->run = 15287582;
	    $p2->dv = '7';
	    $p2->password = bcrypt('pluto');
	    $p2->nombres = "Alvaro Raymundo";
	    $p2->apellidop = 'Torres';
	    $p2->apellidom = 'Fuchslocher';
	    $p2->direccion = 'Direccion';
	    $p2->telefono = '999';
	    $p2->mail = 'alvaro.torres@cormudesi.cl';
	    $p2->fecha_nacimiento = '1982-02-25';
	    $p2->sexo()->associate(App\Sexo::find(3));
	    $p2->profesion()->associate(App\Profesion::find(1));
	    $p2->save();

	    $p3 = new App\Profesional();
	    $p3->run = 23629055;
	    $p3->dv = '7';
	    $p3->password = bcrypt('florencio');
	    $p3->nombres = "Ismael Sixto";
	    $p3->apellidop = 'Florencio';
	    $p3->apellidom = 'Santander';
	    $p3->direccion = 'Direccion';
	    $p3->telefono = '999';
	    $p3->mail = 'ismael.florencio@cormudesi.cl';
	    $p3->fecha_nacimiento = '1982-02-25';
	    $p3->sexo()->associate(App\Sexo::find(3));
	    $p3->profesion()->associate(App\Profesion::find(1));
	    $p3->save();
    }
}
