<?php

use Illuminate\Database\Seeder;

class CronicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $cronico1 = new App\Cronico();
	    $cronico1->nombre = 'Hipertension';
	    $cronico1->save();

	    $cronico2 = new App\Cronico();
	    $cronico2->nombre = 'Diabetes';
	    $cronico2->save();

	    $cronico3 = new App\Cronico();
	    $cronico3->nombre = 'Dislipidemia';
	    $cronico3->save();

    }
}
