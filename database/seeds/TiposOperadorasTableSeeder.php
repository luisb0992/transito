<?php

use Illuminate\Database\Seeder;

class TiposOperadorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = array(
          array('id' => '1','name' => 'COOPERATIVA'),
          array('id' => '2','name' => 'ASOCIACION'),
          array('id' => '3','name' => 'OPERADORA'),
          array('id' => '4','name' => 'LINEA POR PUESTO'),
          array('id' => '5','name' => 'LINEA DE TAXI'),
          array('id' => '6','name' => 'LINEA POR PUESTO Y TAXI'),
				);
        //insert manual a una base de datos con array
        \DB::table('tipos_operadoras')->insert($tipos);
    }
}
