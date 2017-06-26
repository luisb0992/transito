<?php

use Illuminate\Database\Seeder;

class PerfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfil = array(
				  array('id' => '1','name' => 'DIRECTOR'),
                  array('id' => '2','name' => 'COORDINADOR')
				);
        //insert manual a una base de datos con array
        \DB::table('perfiles')->insert($perfil);
    }
}
