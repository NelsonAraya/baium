<?php

use Illuminate\Database\Seeder;

class PrevisionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $prevision1 = new App\Prevision();
	    $prevision1->nombre = 'FONASA';
	    $prevision1->save();

    }
}
