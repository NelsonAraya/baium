<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SexosTableSeeder::class);
        $this->call(ProfesionesTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(ProfesionalesTableSeeder::class);
        $this->call(PrevisionesTableSeeder::class);
    }
}
