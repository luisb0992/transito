<?php

use Illuminate\Database\Seeder;

class StatusVehiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
				  array('id' => '1','name' => 'ACTIVO'),
          array('id' => '2','name' => 'INACTIVO'),
          array('id' => '3','name' => 'MANTENIMIENTO'),
          array('id' => '4','name' => 'DESINCORPORADO'),
          array('id' => '5','name' => 'SUSPENDIDO')
				);
        //insert manual a una base de datos con array
        \DB::table('status_vehiculos')->insert($status);
    }
}
