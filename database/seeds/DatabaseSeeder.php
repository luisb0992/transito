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
        $this->call(PerfilesTableSeeder::class);
        $this->call(TiposOperadorasTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(MarcaTableSeeder::class);
        $this->call(StatusVehiculoTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
