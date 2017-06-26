<?php

use Illuminate\Database\Seeder;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $marca = array(
				  array('id' => '1','name' => 'FIAT'),
				  array('id' => '2','name' => 'TOYOTA'),
				  array('id' => '3','name' => 'CHEVROLET'),
				  array('id' => '4','name' => 'NISSAN'),
				  array('id' => '5','name' => 'TURPIAL')
				);
        //insert manual a una base de datos con array
        \DB::table('marcas')->insert($marca);
    }
}
