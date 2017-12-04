<?php

use Illuminate\Database\Seeder;

class AlergiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new App\Alergia();
	    $p->nombre = 'Polem';
	    $p->save();

	    $p = new App\Alergia();
	    $p->nombre = 'Penisilina';
	    $p->save();

	    $p = new App\Alergia();
	    $p->nombre = 'Salbutamol';
	    $p->save();
    }
}
