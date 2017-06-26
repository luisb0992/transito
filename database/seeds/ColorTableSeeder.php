<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = array(
				  array('id' => '1','name' => 'AZUL'),
                  array('id' => '2','name' => 'ROJO'),
                  array('id' => '3','name' => 'VERDE'),
                  array('id' => '4','name' => 'AMARILLO'),
                  array('id' => '5','name' => 'ROSADO'),
                  array('id' => '6','name' => 'MORADO'),
                  array('id' => '7','name' => 'NARANJA'),
                  array('id' => '8','name' => 'NEGRO'),
                  array('id' => '9','name' => 'MARRON'),
                  array('id' => '10','name' => 'BLANCO')
				);
        //insert manual a una base de datos con array
        \DB::table('colores')->insert($color);
    }
}
