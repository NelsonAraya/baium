<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $pais1 = new App\Pais();
	    $pais1->iso = 'CL';
	    $pais1->nombre = 'Chile';
	    $pais1->save();

	    $pais2 = new App\Pais();
	    $pais2->iso = 'PE';
	    $pais2->nombre = 'Perú';
	    $pais2->save();

	    $pais3 = new App\Pais();
	    $pais3->iso = 'CO';
	    $pais3->nombre = 'Colombia';
	    $pais3->save();
    }
}
